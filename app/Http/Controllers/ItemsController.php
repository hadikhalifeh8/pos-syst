<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItems;
use App\Models\categoriesModel;
use App\Models\itemsModel;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = itemsModel::all();
        $category = categoriesModel::all();
        return view('Pages.Items.items', compact('items','category'));
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
    public function store(StoreItems $request)
    {
        if($request->hasfile('photo'))
        {
         $file = $request->file('photo')  ;
            
    $name = $file->getClientOriginalName();
    $file->storeAs('attachments/items/', $file->getClientOriginalName(),'upload_attachments');


  
            $items = new itemsModel();
            $items->category_id = $request->category;
            $items->name = $request->name; 
            $items->image = $name;
            $items->price = $request->price;
        
            $items->save();
    
            toastr()->success('Items Data Saved Successfully');
            return redirect()->route('items.index'); 
        }
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
    public function update(StoreItems $request)
    {
        $items = itemsModel::findOrFail( $request->id);

        if($request->hasfile('photo'))
        {
         $file = $request->file('photo')  ;
            
    $name = $file->getClientOriginalName();
    $file->storeAs('attachments/items/', $file->getClientOriginalName(),'upload_attachments');


  
            
            $items->category_id = $request->category;
            $items->name = $request->name; 
            $items->image = $name;
            $items->price = $request->price;
        
            $items->save();
    
            toastr()->success('Items Data Updated Successfully');
            return redirect()->route('items.index'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $items = itemsModel::findOrFail($request->id)->delete();

        toastr()->error('Items Data Deleted Successfully');
        return redirect()->route('items.index');
    }
}
