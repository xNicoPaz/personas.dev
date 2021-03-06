<?php

namespace App\Http\Controllers;

use Validator;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRegisterRequest;
use App\Http\Requests\SearchNameRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('paises.index')->with([
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRegisterRequest $request)
    {
        $country = Country::create([
            'name' => $request['name']
        ]);

        return redirect('/paises/' . $country->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('paises.details')->with([
            'country' => $country,
            'isEdit' => false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('paises.details')->with([
            'country' => $country,
            'isEdit' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRegisterRequest $request, Country $country)
    {
        $country->name = $request['name'];
        $country->save();

        return redirect('/paises/' . $country->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect('/paises');
    }


    public function query(SearchNameRequest $request){
        $countries = Country::whereName($request['searchName'])->get();
        return view('paises.index')->with([
            'countries' => $countries,
        ]);            
    }
}
