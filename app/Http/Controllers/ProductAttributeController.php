<?php

namespace App\Http\Controllers;

use App\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
	// ProductAttribute = Atributos de produto
    // Ex:
    //  [
    //          {"id":1,"apattribute":"Branco","apkey":"cor","apvalue":"#ffffff"},
    //          {"id":2,"apattribute":"GG","apkey":"tamanho","apvalue":"GG"}
    //  ]
	
    const ROUTE = 'productattribute';
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAttributes = ProductAttribute::all();

        return view($this::ROUTE.'.index',compact('productAttributes'));
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
        ProductAttribute::create($request->all());

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
        $productAttribute = ProductAttribute::find($id);

        return view($this::ROUTE.'.edit',compact('productAttribute'));
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
       ProductAttribute::find($id)->fill($request->all())->update();

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
        $productAttribute = ProductAttribute::with('attributesProducts')->find($id);
        if (count($productAttribute->attributesProducts) > 0)
        {
            return redirect($this::ROUTE)->withErrors(['records'=>count($productAttribute->attributesProducts)]);
        }else{
            $productAttribute->delete();
            return redirect($this::ROUTE);
        }
    }
}
