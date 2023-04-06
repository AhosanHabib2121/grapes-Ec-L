<?php

namespace App\Http\Controllers;

use App\Models\Contact_from;
use App\Models\Contact_head;
use App\Models\Contact_map_link;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //=============================================contact_head code start here================================
    public function contact_head_page(Contact_head $contact_head_id)
    {
        return view('contact-head.index',compact('contact_head_id'));
    }
    public function contact_head_update(Request $request, Contact_head $contact_head_id)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $contact_head_id->short_description=$request->short_description;
        $contact_head_id->save();
        return back()->with('update_message','Update Complated!');
    }
    //=============================================contact_head code end here================================

    //=============================================contact from data code start here============================
    public function contact_data_add(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        Contact_from::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
    public function contact_from_data_show()
    {
        $contact_from_data=Contact_from::latest()->get();
        return view('contact-head.contact-from.index',compact('contact_from_data'));
    }
    public function contact_from_delete(Contact_from $contact_id)
    {
        $contact_id->delete();
        return back()->with('delete_message','Delete Complated!');
    }
    //=============================================contact from data code end here==============================

    //=============================================contact embed link code start here============================
    public function contact_embed_page(Contact_map_link $contact_map_id)
    {
        return view('contact-head.contact-embed-link.embed_link',compact('contact_map_id'));
    }
    public function contact_embed_link_update(Request $request,Contact_map_link $contact_map_id)
    {
        $request->validate([
            '*'=>'required',
        ]);
        $contact_map_id->embed_map_link=$request->embed_map_link;
        $contact_map_id->save();
        return back()->with('update_message','Update Complated!');
    }
    //=============================================contact embed link code end here==============================
}
