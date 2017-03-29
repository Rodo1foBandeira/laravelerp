<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('state')->get();
        return view('city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $states = State::where('country_id',$countries[0]->id)->pluck('state','id');
        $countries = $countries->pluck('country','id');
        return view('city.create',compact('states','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        City::create($request->all());
        return redirect('city');
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
        $city = City::with('state.country')->find($id);
        $countries = Country::pluck('country','id');
        $states = State::find($city->state->id)->pluck('state','id');

        return view('city.edit',compact('city','countries','states'));
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
        City::find($id)->fill($request->all())->update();
        return redirect('city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::with('postalCodes')->find($id);
        if (count($city->postalCodes) > 0)
        {
            return redirect('city')->withErrors(['records'=>count($city->postalCodes)]);
        }else{
            $city->delete();
            return redirect('city');
        }
    }

    public function getCities($id){
        $cities = City::where('state_id',$id)->select('id','city')->orderBy('city','asc')->get();
        return response()->json($cities);
    }
}
