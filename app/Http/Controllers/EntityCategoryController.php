<?php

namespace App\Http\Controllers;

use App\EntityCategory;
use Illuminate\Http\Request;

class EntityCategoryController extends Controller
{
    // EntityCategory = categoria(s) de entidade
    // Ex: [{"id":1,"category":"Cliente"},{"id":2,"category":"Fornecedor"}]
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entityCategories = EntityCategory::all();		
		
        return view('entitycategory.index',compact('entityCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entitycategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EntityCategory::create($request->all());

        return redirect('entitycategory');
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
        $entityCategory = EntityCategory::find($id);

        return view('entitycategory.edit',compact('entityCategory'));
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
        EntityCategory::find($id)->fill($request->all())->update();

        return redirect('entitycategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entityCategory = EntityCategory::with('categoriesEntities')->find($id);
        if (count($entityCategory->categoriesEntities) > 0)
        {
            return redirect('entitycategory')->withErrors(['records'=>count($entityCategory->categoriesEntities)]);
        }else{
            $entityCategory->delete();
            return redirect('entitycategory');
        }
    }
}
