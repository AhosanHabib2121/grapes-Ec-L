<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;


class CategoryController extends Controller
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
        return view('category.index',[
            'category_all_info'=>category::all(),
            'delete_category'=>category::onlyTrashed()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category_name'=>'required|unique:categories',
            'category_photo'=>'required|mimes:jpeg,png,jpg,webp'
        ],[
            'category_name.required'=>'Please enter the category name then try!',
            'category_name.unique'=>'Already taken this name please new name take then try',
            'category_photo.required'=>'Please enter the photo then try!',
        ]);
        // photo upload code start here
            // new photo name create
            $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('category_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload_photos/category-photos/').$new_name;
            Image::make($request->file('category_photo'))->resize(600,328)->save($save_link);
        // photo upload code end here
        category::insert([
            'category_name'=>$request->category_name,
            'category_photo'=>$new_name,
            'create_by'=>auth()->id(),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit_page',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name'=>'required|unique:categories,category_name,'.$category->id
        ],[
            'category_name.required'=>'Please enter the category name then try!',
            'category_name.unique'=>'Already taken this name please new name take then try'
        ]);
        // option-1
            // $category->update([
            //     'category_name'=>$request->category_name
            // ]);

        // option-2
            $category->category_name=$request->category_name;
            $category->save();
            return back()->with('success_message','Category name edit successfully! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('delete_message','Category name delete complated!');
    }
    public function category_restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function category_force_delete($id)
    {
        unlink(public_path('upload_photos/category-photos/').category::onlyTrashed()->find($id)->category_photo);
        Category::onlyTrashed()->find($id)->forceDelete();
        Subcategory::where('category_id',$id)->forceDelete();
        return back();
    }
}
?>
