<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\ProductCategory;
use App\ProductGroup;
use App\ProductSubGroup;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const ROUTE = 'product';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand','group','subGroup','category')->get();

        return view($this::ROUTE.'.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::pluck('brname','id');
        $groups = ProductGroup::all();
        $subGroups = ProductSubGroup::where('group_id',isset($groups[0]->id) ? $groups[0]->id : 1)->pluck('psname','id');
        $groups = $groups->pluck('pgname','id');
        $categories = ProductCategory::pluck('pcname','id');
        return view($this::ROUTE.'.create',compact('brands','groups','subGroups','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());

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
        $product = Product::with('group')->find($id);
        $brands = Brand::pluck('brname','id');
        $groups = ProductGroup::pluck('pgname','id');
        $subGroups = ProductSubGroup::where('group_id',$product->group->id)->pluck('psname','id')->get();
        $categories = ProductCategory::pluck('pcname','id');
        return view($this::ROUTE.'.edit',compact('product','brands','groups','subGroups','categories'));
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
        Product::find($id)->fill($request->all())->update();

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
        $product = Product::with('productVariations')->find($id);
        if (count($product->productVariations) > 0)
        {
            return redirect($this::ROUTE)->withErrors(['records'=>count($product->productVariations)]);
        }else{
            $product->delete();
            return redirect($this::ROUTE);
        }
    }
}
