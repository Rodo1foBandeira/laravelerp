<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::with('country')->get();

        return view('state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('country','id');
        return view('state.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        State::create($request->all());

        return redirect('state');
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
        $countries = Country::pluck('country','id');
        $state = State::find($id);
        return view('state.edit',compact('state','countries'));
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
        State::find($id)->fill($request->all())->update();
        return redirect('state');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::with('cities')->find($id);
        if (count($state->cities) > 0)
        {
            return redirect('state')->withErrors(['records'=>count($state->cities)]);
        }else{
            $state->delete();
            return redirect('state');
        }
    }

    public function getStates($id){
        $states = State::where('country_id',$id)->select('id','state')->orderBy('state','asc')->get();
        return response()->json($states);
    }
}
