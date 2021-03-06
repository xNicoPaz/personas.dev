<?php

namespace App\Http\Controllers;

use App\Town;
use App\Province;
use Illuminate\Http\Request;
use App\Http\Requests\TownRegisterRequest;
use App\Http\Requests\SearchNameRequest;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = Town::all();
        return view('localidades.index')->with([
            'towns' => $towns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TownRegisterRequest $request)
    {
        $town = Town::create([
            'name' => $request['name'],
            'province_id' => $request['province_id'],
        ]);

        return redirect('/localidades/' . $town->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show(Town $town)
    {
        $provinces = Province::all();
        return view('localidades.details')->with([
            'town' => $town,
            'provinces' => $provinces,
            'isEdit' => false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function edit(Town $town)
    {
        $provinces = Province::all();
        return view('localidades.details')->with([
            'town' => $town,
            'provinces' => $provinces,
            'isEdit' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function update(TownRegisterRequest $request, Town $town)
    {
        $town->name = $request['name'];
        $town->province_id = $request['province_id'];
        $town->save();

        return redirect('/localidades/' . $town->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function destroy(Town $town)
    {
        $town->delete();
        return redirect('/localidades');
    }

    public function query(SearchNameRequest $request){
        $towns = Town::whereName($request['searchName'])->get();
        return view('localidades.index')->with([
            'towns' => $towns
        ]);
    }
}
