<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function  __construct(){
        $this->middleware('admin');
       
     }
     
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        if($request->slug){
            $category->slug = $request->slug;
        }
        else{
            $category->slug = Str::slug($category->name, '-');
        }
        $category->CountProducts = 0;
        $category->description = $request->description;
        $category->fontawesome = $request->fontawesome;
        if($request->hasFile('image')){
            $imageName = $request->name.time().'.'.$request->image->extension();
            $path = $request->file('image')->move('images', $imageName);
             $category->image = $imageName;
    }
    $category->save();
    return redirect(route('categories.index'))->with('success', 'New category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  Category::findOrFail($id);
        $categories = Category::paginate(10);
        return view('categories.index', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $category =  Category::findOrFail($id);
        $category->name = $request->name;
        if($request->slug){
            $category->slug = Str::slug($request->slug, '-');
        }
        else{
            $category->slug = Str::slug($category->name, '-');
        }
        $category->fontawesome = $request->fontawesome;
        $category->description = $request->description;
        if($request->hasFile('image')){
            $imageName = $request->name.time().'.'.$request->image->extension();
            $path = $request->file('image')->move('images', $imageName);
             $category->image = $imageName;
    }
    $category->update();
    return redirect(route('categories.index'))->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return Redirect()->back();
    }
}
