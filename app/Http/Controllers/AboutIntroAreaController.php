<?php

namespace App\Http\Controllers;

use App\Models\About_intro_area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class AboutIntroAreaController extends Controller
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
        $deleted_about_intro_all_data=About_intro_area::onlyTrashed()->latest()->get();
        $about_intro_all_data=About_intro_area::latest()->get();
        return view('about-intro-area.index',compact('about_intro_all_data','deleted_about_intro_all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-intro-area.create');
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
            'intro_small_photo' => 'required|mimes:jpeg,png,jpg,webp',
            'intro_large_photo' => 'required|mimes:jpeg,png,jpg,webp',
        ]);
        // photo upload code start here
            // new photo name create
            $new_intro_small_photo=Str::random(7).'.'.$request->file('intro_small_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/intro-area-photo-one/').$new_intro_small_photo;
            Image::make($request->file('intro_small_photo'))->resize(283,127)->save($save_link);
        // photo upload code end here

        // photo upload code start here
            // new photo name create
            $new_intro_large_photo=Str::random(7).'.'.$request->file('intro_large_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/intro-area-photo-two/').$new_intro_large_photo;
            Image::make($request->file('intro_large_photo'))->resize(509,506)->save($save_link);
        // photo upload code end here
        About_intro_area::insert([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'intro_small_photo'=>$new_intro_small_photo,
            'intro_large_photo'=>$new_intro_large_photo,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_intro_area  $about_intro_area
     * @return \Illuminate\Http\Response
     */
    public function show(About_intro_area $about_intro_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_intro_area  $about_intro_area
     * @return \Illuminate\Http\Response
     */
    public function edit($about_intro_id)
    {
        $about_intro_data=About_intro_area::where('id',$about_intro_id)->first();
        return view('about-intro-area.edit_page',compact('about_intro_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_intro_area  $about_intro_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$about_intro_id)
    {
        $about_intro_area_data=About_intro_area::find($about_intro_id)->first();
        $request->validate([
            '*'=>'required',
            'intro_small_photo' => 'mimes:jpeg,png,jpg,webp',
            'intro_large_photo' => 'mimes:jpeg,png,jpg,webp',
        ]);

        if($request->hasFile('intro_small_photo')){
            //intro_photo delete from file
            unlink(public_path('upload_photos/intro-area-photo-one/').$request->old_intro_small_photo);
           // photo upload code start here
                // new photo name create
                $new_intro_small_photo=Str::random(7).'.'.$request->file('intro_small_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/intro-area-photo-one/').$new_intro_small_photo;
                Image::make($request->file('intro_small_photo'))->resize(283,127)->save($save_link);
            // photo upload code end here
            $about_intro_area_data->intro_small_photo=$new_intro_small_photo;
        };
        if($request->hasFile('intro_large_photo')){
            //blog_front_photo delete from file
            unlink(public_path('upload_photos/intro-area-photo-two/').$request->old_intro_large_photo);
           // photo upload code start here
                // new photo name create
                $new_intro_large_photo=Str::random(7).'.'.$request->file('intro_large_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/intro-area-photo-two/').$new_intro_large_photo;
                Image::make($request->file('intro_large_photo'))->resize(509,506)->save($save_link);
            // photo upload code end here
            $about_intro_area_data->intro_large_photo=$new_intro_large_photo;
        };
        $about_intro_area_data->title=$request->title;
        $about_intro_area_data->short_description=$request->short_description;
        $about_intro_area_data->save();
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_intro_area  $about_intro_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($about_intro_id)
    {
        About_intro_area::find($about_intro_id)->delete();
        return back()->with('delete_message','Delete complated!');
    }
    // restore & forcedelete code start here
    public function intro_restore($id)
    {
        unlink(public_path('upload_photos/intro-area-photo-one/').About_intro_area::onlyTrashed()->find($id)->intro_small_photo);
        unlink(public_path('upload_photos/intro-area-photo-two/').About_intro_area::onlyTrashed()->find($id)->intro_large_photo);
        About_intro_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function intro_force_delete($id)
    {
        About_intro_area::onlyTrashed()->where('id',$id)->forcedelete();
        return back();
    }
    // restore & forcedelete code end here
}
