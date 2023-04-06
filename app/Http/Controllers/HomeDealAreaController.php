<?php

namespace App\Http\Controllers;

use App\Models\Deal_area_background_photo;
use App\Models\Home_deal_area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class HomeDealAreaController extends Controller
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
        $delete_deal_area_info=Home_deal_area::onlyTrashed()->latest()->get();
        $deal_area_data=Home_deal_area::latest()->get();
        return view('deal-area.index',compact('deal_area_data','delete_deal_area_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deal_background_data=Deal_area_background_photo::first();
        return view('deal-area.create',compact('deal_background_data'));
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
            'category_name'=>'required',
            'title'=>'required',
            'deal_photo'=>'required|Image'
        ],[
            'category_name.required'=>'Please enter the category name then try!',
            'title.required'=>'Please enter the title then try!',
            'deal_photo.required'=>'Please enter the photo then try!',
        ]);
        // photo upload code start here
            // new photo name create
            $new_deal_photo_name=Str::random(7).'.'.$request->file('deal_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/deal-area-two-photos/').$new_deal_photo_name;
            Image::make($request->file('deal_photo'))->resize(536,374)->save($save_link);
        // photo upload code end here
        Home_deal_area::insert([
            'category_name'=>$request->category_name,
            'title'=>$request->title,
            'deal_photo'=>'upload_photos/deal-area-two-photos/'.$new_deal_photo_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home_deal_area  $home_deal_area
     * @return \Illuminate\Http\Response
     */
    public function show(Home_deal_area $home_deal_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home_deal_area  $home_deal_area
     * @return \Illuminate\Http\Response
     */
    public function edit($deal_area_id)
    {
        $deal_area_info=Home_deal_area::where('id',$deal_area_id)->first();
        return view('deal-area.edit_page',compact('deal_area_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home_deal_area  $home_deal_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $deal_area_id)
    {
        $request->validate([
            '*'=>'required',
        ]);
        $deal_area_data=Home_deal_area::where('id',$deal_area_id)->first();

        if($request->deal_photo == null){
            if($request->hasFile('deal_photo')){
                //deal_photo delete from file
                unlink($request->old_deal_photo);
                // photo upload code start here
                    // new photo name create
                    $new_deal_photo_name=Str::random(7).'.'.$request->file('deal_photo')->getClientOriginalExtension();
                    // new photo upload
                    $save_link=public_path('upload_photos/deal-area-two-photos/').$new_deal_photo_name;
                    Image::make($request->file('deal_photo'))->resize(536,374)->save($save_link);
                // photo upload code end here
                $deal_area_data->deal_photo='upload_photos/deal-area-two-photos/'.$new_deal_photo_name;
            };
            $deal_area_data->category_name=$request->category_name;
            $deal_area_data->title=$request->title;
            $deal_area_data->save();

            return back()->with('update_message','Update Complated!');
        }
        else{
            $status_deal_photo=true;
            if(!in_array($request->deal_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status_deal_photo=false;
            }
            if($status_deal_photo){
                if($request->hasFile('deal_photo')){
                    //deal_photo delete from file
                    unlink($request->old_deal_photo);
                    // photo upload code start here
                        // new photo name create
                        $new_deal_photo_name=Str::random(7).'.'.$request->file('deal_photo')->getClientOriginalExtension();
                        // new photo upload
                        $save_link=public_path('upload_photos/deal-area-two-photos/').$new_deal_photo_name;
                        Image::make($request->file('deal_photo'))->resize(536,374)->save($save_link);
                    // photo upload code end here
                    $deal_area_data->deal_photo='upload_photos/deal-area-two-photos/'.$new_deal_photo_name;
                };
            }
            else{
                return back()->with('file_format_error_deal_photo','there are one or many unsupported file in your attachment');
            }
            $deal_area_data->category_name=$request->category_name;
            $deal_area_data->title=$request->title;
            $deal_area_data->save();
            return back()->with('update_message','Update Complated!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home_deal_area  $home_deal_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($deal_area_id)
    {
        Home_deal_area::find($deal_area_id)->delete();
        return back()->with('delete_message','Delete Complated!');
    }

    // restore & forcedelete code start here
    public function deal_restore($id)
    {
        Home_deal_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function deal_force_delete($id)
    {
        unlink(Home_deal_area::onlyTrashed()->find($id)->deal_photo);
        Home_deal_area::onlyTrashed()->where('id',$id)->forcedelete();
        return back();
    }
    // restore & forcedelete code end here

    // deal_area_background code start here
    public function deal_area_background(Request $request ,Deal_area_background_photo $deal_background_id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $status_background_photo=true;
        if(!in_array($request->background_photo->getClientOriginalExtension(),['png','jpg','webp'])){
            $status_background_photo=false;
        }
        if($status_background_photo){
            if($request->hasFile('background_photo')){
                if($request->old_background_photo !='deal_area_default_background.jpg'){
                    //deal_photo delete from file
                    unlink(public_path('upload_photos/deal-area-one-photos/').$request->old_background_photo);
                }
                // photo upload code start here
                    // new photo name create
                    $new_name=Str::random(7).'.'.$request->file('background_photo')->getClientOriginalExtension();
                    // new photo upload
                    $save_link=public_path('upload_photos/deal-area-one-photos/').$new_name;
                    Image::make($request->file('background_photo'))->resize(1860,445)->save($save_link);
                // photo upload code end here
                $deal_background_id->background_photo=$new_name;
                $deal_background_id->save();
                return back()->with('update_message','Update Successfully!');
            };
        }
        else{
            return back()->with('file_format_error_background_photo','there are one or many unsupported file in your attachment');
        }
    }
    // deal_area_background code end here
}
