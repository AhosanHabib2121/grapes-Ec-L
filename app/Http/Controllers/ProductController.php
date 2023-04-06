<?php

namespace App\Http\Controllers;

use App\Models\Product_feature_photo;
use App\Models\category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Inventorie;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_info = Product::latest()->get();
        return view('product.index',compact('product_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->discounted_price == NULL ){
            $discounted_price=$request->regular_price;
        }
        else{
            $discounted_price=$request->discounted_price;
        }
        if($request->discounted_price > $request->regular_price){
            return back()->withErrors(['error'=>'discounted price not allow!']);
        }

        $slug=Str::slug($request->product_name);
        $sku=Str::random(10);
        $product_id=Product::insertGetId($request->except('_token','discounted_price')+[
            'slug'=>$slug,
            'sku'=>$sku,
            'discounted_price'=>$discounted_price,
            'created_at'=>Carbon::now()
        ]);
        if($request->hasFile('product_thumbnail_photo')){
            // photo uploaded code start here
                // step:1> new photo name create
                $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('product_thumbnail_photo')->getClientOriginalExtension();
                // step:2> new photo upload
                $save_link=public_path('upload_photos/product-photos/').$new_name;
                Image::make($request->file('product_thumbnail_photo'))->resize(270,310)->save($save_link);
            // photo uploaded code end here
            Product::find($product_id)->update([
                'product_thumbnail_photo'=>$new_name,
            ]);
        }
        return back()->with('success_message','The  Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        unlink(public_path('upload_photos/product-photos/').Product::find($product->id)->product_thumbnail_photo);
        $product->delete();
        return back()->with('delete_message','Deleted Complated!');
    }
    public function getSubcategory(Request $request)
    {
        $subcategories=Subcategory::where('category_id',$request->category_id)->get();
        if($subcategories->count()== 0){
            $string_to_send="<option value=''>-no subcategory at database-</option>";
        }
        else{
            $string_to_send="<option value=''>-Choose One-</option>";
        }
        foreach($subcategories as $subcategory){
            $string_to_send.="<option value='$subcategory->id'>$subcategory->subcategory_name</option>";
        }
        echo $string_to_send;

    }
    public function add_feature_photo($product_id){
        $product_data=Product::find($product_id);
        $product_feature_photos=Product_feature_photo::where('product_id',$product_id)->latest()->get();
        return view('product.addfeature_photo',compact('product_data','product_feature_photos'));
    }
    public function add_feature_photo_post(Request $request,$product_id)
    {
        $request->validate([
            'product_feature_photo_name'=>'required',
        ]);

        $status=true;
        foreach($request->file('product_feature_photo_name') as $single_feature_photo){
            if(!in_array($single_feature_photo->getClientOriginalExtension(),['jpg','png','webp'])){
                $status=false;
            }
        }
        if($status){
            foreach($request->file('product_feature_photo_name') as $single_feature_photo){
                // photo uploaded code start here
                    // step:1> new photo name create
                    $new_name=auth()->id().'-'.Str::random(7).'.'.$single_feature_photo->getClientOriginalExtension();
                    // step:2> new photo upload
                    $save_link=public_path('upload_photos/product-feature-photos/').$new_name;
                    Image::make($single_feature_photo)->resize(270,310)->save($save_link);
                // photo uploaded code end here
                Product_feature_photo::insert([
                    'product_id'=>$product_id,
                    'product_feature_photo_name'=>$new_name,
                    'created_at'=>Carbon::now(),
                ]);
            }
            return back()->with('success_message','product feature photo added successfully!');
        }
        else{
            return back()->with('file_format_error_message','there are one or many unsupported file in your attachment');
        }

    }
    public function productFeaturePhotoDelete($product_feature_photo_id){
        unlink(public_path('upload_photos/product-feature-photos/').Product_feature_photo::find($product_feature_photo_id)->product_feature_photo_name);
        Product_feature_photo::find($product_feature_photo_id)->delete();
        return back()->with('dalate_message','product feature photo delete completed!');
    }
    public function variationIndex()
    {
        $size_data=Size::latest()->get();
        $color_data=Color::latest()->get();
        return view('variation-manager.index',compact('color_data','size_data'));
    }
    public function variation_color_post(Request $request)
    {
        $request->validate([
            'color_name'=>'required|unique:colors',
        ],[
            'color_name.required'=>'please give color name, then try!',
            'color_name.unique'=>'Already taken this name please new name take then try!',
        ]);
        Color::insert($request->except('_token')+[
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success_color','Color added successfully!');
    }
    public function colorDelete($color_id)
    {
        Color::find($color_id)->delete();
        return back()->with('delete_color_message','Delete Completed!');
    }
    public function variation_size_post(Request $request)
    {
        $request->validate([
            'size_name'=>'required|unique:sizes',
        ],[
            'size_name.required'=>'please give size name, then try!',
            'size_name.unique'=>'Already taken this name please new name take then try!',
        ]);
        Size::insert([
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success_size','Size added successfully!');
    }
    public function sizeDelete($size_id)
    {
        Size::find($size_id)->delete();
        return back()->with('delete_size_message','Delete Completed!');
    }
    public function addInventories($product_id)
    {
        $inventorie_information=Inventorie::where('product_id',$product_id)->get();
        $color_information=Color::latest()->get();
        $size_information=Size::latest()->get();
        $product_information=Product::find($product_id);
        return view('product.addinventories',compact('product_id','product_information','color_information','size_information','inventorie_information'));
    }
    public function add_inventories_post(Request $request,$product_id)
    {
        $is_exists=Inventorie::where([
            'product_id'=>$product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
        ])->exists();
        if($is_exists){
            Inventorie::where([
                'product_id'=>$product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
            ])->increment('quantity',$request->quantity);
        }
        else{
            Inventorie::insert([
                'product_id'=>$product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
        }
        return back()->with('success_message','Inventory added successfully!');
    }
    public function inventoryDelete($inventorie_id)
    {
        Inventorie::find($inventorie_id)->delete();
        return back()->with('delete_inventorie_message','Delete Completed!');
    }
}
