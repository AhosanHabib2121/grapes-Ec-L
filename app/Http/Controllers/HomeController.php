<?php

namespace App\Http\Controllers;

use App\Models\Admin_parsonal_info;
use App\Models\Blog;
use App\Models\category;
use App\Models\Countrie;
use App\Models\Coupon;
use App\Models\Cover_photo;
use App\Models\Order_details;
use App\Models\Order_summary;
use App\Models\Shopping;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $order_summaries=Order_summary::all();
        $total_category=category::count();
        $total_user=User::count();
        return view('deshboard.home',compact('total_category','total_user','order_summaries'));
    }

    public function profile(){
        $cover_photo_id=Cover_photo::first();
        return view('profile.index',compact('cover_photo_id'));
    }
    public function changeAbout(Request $request){

        $request->validate([
            'name'=>'required',
            'phone_number'=>'nullable'
        ],[
            'name.required'=>'Please enter the name then try!'
        ]);
        User::find(auth()->id())->update([
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address
        ]);
        // photo uploads code start here
            if($request->hasFile('profile_photo')){
                // step:4>profile photo delete from upload done
                if(auth()->user()->profile_photo !='default-profile-photo.jpg'){
                    unlink(base_path('public/upload_photos/profile_photos/').auth()->user()->profile_photo);
                }
                // step:1>profile photo name create
                $new_name=auth()->user()->id.'-'.Str::random(6).'.'.$request->file('profile_photo')->getClientOriginalExtension();
                // step:2>profile photo upload at file
                $save_link=base_path('public/upload_photos/profile_photos/').$new_name;
                Image::make($request->file('profile_photo'))->resize(300,300)->save($save_link);
                // step:3>profile photo name update at database
                User::find(auth()->id())->update([
                    'profile_photo'=>$new_name
                ]);
            }
        // photo uploads code end here
        return back()->with('success_message','Change successfully!');
    }
    public function changePassword (Request $request){

        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|alpha_num|min:8',
            'password_confirmation'=>'required'
        ]);
        if($request->current_password == $request->password){
            return back()->withErrors(['error_password'=>'Your new password can not same as current password!']);
        }
        if(Hash::check($request->current_password,auth()->user()->password)){
            User::find(auth()->id())->update([
                'password'=>bcrypt($request->password)
            ]);
            return back()->with('password_success','Password Change successfully!');
        }
        else{
            return back()->withErrors(['error_password'=>'current password is wrong!']);
        }

    }
    // cover photo code use start here
    public function change_cover_photo(Request $request,Cover_photo $cover_photo_id)
    {
        $request->validate([
            'cover_photo'=>'mimes:jpeg,png,jpg,webp',
        ]);
        // photo uploads code start here
        if($request->hasFile('cover_photo')){
            // step:4>profile photo delete from upload done
            if($cover_photo_id->cover_photo !='default_cover_photo.jpg'){
                unlink(public_path('upload_photos/cover-photos/').$request->old_photo);
            }
            // step:1>profile photo name create
            $new_cover_photo_name=auth()->user()->id.'-'.Str::random(6).'.'.$request->file('cover_photo')->getClientOriginalExtension();
            // step:2>profile photo upload at file
            $save_link=public_path('upload_photos/cover-photos/').$new_cover_photo_name;
            Image::make($request->file('cover_photo'))->resize(1600,451)->save($save_link);
            // step:3>profile photo name update at database
            $cover_photo_id->cover_photo=$new_cover_photo_name;
        }
        // photo uploads code end here
        $cover_photo_id->save();
        return back()->with('change_message','Cover Change Successfully!');
    }
    // cover photo code use end here

    // shopping code use start here
    public function shopping()
    {
        $shopping_all=Shopping::all();
        $country_all=Countrie::all();
        return view('shopping.index',compact(['country_all','shopping_all']));
    }
    public function add_shopping(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'country_id.required'=>'Please select country name then try!',
            'city_name.required'=>'Please enter the city name then try!',
            'shopping_charge.required'=>'Please enter the charge amount then try!',
        ]);
        $status=Shopping::where([
            'country_id'=>$request->country_id,
            'city_name'=>$request->city_name,
        ])->exists();
        if($status){
            return back()->with('shoppings_error','This country city already exists');
        }
        else{
            Shopping::insert($request->except('_token'));
        }
        return back()->with('shoppings_success','Added successfully!');
    }
    public function shopping_remove($shopping_id)
    {
        Shopping::find($shopping_id)->delete();
        return back()->with('shopping_delete_message','Shopping charge delete completed!');
    }
    // shopping code use end here

    // coupon code use start here
    public function coupon()
    {
        $coupon_data=Coupon::all();
        return view('coupon.index',compact('coupon_data'));
    }
    public function coupon_insert(Request $request)
    {
        Coupon::insert($request->except('_token')+[
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('coupon_success','Added successfully!');
    }
    public function coupon_remove($coupon_id)
    {
        Coupon::find($coupon_id)->delete();
        return back()->with('coupon_delete_message','Coupon item delete completed!');
    }
    // coupon code use end here

    // order code use start here
    public function orders()
    {
        $order_summaries=Order_summary::latest()->get();
        return view('orders.index',compact('order_summaries'));
    }
    public function delete_customer_order(Order_summary $customer_order_id)
    {
        $customer_order_id->delete();
        Order_details::where('order_summary_id',$customer_order_id->id)->delete();
        return back()->with('order_delete','Customer order delete complated!');
    }
    public function order_status_change(Request $request ,Order_summary $order_summary_id)
    {
        $order_summary_id->order_status=$request->order_status;
        if($order_summary_id->payment_method == 'cod'){
            if($order_summary_id->order_status == 'delivered'){
                $order_summary_id->payment_status ='paid';
            }
            else{
                $order_summary_id->payment_status ='unpaid';
            }
        }
        $order_summary_id->save();
        return back();
    }
    // order code use end here
    //=========================================admin parsonal info code start here============================
    public function admin_info(Admin_parsonal_info $admin_parsonal_info_id)
    {
        return view('admin-parsonal-info.index',compact('admin_parsonal_info_id'));
    }
    public function admin_info_update(Request $request,Admin_parsonal_info $admin_parsonal_info_id)
    {
        $request->validate([
            '*'=>'required',
            'phone_number'=>'required|numeric|digits:11',
        ]);
        $admin_parsonal_info_id->name=$request->name;
        $admin_parsonal_info_id->email=$request->email;
        $admin_parsonal_info_id->phone_number=$request->phone_number;
        $admin_parsonal_info_id->address=$request->address;
        $admin_parsonal_info_id->save();
        return back()->with('update_message','Update Complated!');
    }
    //==========================================admin parsonal info code end here=============================

    //==========================================admin_customer_ account data code start here=====================
    public function admin_customer_data()
    {
        $user_account_data_all=User::all();
        return view('admin-parsonal-info.admin-customer-account-data.index',compact('user_account_data_all'));
    }
    public function account_delete(User $user_account_id)
    {
        unlink(public_path('upload_photos/profile_photos/').User::find($user_account_id)->profile_photo);
        $user_account_id->delete();
        return back()->with('delete_message','Account delete complated!');
    }
    //==========================================admin_customer_ account data code end here======================
}
