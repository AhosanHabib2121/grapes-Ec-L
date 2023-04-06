<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class BannerController extends Controller
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
        return view('banner.index',[
            'banner_all_info'=>Banner::latest()->get(),
            'delete_banner'=>Banner::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
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
            'offer_message'=>'required|unique:banners',
            'banner_title'=>'required|unique:banners',
            'banner_photo'=>'required|Image'
        ],[
            'offer_message.required'=>'Please enter the offer_message then try!',
            'banner_title.required'=>'Please enter the banner_title then try!',
            'banner_photo.required'=>'Please enter the photo then try!',
        ]);
        // photo upload code start here
            // new photo name create
            $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/banner-photos/').$new_name;
            Image::make($request->file('banner_photo'))->resize(608,552)->save($save_link);
        // photo upload code end here
        Banner::insert([
            'offer_message'=>$request->offer_message,
            'banner_title'=>$request->banner_title,
            'banner_photo'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit_page',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->offer_message=$request->offer_message;
        $banner->banner_title=$request->banner_title;
        // photo upload code start here
            if($request->hasFile('new_photo')){
                unlink(public_path('upload_photos/banner-photos/').$request->old_photo);
                // new photo name create
                $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/banner-photos/').$new_name;
                Image::make($request->file('new_photo'))->resize(608,552)->save($save_link);
                $banner->banner_photo=$new_name;
            }
        // photo upload code end here
        $banner->save();
        return back()->with('success_message','Edit completed!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('delete_message','deleted complated!');
    }
    // restore & forcedelete code start here
    public function restore($id)
    {
        Banner::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function forcedelete($id)
    {
        unlink(public_path('upload_photos/banner-photos/').Banner::onlyTrashed()->find($id)->banner_photo);
        Banner::onlyTrashed()->where('id',$id)->forcedelete();
        return back();
    }
    // restore & forcedelete code end here
}
