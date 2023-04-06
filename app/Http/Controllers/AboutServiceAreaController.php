<?php

namespace App\Http\Controllers;

use App\Models\About_service_area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class AboutServiceAreaController extends Controller
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
        $deleted_about_service_all_data=About_service_area::onlyTrashed()->latest()->get();
        $about_service_all_data=About_service_area::latest()->get();
        return view('about-service-area.index',compact('about_service_all_data','deleted_about_service_all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-service-area.create');
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
            'service_photo' => 'required|mimes:jpeg,png,jpg,webp',
        ]);
        // photo upload code start here
            // new photo name create
            $new_service_photo=Str::random(7).'.'.$request->file('service_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/about-service-area-photo/').$new_service_photo;
            Image::make($request->file('service_photo'))->resize(419,407)->save($save_link);
        // photo upload code end here
        About_service_area::insert([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'short_description'=>$request->short_description,
            'service_photo'=>$new_service_photo,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_service_area  $about_service_area
     * @return \Illuminate\Http\Response
     */
    public function show(About_service_area $about_service_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_service_area  $about_service_area
     * @return \Illuminate\Http\Response
     */
    public function edit($about_service_id)
    {
        $about_service_data=About_service_area::where('id',$about_service_id)->first();
        return view('about-service-area.edit_page',compact('about_service_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_service_area  $about_service_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$about_service_id)
    {
        $about_service_info=About_service_area::where('id',$about_service_id)->first();
        $request->validate([
            '*'=>'required',
            'service_photo' => 'mimes:jpeg,png,jpg,webp',
        ]);

        if($request->hasFile('service_photo')){
            //service_photo delete from file
            unlink(public_path('upload_photos/about-service-area-photo/').$request->old_service_photo);
           // photo upload code start here
                // new photo name create
                $new_service_photo=Str::random(7).'.'.$request->file('service_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/about-service-area-photo/').$new_service_photo;
                Image::make($request->file('service_photo'))->resize(419,407)->save($save_link);
            // photo upload code end here
            $about_service_info->service_photo=$new_service_photo;
        };
        $about_service_info->title=$request->title;
        $about_service_info->subtitle=$request->subtitle;
        $about_service_info->short_description=$request->short_description;
        $about_service_info->save();
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_service_area  $about_service_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($about_service_id)
    {
        About_service_area::find($about_service_id)->delete();
        return back()->with('delete_message','Delete complated!');
    }
    // restore & forcedelete code start here
    public function service_restore($id)
    {
        About_service_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function service_force_delete($id)
    {
        unlink(public_path('upload_photos/about-service-area-photo/').About_service_area::onlyTrashed()->find($id)->service_photo);
        About_service_area::onlyTrashed()->where('id',$id)->forcedelete();
        return back();
    }
    // restore & forcedelete code end here
}
