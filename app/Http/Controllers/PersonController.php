<?php

namespace App\Http\Controllers;

use Validator;
use App\Person;
use App\Town;
use App\Province;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\PersonRegisterRequest;
use Illuminate\Database\Eloquent\Collection;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();
        return view('personas.index')->with([
            'people' => $people
        ]);
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
        $person = Person::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'dni' => $request['dni'],
            'birthdate' => $request['birthdate'],
            'picture' => $this->base64PictureDataOrNull($request),
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
        $towns = Town::all();
        return view('personas.details')->with([
            'person' => $person,
            'towns' => $towns,
            'isEdit' => true
        ]);
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
        $rules = [
            'first_name' => 'required|alpha_spaces|max:100',
            'last_name' => 'required|alpha_spaces|max:100',
            // 'dni' => [
            //     'required',
            //     'integer',
            //     'digits_between:7,8',
            //     //De esta manera se logra ignorar el dni actual de la persona. Sino tendria que estar siempre cambiando de DNI
            //     Rule::unique('people')->ignore($person->dni, 'dni'),
            // ],
            'dni' => 'required|integer|digits_between:7,8',
            'birthdate' => 'required|date',
            //50KB de tamaño maximo para fotos
            'picture' => 'nullable|image|max:50',
            'address' => 'required|alpha_num_spaces|max:100',
            'town_id' => 'required|integer|exists:towns,id'
        ];
        $messages = [
            'first_name.required' => 'El nombre es obligatorio',
            'first_name.alpha_spaces' => 'El nombre solo puede contener letras y espacios',
            'first_name.max' => 'El nombre solo puede contener hasta 100 caracteres',
            'last_name.required' => 'El apellido es obligatorio',
            'last_name.alpha_spaces' => 'El apellido solo puede contener letras y espacios',
            'last_name.max' => 'El apellido solo puede contener hasta 100 caracteres',
            'dni.required' => 'El DNI es obligatorio',
            'dni.integer' => 'El DNI debe ser un numero entero, no ingrese puntos ni comas',
            'dni.digits_between' => 'El DNI debe tener entre 7 y 8 digitos',
            'dni.unique' => 'Este DNI ya se encuentra registrado',
            'birthdate.required' => 'La fecha de nacimiento es obligatoria',
            'birthdate.date' => 'La fecha de nacimiento es incorrecta',
            'picture.image' => 'La imagen debe ser un archivo de imagen valido (png, jpeg, etc)',
            'picture.max' => 'La imagen puede pesar a lo sumo 50KB ',
            'address.required' => 'La dirección es obligatoria',
            'address.alpha_num_spaces' => 'La dirección solo puede contener letras, numeros y espacios',
            'address.max' => 'La dirección solo puede contener hasta 100 caracteres',
            'town_id.required' => 'Debe seleccionar una localidad registrada',
            'town_id.integer' => 'La localidad ingresada es incorrecta',
            'town_id.exists' => 'La localidad ingresada no se encuentra registrada'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $posibleSamePerson = Person::whereDni($person->dni)->get()[0];
        if($validator->fails() || $person->id !== $posibleSamePerson->id){
            return redirect('/personas/' . $person->id . '/editar')
                ->withErrors($validator)
                ->withInput();
        }else{
            $person->first_name = $request['first_name'];
            $person->last_name = $request['last_name'];
            $person->dni = $request['dni'];
            if($request['picture'] !== null){
                $person->picture = $this->base64PictureDataOrNull($request);
            }
            $person->birthdate = $request['birthdate'];
            $person->address = $request['address'];
            $person->town_id = $request['town_id'];
            $person->save();

            return redirect('/personas/' . $person->id);            
        }
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
        return redirect('/personas');
    }

    public function showPeopleByTown(Town $town){
        $people = $town->people;
        return view('personas.index')->with([
            'people' => $people
        ]);
    }

    public function showPeopleByProvince(Province $province){
        $people = new Collection();
        $towns = $province->towns;

        foreach ($towns as $town) {
            $people = $people->merge($town->people);
        }

        return view('personas.index')->with([
            'people' => $people
        ]);
    }

    public function showPeopleByCountry(Country $country){
        $people = new Collection();
        $provinces = $country->provinces;

        foreach ($provinces as $province) {
            $towns = $province->towns;
            foreach ($towns as $town) {
                $people = $people->merge($town->people);
            }
        }

        return view('personas.index')->with([
            'people' => $people
        ]);
    }

    private function base64PictureDataOrNull($request){
        if($request['picture'] !== null){
            $base64Picture = Person::base64Picture($request->file('picture'));
        }else{
            $base64Picture = null;
        }        

        return $base64Picture;
    }
}
