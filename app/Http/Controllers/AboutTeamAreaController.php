<?php

namespace App\Http\Controllers;

use App\Models\About_team_area;
use App\Models\About_team_social_icon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class AboutTeamAreaController extends Controller
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
        $deleted_about_team_all_data=About_team_area::onlyTrashed()->latest()->get();
        $about_team_all_data=About_team_area::latest()->get();
        return view('about-team-area.index',compact('about_team_all_data','deleted_about_team_all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about-team-area.create');
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
            'team_photo' => 'required|mimes:jpeg,png,jpg,webp',
        ]);
        // photo upload code start here
            // new photo name create
            $new_team_photo=Str::random(7).'.'.$request->file('team_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/about-team-area-photo/').$new_team_photo;
            Image::make($request->file('team_photo'))->resize(419,407)->save($save_link);
        // photo upload code end here
        About_team_area::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'team_photo'=>$new_team_photo,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_team_area  $about_team_area
     * @return \Illuminate\Http\Response
     */
    public function show(About_team_area $about_team_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_team_area  $about_team_area
     * @return \Illuminate\Http\Response
     */
    public function edit($about_team_id)
    {
        $about_team_data=About_team_area::where('id',$about_team_id)->first();
        return view('about-team-area.edit_page',compact('about_team_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_team_area  $about_team_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$about_team_id)
    {
        $about_team_info=About_team_area::where('id',$about_team_id)->first();
        $request->validate([
            '*'=>'required',
            'team_photo' => 'mimes:jpeg,png,jpg,webp',
        ]);

        if($request->hasFile('team_photo')){
            //team_photo delete from file
            unlink(public_path('upload_photos/about-team-area-photo/').$request->old_team_photo);
           // photo upload code start here
                // new photo name create
                $new_team_photo=Str::random(7).'.'.$request->file('team_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/about-team-area-photo/').$new_team_photo;
                Image::make($request->file('team_photo'))->resize(419,407)->save($save_link);
            // photo upload code end here
            $about_team_info->team_photo=$new_team_photo;
        };
        $about_team_info->name=$request->name;
        $about_team_info->title=$request->title;
        $about_team_info->save();
        return back()->with('update_message','Update Complated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_team_area  $about_team_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($about_team_id)
    {
        About_team_area::find($about_team_id)->delete();
        return back()->with('delete_message','Delete complated!');
    }
    // restore & forcedelete code start here
    public function team_restore($id)
    {
        About_team_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function team_force_delete($id)
    {
        unlink(public_path('upload_photos/about-team-area-photo/').About_team_area::onlyTrashed()->find($id)->team_photo);
        About_team_area::onlyTrashed()->where('id',$id)->forcedelete();
        return back();
    }
    // restore & forcedelete code end here

    // =========================================team_social_icon_create start here============================
    public function team_social_icon_create()
    {
        $deleted_team_social_icon=About_team_social_icon::onlyTrashed()->latest()->get();
        $team_social_icon=About_team_social_icon::latest()->get();
       return view('about-team-area.social_icon',compact('team_social_icon','deleted_team_social_icon'));
    }
    public function team_social_icon_post(Request $request)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);

        About_team_social_icon::insert([
            'social_icon'=>$request->social_icon,
            'social_icon_link'=>$request->social_icon_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('icon_message','Icon added successfully!');
    }
    public function team_icon_editpage(About_team_social_icon $social_icon_id)
    {
        return view('about-team-area.iconEditPage',compact('social_icon_id'));
    }
    public function team_social_icon_update(Request $request, About_team_social_icon $social_icon_id)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);
        $social_icon_id->social_icon=$request->social_icon;
        $social_icon_id->social_icon_link=$request->social_icon_link;
        $social_icon_id->save();
        return back()->with('update_message','Update Complated!');
    }
    public function team_icon_delete(About_team_social_icon $social_icon_id)
    {
        $social_icon_id->delete();
        return back()->with('icon_delete_message','Delete Complated!');
    }
    //social icon deleted data restore & forceDelete code start here
    public function restore_team_social_icon($id)
    {
    About_team_social_icon::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function team_social_icon_forceDelete($id)
    {
    About_team_social_icon::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
    //social icon deleted data restore & forceDelete code end here
    // =========================================team_social_icon_create end here==============================
}
