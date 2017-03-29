<?php

namespace App\Http\Controllers;

use App\MUnitSystem;
use App\ProductVariation;
use App\UnitMultiplier;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    const ROUTE = 'productvariation';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productVariations = ProductVariation::with('product','mUnitSystem','unitMultiplier');

        return view($this::ROUTE.'.index',compact('productVariations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mUnitSystems = MUnitSystem::pluck('unit','id');
        $unitMultipliers = UnitMultiplier::pluck('multiplier','id');
        return view($this::ROUTE.'.create',compact('mUnitSystems','unitMultipliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductVariation::create($request->all());

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
        $mUnitSystems = MUnitSystem::pluck('unit','id');
        $unitMultipliers = UnitMultiplier::pluck('multiplier','id');
        $productVariation = ProductVariation::find($id);

        return view($this::ROUTE.'.edit',compact('productVariation','mUnitSystems','unitMultipliers'));
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
        productVariation::find($id)->fill($request->all())->update();

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
        $productVariation = ProductVariation::with('attributesProducts')->find($id);
        if (count($productVariation->attributesProducts) > 0)
        {
            return redirect($this::ROUTE)->withErrors(['records'=>count($productVariation->attributesProducts)]);
        }else{
            $productVariation->delete();
            return redirect($this::ROUTE);
        }
    }
}
