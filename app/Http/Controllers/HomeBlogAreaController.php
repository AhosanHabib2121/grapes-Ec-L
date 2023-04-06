<?php

namespace App\Http\Controllers;

use App\Models\Home_blog_area;
use App\Models\Home_blog_comment_area;
use App\Models\Home_blog_head;
use App\Models\Home_blog_social_icon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;

class HomeBlogAreaController extends Controller
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

    // ==================================================Home_blog_area code start here==========================
    public function index()
    {
        $home_blog_data=Home_blog_area::latest()->get();
        $deleted_home_blog_data=Home_blog_area::onlyTrashed()->latest()->get();
        return view('home-blog-area.index',compact('home_blog_data','deleted_home_blog_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $home_blog_head_data=Home_blog_head::first();
        return view('home-blog-area.create',compact('home_blog_head_data'));
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
            'blog_front_photo' => 'required|mimes:jpeg,png,jpg,webp',
        ]);
        // photo upload code start here
            // new photo name create
            $new_blog_front_photo=Str::random(7).'.'.$request->file('blog_front_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/blog-front-photo/').$new_blog_front_photo;
            Image::make($request->file('blog_front_photo'))->resize(376,254)->save($save_link);
        // photo upload code end here

        // photo upload code start here
            // new photo name create
            $new_blog_display_photo_name=Str::random(7).'.'.$request->file('blog_display_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/blog-display-photo/').$new_blog_display_photo_name;
            Image::make($request->file('blog_display_photo'))->resize(776,524)->save($save_link);
        // photo upload code end here

        // photo upload code start here
            // new photo name create
            $new_blog_photo_name=Str::random(7).'.'.$request->file('blog_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/blog-photo/').$new_blog_photo_name;
            Image::make($request->file('blog_photo'))->resize(376,254)->save($save_link);
        // photo upload code end here

        Home_blog_area::insert([
            'headline_one'=>$request->headline_one,
            'short_description'=>$request->short_description,
            'headline_two'=>$request->headline_two,
            'long_description'=>$request->long_description,
            'blog_front_photo'=>$new_blog_front_photo,
            'blog_display_photo'=>$new_blog_display_photo_name,
            'blog_photo'=>$new_blog_photo_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home_blog_area  $home_blog_area
     * @return \Illuminate\Http\Response
     */
    public function show(Home_blog_area $home_blog_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home_blog_area  $home_blog_area
     * @return \Illuminate\Http\Response
     */
    public function edit($home_blog_id)
    {
        $home_blog_data=Home_blog_area::where('id',$home_blog_id)->first();
        return view('home-blog-area.edit_page',compact('home_blog_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home_blog_area  $home_blog_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $home_blog_id)
    {
        $request->validate([
            '*'=>'required',
            'blog_front_photo'=>'mimes:png,jpg,webp',
            'blog_display_photo'=>'mimes:png,jpg,webp',
            'blog_photo'=>'mimes:png,jpg,webp',
        ]);
        $blog_area_data=Home_blog_area::where('id',$home_blog_id)->first();

        if($request->hasFile('blog_front_photo')){
            //blog_front_photo delete from file
            unlink(public_path('upload_photos/blog-front-photo/').$request->old_front_photo);
            // photo upload code start here
                // new photo name create
                $new_blog_front_photo_name=Str::random(7).'.'.$request->file('blog_front_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/blog-front-photo/').$new_blog_front_photo_name;
                Image::make($request->file('blog_front_photo'))->resize(536,374)->save($save_link);
            // photo upload code end here
            $blog_area_data->blog_front_photo=$new_blog_front_photo_name;
        };
        if($request->hasFile('blog_display_photo')){
            unlink(public_path('upload_photos/blog-display-photo/').$request->old_display_photo);
            // photo upload code start here
                // new photo name create
                $new_blog_display_photo_name=Str::random(7).'.'.$request->file('blog_display_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/blog-display-photo/').$new_blog_display_photo_name;
                Image::make($request->file('blog_display_photo'))->resize(776,524)->save($save_link);
            // photo upload code end here
            $blog_area_data->blog_display_photo=$new_blog_display_photo_name;
        };
        if($request->hasFile('blog_photo')){
            unlink(public_path('upload_photos/blog-photo/').$request->old_blog_photo);
            // photo upload code start here
                // new photo name create
                $new_blog_photo_name=Str::random(7).'.'.$request->file('blog_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/blog-photo/').$new_blog_photo_name;
                Image::make($request->file('blog_photo'))->resize(376,254)->save($save_link);
            // photo upload code end here
            $blog_area_data->blog_photo=$new_blog_photo_name;
        };
        $blog_area_data->headline_one=$request->headline_one;
        $blog_area_data->short_description=$request->short_description;
        $blog_area_data->headline_two=$request->headline_two;
        $blog_area_data->long_description=$request->long_description;
        $blog_area_data->save();

        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home_blog_area  $home_blog_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($home_blog_id)
    {
        Home_blog_area::find($home_blog_id)->delete();
        return back()->with('delete_message','Delete complated!');
    }
    // restore & forcedelete code start here
    public function blog_restore($id)
    {
        Home_blog_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function blog_force_delete($id)
    {
        unlink(public_path('upload_photos/blog-front-photo/').Home_blog_area::onlyTrashed()->find($id)->blog_front_photo);
        unlink(public_path('upload_photos/blog-display-photo/').Home_blog_area::onlyTrashed()->find($id)->blog_display_photo);
        unlink(public_path('upload_photos/blog-photo/').Home_blog_area::onlyTrashed()->find($id)->blog_photo);
        Home_blog_area::onlyTrashed()->where('id',$id)->forcedelete();
        return back();
    }
    // restore & forcedelete code end here

    // ==================================================Home_blog_area code end here==========================

    // ==========================================blog_head_update code start here==========================
    public function blog_head_update(Request $request,Home_blog_head $blog_head_id)
    {
        $request->validate([
            '*'=>'required',
        ]);
        $blog_head_id->title=$request->title;
        $blog_head_id->subtitle=$request->subtitle;
        $blog_head_id->save();
        return back()->with('update_head_message','Update Complated!');
    }
    // ==========================================blog_head_update code end here==========================

    // ==========================================social_icon_create code start here========================
    public function social_icon_create()
    {
        $deleted_blog_social_icon=Home_blog_social_icon::onlyTrashed()->latest()->get();
        $blog_social_icon=Home_blog_social_icon::latest()->get();
        return view('home-blog-area.social_icon',compact('blog_social_icon','deleted_blog_social_icon'));
    }
    public function social_icon_post(Request $request)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);

        Home_blog_social_icon::insert([
            'social_icon'=>$request->social_icon,
            'social_icon_link'=>$request->social_icon_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('icon_message','Icon added successfully!');
    }
    public function blog_icon_editpage(Home_blog_social_icon $blog_icon_id)
    {
        return view('home-blog-area.iconEditPage',compact('blog_icon_id'));
    }
    public function blog_social_icon_update(Request $request,Home_blog_social_icon $blog_icon_id)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);
        $blog_icon_id->social_icon=$request->social_icon;
        $blog_icon_id->social_icon_link=$request->social_icon_link;
        $blog_icon_id->save();
        return back()->with('update_message','Update Complated!');
    }
    public function blog_icon_delete(Home_blog_social_icon $blog_icon_id)
    {
        $blog_icon_id->delete();
        return back()->with('icon_delete_message','Delete Complated!');
    }
    //social icon deleted data restore & forceDelete code start here
    public function restore_blog_social_icon($id)
    {
    Home_blog_social_icon::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function blog_social_icon_forceDelete($id)
    {
    Home_blog_social_icon::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //social icon deleted data restore & forceDelete code end here

    // ==========================================social_icon_create code end here========================

    // ==========================================blog_comment_data code start here========================
    public function blog_comment_data()
    {
        $delete_blog_comment_data_all=Home_blog_comment_area::onlyTrashed()->latest()->get();
        $blog_comment_data_all=Home_blog_comment_area::latest()->get();
        return view('home-blog-area.blog-comment-data-show.comment_data_list',compact('blog_comment_data_all','delete_blog_comment_data_all'));
    }
    public function blog_comment_data_delete(Home_blog_comment_area $id)
    {
        $id->delete();
        return back()->with('delete_message','Delete Complated!');
    }
    //deleted data restore & forceDelete code start here
    public function blog_comment_data_restore($id)
    {
        Home_blog_comment_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function blog_comment_data_force_delete($id)
    {
        Home_blog_comment_area::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //deleted data restore & forceDelete code end here

    // ==========================================blog_comment_data code end here========================
}
