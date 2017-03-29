<?php

namespace App\Http\Controllers;

use App\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    const ROUTE = 'productgroup';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productGroups = ProductGroup::all();

        return view($this::ROUTE.'.index',compact('productGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this::ROUTE.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductGroup::create($request->all());

        return redirect($this::ROUTE);
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
        $productGroup = ProductGroup::find($id);

        return view($this::ROUTE.'.edit',compact('productGroup'));
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
        ProductGroup::find($id)->fill($request->all())->update();

        return redirect($this::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productGroup = ProductGroup::with('products','subGroups')->find($id);
        if ((count($productGroup->products) > 0) || (count($productGroup->subGroups) > 0))
        {
            return redirect($this::ROUTE)->withErrors(['records'=>count($productGroup->products)+count($productGroup->subGroups)]);
        }else{
            $productGroup->delete();
            return redirect($this::ROUTE);
        }
    }
}
