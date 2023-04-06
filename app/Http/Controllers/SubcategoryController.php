<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Subcategory;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
        $subcategory_info=Subcategory::all();
        return view('subcategory.index',compact('subcategory_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategory.create',[
            'category_info'=>category::all()
        ]);
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
            '*'=>'required|unique:subcategories,subcategory_name'
        ],[
            'category_id.required'=>'Please enter the category name then try!',
            'subcategory_name.required'=>'Please enter the subcategory name then try!',
            'subcategory_name.unique'=>'Already taken this name please new name take then try'
        ]);
        // option-1
            // Subcategory::insert([
            //     'category_id'=>$request->category_id,
            //     'subcategory_name'=>$request->subcategory_name,
            //     'added_by'=>auth()->user()->id,
            //     'created_at'=>Carbon::now()
            // ]);

        // option-2
            // $subcategory=new Subcategory;
            // $subcategory->category_id=$request->category_id;
            // $subcategory->subcategory_name=$request->subcategory_name;
            // $subcategory->added_by=auth()->user()->id;
            // $subcategory->created_at=Carbon::now();
            // $subcategory->save();

        // option-3
            // Subcategory::insert($request->except('_token')+[
            //     'added_by'=>auth()->user()->id,
            //     'created_at'=>Carbon::now()
            // ]);

        // option-4
            Subcategory::create($request->except('_token'));

        return back()->with('success_message','The Subcategory Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
