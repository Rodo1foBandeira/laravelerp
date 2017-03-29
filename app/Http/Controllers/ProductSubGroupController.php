<?php

namespace App\Http\Controllers;

use App\ProductGroup;
use App\ProductSubGroup;
use Illuminate\Http\Request;

class ProductSubGroupController extends Controller
{
    const ROUTE = 'productsubgroup';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSubGroups = ProductSubGroup::with('group')->get();

        return view($this::ROUTE.'.index',compact('productSubGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productGroups = ProductGroup::pluck('pgname','id');
        return view($this::ROUTE.'.create',compact('productGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductSubGroup::create($request->all());

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
        $productSubGroup =ProductSubGroup::find($id);
        $productGroups = ProductGroup::pluck('pgname','id');
        return view($this::ROUTE.'.edit',compact('productSubGroup','productGroups'));
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
        ProductSubGroup::find($id)->fill($request->all())->update();

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
        $productSubGroup = ProductSubGroup::with('products')->find($id);
        if (count($productSubGroup->products) > 0)
        {
            return redirect($this::ROUTE)->withErrors(['records'=>count($productSubGroup->products)]);
        }else{
            $productSubGroup->delete();
            return redirect($this::ROUTE);
        }
    }

    public function getSubGroups($id){
        $subGroups = ProductSubGroup::where('group_id',$id)->select('id','psname')->orderBy('psname','asc')->get();
        return response()->json($subGroups);
    }
}
