<?php

namespace App\Http\Controllers;

use App\Models\Footer_describe;
use App\Models\Footer_social_icon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    // =======================================footer_describe code start here=================================
    public function footer_describe_page(Footer_describe $footer_info_id)
    {
        return view('footer-area.describe.index',compact('footer_info_id'));
    }
    public function footer_describe_update(Request $request,Footer_describe $footer_info_id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $footer_info_id->short_description=$request->short_description;
        $footer_info_id->save();
        return back()->with('update_message','Update Complated!');
    }
    // =======================================footer_describe code end here=================================

    // =======================================Footer social icon code start here================================
    public function footer_social_icon_create()
    {
        $deleted_footer_social_icon=Footer_social_icon::onlyTrashed()->latest()->get();
        $footer_social_icon=Footer_social_icon::latest()->get();
        return view('footer-area.social-icon.social_icon',compact('footer_social_icon','deleted_footer_social_icon'));
    }
    public function footer_social_icon_post(Request $request)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);

        Footer_social_icon::insert([
            'social_icon'=>$request->social_icon,
            'social_icon_link'=>$request->social_icon_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('icon_message','Icon added successfully!');
    }
    public function footer_icon_editpage(Footer_social_icon $footer_icon_id)
    {
        return view('footer-area.social-icon.iconEditPage',compact('footer_icon_id'));
    }
    public function footer_social_icon_update(Request $request,Footer_social_icon $footer_icon_id)
    {
        $request->validate([
            'social_icon'=>'required',
            'social_icon_link'=>'required',
        ]);
        $footer_icon_id->social_icon=$request->social_icon;
        $footer_icon_id->social_icon_link=$request->social_icon_link;
        $footer_icon_id->save();
        return back()->with('update_message','Update Complated!');
    }
    public function footer_icon_delete(Footer_social_icon $footer_icon_id)
    {
        $footer_icon_id->delete();
        return back()->with('icon_delete_message','Delete Complated!');
    }
    //social icon deleted data restore & forceDelete code start here
    public function restore_footer_social_icon($footer_icon_id)
    {
    Footer_social_icon::onlyTrashed()->where('id',$footer_icon_id)->restore();
        return back();
    }
    public function footer_social_icon_forceDelete($footer_icon_id)
    {
    Footer_social_icon::onlyTrashed()->where('id',$footer_icon_id)->forceDelete();
        return back();
    }
    //social icon deleted data restore & forceDelete code end here
    // =======================================Footer social icon code end here=================================
}
