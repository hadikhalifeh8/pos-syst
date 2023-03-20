<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Models\categoriesModel;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = categoriesModel::all();
        return view('Pages.category.category', compact('category'));
        
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
    public function store(StoreCategory $request)
    {
        $category = new categoriesModel();
          
            $category->name = $request->name;
           
        
            $category->save();
    
            toastr()->success('category Data Saved Successfully');
            return redirect()->route('categories.index'); 
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request)
    {
        $category = categoriesModel::findOrFail( $request->id);

       

  
            
           
            $category->name = $request->name; 
           
            $category->save();
    
            toastr()->success('category Data Updated Successfully');
            return redirect()->route('categories.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = categoriesModel::findOrFail($request->id)->delete();

        toastr()->error('category Data Deleted Successfully');
        return redirect()->route('items.index');
    }
}
