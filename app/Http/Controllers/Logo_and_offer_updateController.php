<?php

namespace App\Http\Controllers;

use App\Models\Favicon;
use App\Models\New_offer;
use App\Models\Project_logo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class Logo_and_offer_updateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    
    //==========================================project logo code start here================================
    public function logo_page(Project_logo $project_logo_id)
    {
        return view('logo-offer-folder.logo',compact('project_logo_id'));
    }
    public function logo_update(Request $request,Project_logo $project_logo_id)
    {
        $request->validate([
            'logo_photo'=>'mimes:png',
        ]);
        // photo upload code start here
        if($request->hasFile('logo_photo')){
            if($project_logo_id->logo_photo !='default_logo_photo.png'){
                unlink(public_path('upload_photos/logo-photo/').$request->old_photo);
            }

            // new photo name create
            $new_logo_name=Str::random(7).'.'.$request->file('logo_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/logo-photo/').$new_logo_name;
            Image::make($request->file('logo_photo'))->resize(145,75)->save($save_link);
            $project_logo_id->logo_photo=$new_logo_name;
        }
        // photo upload code end here
        $project_logo_id->save();
        return back()->with('update_message','Update Completed!');
    }
    //==========================================project logo code end here================================

    //==========================================favicon code start here==================================
    public function favicon_page(Favicon $favicon_id)
    {
        return view('logo-offer-folder.favicon',compact('favicon_id'));
    }
    public function favicon_update(Request $request, Favicon $favicon_id)
    {
        $request->validate([
            'favicon_photo'=>'mimes:png',
        ]);
        // photo upload code start here
        if($request->hasFile('favicon_photo')){
            if($favicon_id->favicon_photo !='default_favicon.png'){
                unlink(public_path('upload_photos/favicon/').$request->old_photo);
            }
            // new photo name create
            $new_favicon_name=Str::random(7).'.'.$request->file('favicon_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/favicon/').$new_favicon_name;
            Image::make($request->file('favicon_photo'))->resize(16,16)->save($save_link);
            $favicon_id->favicon_photo=$new_favicon_name;
        }
        // photo upload code end here
        $favicon_id->save();
        return back()->with('update_message','Update Completed!');
    }
    //==========================================favicon code end here========================================

    //==========================================offer data code start here======================================
    public function offer_page(New_offer $offer_data_id)
    {
        return view('logo-offer-folder.offer',compact('offer_data_id'));
    }
    public function offer_data_update(Request $request, New_offer $offer_data_id)
    {
        $request->validate([
            'offer_title'=>'required',
        ]);

        $offer_data_id->offer_title=$request->offer_title;
        $offer_data_id->save();
        return back()->with('update_message','Update Completed!');

    }
    //==========================================offer data code end here========================================

}
