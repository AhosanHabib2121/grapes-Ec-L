<?php

namespace App\Http\Controllers;

use App\Models\About_feature_area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class AboutFeatureAreaController extends Controller
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
        $about_feature_data=About_feature_area::latest()->get();
        return view('about-feature.index',compact('about_feature_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('about-feature.create');
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
            'title'=>'required',
            'sub_title'=>'required',
            'feature_photo'=>'required',
        ],[
            'title.required'=>'Please enter the title then try!',
            'sub_title.required'=>'Please enter the sub_title then try!',
            'feature_photo.required'=>'Please enter the photo then try!',
        ]);
        // photo upload code start here
            // new photo name create
            $new_feature_name=Str::random(7).'.'.$request->file('feature_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/about-feature-photos/').$new_feature_name;
            Image::make($request->file('feature_photo'))->resize(46,34)->save($save_link);
        // photo upload code end here
        About_feature_area::insert([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'feature_photo'=>$new_feature_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_feature_area  $about_feature_area
     * @return \Illuminate\Http\Response
     */
    public function show(About_feature_area $about_feature_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_feature_area  $about_feature_area
     * @return \Illuminate\Http\Response
     */
    public function edit($about_feature_id)
    {
        $about_feature_info=About_feature_area::where('id',$about_feature_id)->first();
        return view('about-feature.edit_page',compact('about_feature_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_feature_area  $about_feature_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$about_feature_id)
    {
        $about_feature=About_feature_area::where('id',$about_feature_id)->first();
        $about_feature->title=$request->title;
        $about_feature->sub_title=$request->sub_title;
        // photo upload code start here
            if($request->hasFile('featurn_photo')){
                unlink(public_path('upload_photos/about-feature-photos/').$request->old_photo);
                // new photo name create
                $new_name=Str::random(7).'.'.$request->file('featurn_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/about-feature-photos/').$new_name;
                Image::make($request->file('featurn_photo'))->resize(46,34)->save($save_link);
                $about_feature->feature_photo=$new_name;
            }
        // photo upload code end here
        $about_feature->save();
        return back()->with('success_message','Edit completed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_feature_area  $about_feature_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($about_feature_id)
    {
        unlink(public_path('upload_photos/about-feature-photos/').About_feature_area::find($about_feature_id)->feature_photo);
        About_feature_area::find($about_feature_id)->delete();
        return back()->with('delete_message','deleted complated!');
    }
}
