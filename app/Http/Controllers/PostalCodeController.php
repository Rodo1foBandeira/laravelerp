<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\PostalCode;
use App\State;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postalCodes = PostalCode::with('city.state')->get();
        return view('postalcode.index',compact('postalCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $states = State::where('country_id',$countries[0]->id)->get();
        $cities = City::where('state_id',$states[0]->id)->pluck('city','id');
        $countries = $countries->pluck('country','id');
        $states = $states->pluck('state','id');
        return view('postalcode.create',compact('cities','countries','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PostalCode::create($request->all());
        return redirect('postalcode');
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
        $postalCode = PostalCode::with('city.state.country')->find($id);
        $countries = Country::pluck('country','id');
        $states = State::find($postalCode->city->state->id)->pluck('state','id');
        $cities = City::find($postalCode->city->id)->pluck('city','id');
        return view('postalcode.edit',compact('postalCode','cities','states','countries'));
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
        PostalCode::find($id)->fill($request->all())->update();
        return redirect('postalcode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postalCode = PostalCode::with('entities')->find($id);
        if (count($postalCode->entities) > 0)
        {
            return redirect('postalcode')->withErrors(['records'=>count($postalCode->entities)]);
        }else{
            $postalCode->delete();
            return redirect('postalcode');
        }
    }

    public function getPostalCodes($id){
        $postalCodes = PostalCode::where('city_id',$id)->select('id','code')->orderBy('code')->get();
        return response()->json($postalCodes);
    }
}
