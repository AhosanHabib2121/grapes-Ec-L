<?php

namespace App\Http\Controllers;

use App\Models\About_brand_area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class AboutBrandAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    
    public function index()
    {
        $brand_all_data=About_brand_area::latest()->get();
        return view('about-brand-area.index',compact('brand_all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-brand-area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
            'brand_photo' => 'required|mimes:jpeg,png,jpg,webp',
        ]);
        // photo upload code start here
            // new photo name create
            $new_brand_photo=Str::random(7).'.'.$request->file('brand_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/about-brand-photo/').$new_brand_photo;
            Image::make($request->file('brand_photo'))->resize(125,63)->save($save_link);
        // photo upload code end here
        About_brand_area::insert([
            'brand_link'=>$request->brand_link,
            'brand_photo'=>$new_brand_photo,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_brand_area  $about_brand_area
     * @return \Illuminate\Http\Response
     */
    public function show(About_brand_area $about_brand_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_brand_area  $about_brand_area
     * @return \Illuminate\Http\Response
     */
    public function edit($about_brand_id)
    {
        $about_brand_data=About_brand_area::where('id',$about_brand_id)->first();
        return view('about-brand-area.edit_page',compact('about_brand_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_brand_area  $about_brand_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$about_brand_id)
    {
        $about_brand_info=About_brand_area::where('id',$about_brand_id)->first();
        $request->validate([
            '*'=>'required',
            'brand_photo' => 'mimes:jpeg,png,jpg,webp',
        ]);

        if($request->hasFile('brand_photo')){
            //brand_photo delete from file
            unlink(public_path('upload_photos/about-brand-photo/').$request->old_brand_photo);
            // photo upload code start here
                // new photo name create
                $new_brand_photo=Str::random(7).'.'.$request->file('brand_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/about-brand-photo/').$new_brand_photo;
                Image::make($request->file('brand_photo'))->resize(125,63)->save($save_link);
            // photo upload code end here
            $about_brand_info->brand_photo=$new_brand_photo;
        };
        $about_brand_info->brand_link=$request->brand_link;
        $about_brand_info->save();
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_brand_area  $about_brand_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($about_brand_id)
    {
        unlink(public_path('upload_photos/about-brand-photo/').About_brand_area::find($about_brand_id)->brand_photo);
        About_brand_area::find($about_brand_id)->delete();
        return back()->with('delete_message','Delete complated!');
    }
}
