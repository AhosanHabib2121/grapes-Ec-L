<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Countrie;
use App\Models\Coupon;
use App\Models\Inventorie;
use App\Models\Order_details;
use App\Models\Order_summary;
use App\Models\Review;
use App\Models\Shopping;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Auth\Events\Validated;

class CustomerController extends Controller
{

    public function customer_login ()
    {
        Session::put('login_previous_link',url()->previous());
        Session::put('login_current_link',url()->current());
        return view('customer.login');
    }
    public function customer_dashboard ()
    {
        $go_previous_link=Session::get('login_previous_link');
        Session::put('login_previous_link','');
        $go_current_link=Session::get('login_current_link');
        Session::put('login_current_link','');

        if($go_previous_link != $go_current_link){
            return redirect($go_previous_link);
        }
        $order_summarise=Order_summary::where('user_id',auth()->id())->get();
        return view('customer.dashboard',compact('order_summarise'));
    }
    public function delete_order(Order_summary $order_id)
    {
        $order_id->delete();
        Order_details::where('order_summary_id',$order_id->id)->delete();
        return back();
    }
    // customer register code start here
    public function customerRegisterpost(Request $request)
    {

        $request->validate([
            '*'=>'required|unique:users,email',
            'phone_number'=>'digits:11',
            'password'=>'confirmed|alpha_num|min:8',
        ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
            'role'=>'Customer',
        ]);
        return back()->with('success_message','Customer register Successfully,now you can login!');
    }
    // customer register code end here

    public function view_invoice (Order_summary $order_summary)
    {
        $order_details=Order_details::where('order_summary_id',$order_summary->id)->get();
        return view('customer.invoice',compact('order_summary','order_details'));
    }
    public function download_invoice (Order_summary $order_summary)
    {
        $order_details=Order_details::where('order_summary_id',$order_summary->id)->get();
        $pdf=PDF::loadView('customer.invoice',compact('order_summary','order_details'));
        return $pdf->download(Carbon::now()->format('d-m-y').' invoice ID '. $order_summary->id );
    }

    public function insert_cart(Request $request)
    {
        $is_exists=Cart::where([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'user_id'=>$request->user_id,
        ])->exists();
        $cart_amount_status='';
        if($is_exists){
            Cart::where([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'user_id'=>$request->user_id,
            ])->increment('cart_to_amount',$request->cart_to_amount);
            $cart_amount_status= 0;
        }
        else{
            Cart::insert([
                'product_id'=>$request->product_id,
                'product_current_price'=>$request->product_current_price,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'cart_to_amount'=>$request->cart_to_amount,
                'user_id'=>$request->user_id,
                'created_at'=>Carbon::now(),
            ]);
            $cart_amount_status= 1;
        }
        return response()->json(['cart_amount_status'=>$cart_amount_status]);
    }
    public function cart()
    {
        Session::put('s_coupon_name','');
        if(Auth::check()== 1){
            $countries=Shopping::select('country_id')->groupBy('country_id')->get();
            $carts=Cart::where('user_id',auth()->id())->get();
            return view('customer.cart',compact(['carts','countries']));
        }
        else{
            return redirect()->route('customer.login');
        }

    }
    public function get_cityies(Request $request)
    {
        $select_option="<option value=''>-Select One City-</option>";
        $cityes=Shopping::where('country_id',$request->country_id)->get();
        foreach($cityes as $city){
            $select_option .="<option value='$city->shopping_charge'>$city->city_name</option>";
        }
        echo $select_option;
    }
    public function cart_remove(Request $request)
    {
        Cart::find($request->cart_id)->delete();
    }
    public function cart_update(Request $request)
    {
        Cart::find($request->cart_id)->increment('cart_to_amount');
    }
    public function cart_decrement(Request $request)
    {
        Cart::find($request->cart_id)->decrement('cart_to_amount');
    }
    // coupon code use start here
    public function check_coupon(Request $request)
    {
        if(Coupon::where('coupon_name',$request->coupon_name)->exists()){
            $coupon=Coupon::where('coupon_name',$request->coupon_name)->first();
            if(Carbon::today() <= $coupon->coupon_validity_date){
                if($coupon->minimum_order > $request->sub_total){
                    Session::put('s_coupon_name','');
                    return response()->json([
                        'error'=>'You have to order minimum'. $coupon->minimum_order,
                    ]);
                }
                else{
                    if($coupon->coupon_limit == 0){
                        Session::put('s_coupon_name','');
                        return response()->json([
                            'error'=>'this coupon usage limit is over',
                        ]);
                    }
                    else{
                        Session::put('s_coupon_name',$request->coupon_name);
                        if($coupon->coupon_type == 'percentage'){
                            $grand_total=$request->sub_total-($request->sub_total*($coupon->coupon_amount/100));
                        }
                        else{
                            $grand_total=$request->sub_total - $coupon->coupon_amount;
                        }
                        return response()->json([
                            'coupon_type'=>$coupon->coupon_type,
                            'coupon_amount'=>$coupon->coupon_amount,
                            'grand_total'=>$grand_total,
                        ]);
                    }
                }
            }
            else{
                Session::put('s_coupon_name','');
                return response()->json([
                    'error'=>'this coupon validity date is over',
                ]);
            }
        }
        else{
            Session::put('s_coupon_name','');
           return response()->json([
               'error'=>'this coupon does not exists',
           ]);
        }
    }
    // coupon code use end here

    // checkout use start here
    public function checkout()
    {
        $after_explode=explode('/',url()->previous());
        if(end($after_explode) != 'cart'){
            abort(404);
        }
        $sub_total=0;
        foreach(Cart::where('user_id',auth()->user()->id)->get() as $cart){
            $sub_total +=($cart->product_current_price * $cart->cart_to_amount);
        }
        $shopping_charge=Shopping::where([
            'country_id'=>Session::get('s_country_id'),
            'city_name'=>Session::get('s_city_name'),
        ])->first()->shopping_charge;

        if(Session::get('s_coupon_name')){
            $coupon=Coupon::where('coupon_name',Session::get('s_coupon_name'))->first();
           if($coupon->coupon_type == 'percentage'){
                $after_coupon_total=$sub_total-($sub_total*($coupon->coupon_amount/100));
            }
            else{
                $after_coupon_total=$sub_total - $coupon->coupon_amount;
            }
        }
        else{
            $after_coupon_total=$sub_total;
        }
        $grand_total=$after_coupon_total+$shopping_charge;
        Session::put('s_sub_total',$sub_total);
        Session::put('s_shopping_charge',$shopping_charge);
        Session::put('s_discount_amount',$sub_total-$after_coupon_total);
        Session::put('s_grand_total',$grand_total);

        return view('checkout.index',compact('sub_total','shopping_charge','after_coupon_total','grand_total'));
    }
    public function checkout_post(Request $request)
    {

        $order_summary_id=Order_summary::insertGetId([
            'user_id'=>auth()->id(),
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_country_id'=>session('s_country_id'),
            'customer_city_name'=>session('s_city_name'),
            'customer_address'=>$request->customer_address,
            'customer_phone_number'=>$request->customer_phone_number,
            'customer_order_notes'=>$request->customer_order_notes,
            'payment_method'=>$request->payment_method,
            'sub_total'=>session('s_sub_total'),
            'shopping_charge'=>session('s_shopping_charge'),
            'discount_amount'=>session('s_discount_amount'),
            'coupon_name'=>session('s_coupon_name'),
            'grand_total'=>session('s_grand_total'),
            'created_at'=>Carbon::now(),
        ]);
        $cart_products=Cart::where('user_id',auth()->id())->get();
        foreach($cart_products as $cart_product){
            Order_details::insert([
                'order_summary_id'=>$order_summary_id,
                'product_id'=>$cart_product->product_id,
                'product_current_price'=>$cart_product->product_current_price,
                'color_id'=>$cart_product->color_id,
                'size_id'=>$cart_product->size_id,
                'amount'=>$cart_product->cart_to_amount,
                'created_at'=>Carbon::now(),
            ]);
            // decrement from inventory
            Inventorie::where([
                'product_id'=>$cart_product->product_id,
                'color_id'=>$cart_product->color_id,
                'size_id'=>$cart_product->size_id,
            ])->decrement('quantity',$cart_product->cart_to_amount);
            // deleted from cart
            $cart_product->delete();
        }
        // decrement from coupon
        if(session('s_coupon_name')){
            Coupon::where('coupon_name',session('s_coupon_name'))->decrement('coupon_limit');
        }
        if($request->payment_method == 'online'){
            Session::put('s_order_summary_id',$order_summary_id);
            return redirect('/pay');
        }
        else{
            return redirect('customer/dashboard');
        }
    }
    public function set_country_city(Request $request)
    {
        Session::put('s_country_id',$request->country_id);
        Session::put('s_city_name',$request->city_name);
    }
    // checkout use end here

    // later pay use start here
    public function later_pay($grand_total ,$order_summary_id)
    {
        Session::put('s_grand_total',$grand_total);
        Session::put('s_order_summary_id',$order_summary_id);
        return redirect('pay');
    }
    // later pay use end here

    // review use start here
    public function review(Order_summary $order_summary_id)
    {
        $order_details=Order_details::where('order_summary_id',$order_summary_id->id)->get();
        return view('customer.review',compact('order_summary_id','order_details'));

    }
    public function add_review(Request $request, Order_details $order_details_id)
    {
        Review::insert([
            'order_details_id'=>$order_details_id->id,
            'product_id'=>$order_details_id->product_id,
            'color_id'=>$order_details_id->color_id,
            'size_id'=>$order_details_id->size_id,
            'user_id'=>auth()->id(),
            'review'=>$request->review,
            'rating'=>$request->rating,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
    // review use end here

}
