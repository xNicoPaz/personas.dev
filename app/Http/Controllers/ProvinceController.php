<?php

namespace App\Http\Controllers;

use App\Province;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests\ProvinceRegisterRequest;
use App\Http\Requests\SearchNameRequest;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return view('provincias.index')->with([
            'provinces' => $provinces
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provincias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRegisterRequest $request)
    {
        $province = Province::create([
            'name' => $request['name'],
            'country_id' => $request['country_id'],
        ]);

        return redirect('/provincias/' . $province->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        $countries = Country::all();
        return view('provincias.details')->with([
            'province' => $province,
            'countries' => $countries,
            'isEdit' => false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $countries = Country::all();
        return view('provincias.details')->with([
            'province' => $province,
            'countries' => $countries,
            'isEdit' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRegisterRequest $request, Province $province)
    {
        $province->name = $request['name'];
        $province->country_id = $request['country_id'];
        $province->save();
        
        return redirect('/provincias/' . $province->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $province->delete();
        return redirect('/provincias');
    }

    public function query(SearchNameRequest $request){
        $provinces = Province::whereName($request['searchName'])->get();
        return view('provincias.index')->with([
            'provinces' => $provinces
        ]);
    }
}
