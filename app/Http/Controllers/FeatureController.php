<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkroll');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feature.index',[
            'feature_all_info'=>Feature::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feature.create');
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
            'feature_title'=>'required|unique:features',
            'sub_title'=>'required|unique:features',
            'feature_photo'=>'required|Image'
        ],[
            'feature_title.required'=>'Please enter the feature_title then try!',
            'sub_title.required'=>'Please enter the sub_title then try!',
            'feature_photo.required'=>'Please enter the photo then try!',
        ]);
        // photo upload code start here
            // new photo name create
            $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('feature_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/feature-photos/').$new_name;
            Image::make($request->file('feature_photo'))->resize(46,34)->save($save_link);
        // photo upload code end here
        Feature::insert([
            'feature_title'=>$request->feature_title,
            'sub_title'=>$request->sub_title,
            'feature_photo'=>'upload_photos/feature-photos/'.$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('feature.edit_page',compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $feature->feature_title=$request->feature_title;
        $feature->sub_title=$request->sub_title;
        // photo upload code start here
            if($request->hasFile('new_photo')){
                unlink($request->old_photo);
                // new photo name create
                $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                // new photo upload
                $save_link=public_path('upload_photos/feature-photos/').$new_name;
                Image::make($request->file('new_photo'))->resize(46,34)->save($save_link);
                $feature->feature_photo='upload_photos/feature-photos/'.$new_name;
            }
        // photo upload code end here
        $feature->save();
        return back()->with('success_message','Edit completed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        unlink(Feature::find($feature->id)->feature_photo);
        $feature->delete();
        return back()->with('delete_message','deleted complated!');

    }
}
