@extends('layouts.public')
@section('content')
	<div style="display:inline;">
		<h1 class="my-4">Detalles de {{ $person->first_name }} </h1>
		<a href="{{ url('personas/' . $person->id . '/detalles') }}">
		<button class="btn btn-primary">
			<i style="color:yellow" class="fa fa-pencil"></i> Editar
		</button>
		</a>
		<a id="deletePersonLink" href="">
		<button class="btn btn-warning">
			<i style="color:red" class="fa fa-trash"></i> Eliminar
		</button>
		</a>		
	</div>

	<hr>
	@if($isEdit)
	<form action="{{ url('/personas/' . $person->id) }}" method="POST">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
	@else
	<form>
	@endif
		<div class="form-group">
			<label for="first_name" class="col-lg-2">Nombre</label>
			<input type="text" class="custom-input col-lg-7" name="first_name" @if(!$isEdit) disabled @endif value="{{ $person->first_name }}">
		</div>
		<div class="form-group">
			<label for="last_name" class="col-lg-2">Apellido</label>
			<input type="text" class="custom-input col-lg-7" name="last_name" @if(!$isEdit) disabled @endif value="{{ $person->last_name }}">
		</div>
		<div class="form-group">
			<label for="dni" class="col-lg-2">DNI</label>
			<input type="number" class="custom-input col-lg-7" name="dni" @if(!$isEdit) disabled @endif value="{{ $person->dni }}">
		</div>
		<div class="form-group">
			<label for="birthdate" class="col-lg-2">Fecha de nacimiento</label>
			<input type="date" class="custom-input col-lg-7" name="birthdate" @if(!$isEdit) disabled @endif value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $person->birthdate)->toDateString() }}">
		</div>
		<div class="form-group">
			<label for="picture" class="col-lg-2">Imagen</label>
			<img 
			@if($person->picture !== null)
			 style="width:300px; height: 300px; display:block; margin: auto;" src="{{ $person->picture }}" 
			@else
			 style="display:none;" 
			@endif
			 alt="Imagen de perfil">
			@if($isEdit)
				<input type="text" class="custom-input col-lg-7">	
			@endif
		</div>
		<div class="form-group">
			<label for="address" class="col-lg-2">Dirección</label>
			<input type="text" class="custom-input col-lg-7 form-control" name="address" @if(!$isEdit) disabled @endif value="{{ $person->address }}">
		</div>
		<div class="form-group">
			<label for="" class="col-lg-2">Localidad</label>
			<select class="col-lg-7 custom-input form-control" name="town_id" @if(!$isEdit) disabled @endif>
			@foreach($towns as $town)
				<option value="{{ $town->id }}" 
					@if($person->town->id === $town->id)
						selected 
					@endif
					 >{{ $town->name }}
				</option>
			@endforeach
			</select>
		</div>
	</form>
@endsection
