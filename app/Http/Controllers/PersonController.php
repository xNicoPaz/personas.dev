<?php

namespace App\Http\Controllers;

use App\Person;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRegisterRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRegisterRequest $request)
    {
        if($request['picture'] !== null){
            $pictureFile = $request->file('picture');
            $mime = $pictureFile->getMimeType();
            $base64Data = base64_encode(file_get_contents($pictureFile->getRealPath()));
            $base64Picture = "data:" . $mime . "; base64, " . $base64Data;            
        }else{
            $base64Picture = null;
        }

        $person = Person::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'dni' => $request['dni'],
            'birthdate' => $request['birthdate'],
            'picture' => $base64Picture,
            'address' => $request['address'],
            'town_id' => $request['town_id']
        ]);

        return redirect('/personas/' . $person->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        $towns = Town::all();
        return view('personas.details')->with([
            'person' => $person,
            'towns' => $towns,
            'isEdit' => false
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();
    }
}
