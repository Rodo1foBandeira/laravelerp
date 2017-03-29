<?php

namespace App\Http\Controllers;

use App\UnitMultiplier;
use Illuminate\Http\Request;

class UnitMultiplierController extends Controller
{
    const ROUTE = 'unitmultiplier';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitMultipliers = UnitMultiplier::all();

        return view($this::ROUTE.'.index',compact('unitMultipliers'));
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
        UnitMultiplier::create($request->all());

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
        $unitMultiplier = UnitMultiplier::find($id);

        return view($this::ROUTE.'.edit',compact('unitMultiplier'));
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
        UnitMultiplier::find($id)->fill($request->all())->update();

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
        $unitMultiplier = UnitMultiplier::with('productVariations')->find($id);
        if (count($unitMultiplier->productVariations) > 0)
        {
            return redirect($this::ROUTE)->withErrors(['records'=>count($unitMultiplier->productVariations)]);
        }else{
            $unitMultiplier->delete();
            return redirect($this::ROUTE);
        }
    }
}
