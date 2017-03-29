<?php

namespace App\Http\Controllers;

use App\Http\Requests\MUnitSystemRequest;
use App\MUnitSystem;
use Illuminate\Http\Request;

class MUnitSystemController extends Controller
{
    const ROUTE = 'munitsystem';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mUnitSystems = MUnitSystem::all();

        return view($this::ROUTE.'.index',compact('mUnitSystems'));
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
    public function store(MUnitSystemRequest $request)
    {
        MUnitSystem::create($request->all());

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
        $mUnitSystem = MUnitSystem::find($id);

        return view($this::ROUTE.'.edit',compact('mUnitSystem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MUnitSystemRequest $request, $id)
    {
        MUnitSystem::find($id)->fill($request->all())->update();

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
        $mUnitSystem = MUnitSystem::with('productVariations')->find($id);
        if (count($mUnitSystem->productVariations) > 0)
        {
            return redirect($this::ROUTE)->withErrors(['records'=>count($mUnitSystem->productVariations)]);
        }else{
            $mUnitSystem->delete();
            return redirect($this::ROUTE);
        }
    }
}
