<?php

namespace App\Http\Controllers;

use App\Models\About_testimonial_area;
use App\Models\Testimonial_reating;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class AboutTestimonialAreaController extends Controller
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
        //testimonial_reating_data start here
        $testimonial_reating_data=Testimonial_reating::latest()->get();
        //testimonial_reating_data end here
        $deleted_about_testimonial_all_data=About_testimonial_area::onlyTrashed()->latest()->get();
        $about_testimonial_data=About_testimonial_area::latest()->get();
        return view('about-testimonial-area.index',compact('about_testimonial_data','deleted_about_testimonial_all_data','testimonial_reating_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-testimonial-area.create');
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
            'testimonial_photo' => 'required|mimes:jpeg,png,jpg,webp',
        ]);
        // photo upload code start here
            // new photo name create
            $new_testimonial_photo=Str::random(7).'.'.$request->file('testimonial_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/about-testimonial-photos/').$new_testimonial_photo;
            Image::make($request->file('testimonial_photo'))->resize(56,56)->save($save_link);
        // photo upload code end here
        About_testimonial_area::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'testimonial_photo'=>$new_testimonial_photo,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_testimonial_area  $about_testimonial_area
     * @return \Illuminate\Http\Response
     */
    public function show(About_testimonial_area $about_testimonial_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_testimonial_area  $about_testimonial_area
     * @return \Illuminate\Http\Response
     */
    public function edit($about_testimonial_id)
    {
        $about_testimonial_data=About_testimonial_area::where('id',$about_testimonial_id)->first();
        return view('about-testimonial-area.edit_page',compact('about_testimonial_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_testimonial_area  $about_testimonial_area
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $about_testimonial_id)
    {
        $about_testimonial_info=About_testimonial_area::where('id',$about_testimonial_id)->first();
        $request->validate([
            '*'=>'required',
            'testimonial_photo' => 'mimes:jpeg,png,jpg,webp',
        ]);

        if($request->hasFile('testimonial_photo')){
            //testimonial_photo delete from file
            unlink(public_path('upload_photos/about-testimonial-photos/').$request->old_testimonial_photo);
            // photo upload code start here
                // new photo name create
                $new_testimonial_photo=Str::random(7).'.'.$request->file('testimonial_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/about-testimonial-photos/').$new_testimonial_photo;
                Image::make($request->file('testimonial_photo'))->resize(56,56)->save($save_link);
            // photo upload code end here
            $about_testimonial_info->testimonial_photo=$new_testimonial_photo;
        };
        $about_testimonial_info->name=$request->name;
        $about_testimonial_info->title=$request->title;
        $about_testimonial_info->short_description=$request->short_description;
        $about_testimonial_info->save();
        return back()->with('update_message','Update Complated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_testimonial_area  $about_testimonial_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($about_testimonial_id)
    {
        About_testimonial_area::find($about_testimonial_id)->delete();
        return back()->with('delete_message','Delete complated!');
    }
    // restore & forcedelete code start here
    public function testimonial_restore($id)
    {
        About_testimonial_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function testimonial_force_delete($id)
    {
        unlink(public_path('upload_photos/about-testimonial-photos/').About_testimonial_area::onlyTrashed()->find($id)->testimonial_photo);
        About_testimonial_area::onlyTrashed()->where('id',$id)->forcedelete();
        return back();
    }
    // restore & forcedelete code end here
    //==========================================testimonial_reating_add start here==============================
    public function testimonial_reating_add(Request $request)
    {
        Testimonial_reating::insert([
            'reating'=>$request->reating,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('reating_success','Reating added Successfully!');
    }
    public function testimonial_reating_delete(Testimonial_reating $reating_id)
    {

        $reating_id->delete();
        return back()->with('reating_delete','Reating delete Complated!');
    }
    //==========================================testimonial_reating_add end here===============================
}
