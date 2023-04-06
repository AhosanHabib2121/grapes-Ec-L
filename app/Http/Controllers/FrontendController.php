<?php

namespace App\Http\Controllers;

use App\Models\About_brand_area;
use App\Models\About_feature_area;
use App\Models\About_intro_area;
use App\Models\About_service_area;
use App\Models\About_team_area;
use App\Models\About_team_social_icon;
use App\Models\About_testimonial_area;
use App\Models\Admin_parsonal_info;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Contact_head;
use App\Models\Contact_map_link;
use App\Models\Deal_area_background_photo;
use App\Models\Feature;
use App\Models\Home_blog_area;
use App\Models\Home_blog_comment_area;
use App\Models\Home_blog_head;
use App\Models\Home_blog_social_icon;
use App\Models\Home_deal_area;
use App\Models\Inventorie;
use App\Models\Product;
use App\Models\Product_feature_photo;
use App\Models\Review;
use App\Models\Testimonial_reating;
use Carbon\Carbon;

class FrontendController extends Controller{
    public function index(){
        return view('frontend-site.index',[
            'banner_info'=>Banner::latest()->get(),
            'feature_info'=>Feature::latest()->get()->take(3),
            'categories_info'=>category::all(),
            'product_info'=>Product::latest()->get(),
            'home_deal_data_all'=>Home_deal_area::latest()->get()->take(1),
            'deal_background_photo'=> Deal_area_background_photo::first(),
            'home_blog_head_data'=> Home_blog_head::first(),
            'home_blog_area_data'=>Home_blog_area::latest()->get()->take(3),
            'home_blog_comment_all'=>Home_blog_comment_area::count(),
        ]);
    }
    public function about(){

        return view('frontend-site.about',[
            'about_intro_area_data'=>About_intro_area::latest()->get()->take(1),
            'about_service_area_data'=>About_service_area::latest()->get()->take(1),
            'about_team_area_data'=>About_team_area::latest()->get()->take(3),
            'about_team_social_icon_data'=>About_team_social_icon::latest()->get(),
            'about_feature_area_data'=>About_feature_area::all()->take(3),
            'about_testimonial_area_data'=>About_testimonial_area::latest()->get(),
            'testimonial_reating_data'=>Testimonial_reating::all(),
            'about_brand_area_data'=>About_brand_area::latest()->get(),
        ]);
    }
    public function shop(){
        return view('frontend-site.shop',[
            'product_info'=>Product::latest()->get(),
        ]);
    }
    public function contact(){

        return view('frontend-site.contact',[
            'contact_head_data'=>Contact_head::first(),
            'contact_map_link_data'=>Contact_map_link::first(),
            'admin_parsonal_info_data'=>Admin_parsonal_info::first(),
        ]);
    }
    // productDetails code start here
    public function productDetails($slug){
        $product_details=Product::where('slug',$slug)->first();
        $total_inventories=Inventorie::where('product_id',$product_details->id)->sum('quantity');
        $inventory_data=Inventorie::where('product_id',$product_details->id)->select('color_id')->groupBy('color_id')->get();
        $product_feature_photo_info=Product_feature_photo::where('product_id',$product_details->id)->latest()->get();
        $relative_product=Product::where('subcategory_id',$product_details->subcategory_id)->where('id','!=', $product_details->id)->latest()->get();
        $product_review=Review::where('product_id',$product_details->id)->get();
        return view('frontend-site.productDetails',compact('product_details','product_feature_photo_info','relative_product','inventory_data','total_inventories','product_review'));
    }
    // productDetails code end here

    // get_sizes code start here
    public function get_sizes(Request $request)
    {
        $strsize="<option value=''>-Selete Size-</option>";
        $sizes=Inventorie::where([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
        ])->get();
        foreach($sizes as $size){
           $strsize.="<option value='$size->size_id'>".$size->relationTosize->size_name."</option>";
        }
        echo $strsize;
    }
    // get_sizes code end here

    // get_inventory code start here
    public function get_inventory(Request $request)
    {

        echo Inventorie::where([
            'product_id'=>$request->product_id,
            'size_id'=>$request->size_id,
            'color_id'=>$request->color_id,
        ])->first()->quantity;
    }
    // get_inventory code end here

    // blog_details code start here
    public function blog_details($bolg_details_id)
    {

        return view('frontend-site.blog-detail.blog',[
            'home_blog_area_data'=>Home_blog_area::where('id',$bolg_details_id)->get(),
            'home_blog_comment_data'=>Home_blog_comment_area::latest()->get()->take(1),
            'home_blog_comment_all'=>Home_blog_comment_area::latest()->get(),
            'home_blog_social_icon_data'=>Home_blog_social_icon::latest()->get(),
        ]);
    }
    public function blog_comment_area(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);
        Home_blog_comment_area::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }

    // blog_details code end here
}
