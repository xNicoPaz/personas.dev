@extends('layouts.public')
@section('content')
	<div style="display:inline;">
		<h1 class="my-4">Detalles de {{ $person->first_name }} </h1>
		@if(!$isEdit)
		<a href="{{ url('personas/' . $person->id . '/editar') }}">
		<button class="btn btn-primary">
			<i style="color:yellow" class="fa fa-pencil"></i> Editar
		</button>
		</a>
		<a href="{{ url('/personas/' . $person->id . '/destruir') }}">
		<button class="btn btn-warning">
			<i style="color:red" class="fa fa-trash"></i> Eliminar
		</button>
		</a>
		@endif		
	</div>

	<hr>
	@if($isEdit)
	<form action="{{ url('/personas/' . $person->id) }}" method="POST">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
	@else
	<form>
	@endif
		<div class="form-group">
			<label for="first_name" class="col-lg-2">Nombre</label>
			<input type="text" class="custom-input form-control col-lg-7" name="first_name" @if(!$isEdit) disabled @endif value="{{ $person->first_name }}">
		</div>
		@include('partials.errors2', ['field' => 'first_name'])
		<div class="form-group">
			<label for="last_name" class="col-lg-2">Apellido</label>
			<input type="text" class="custom-input form-control col-lg-7" name="last_name" @if(!$isEdit) disabled @endif value="{{ $person->last_name }}">
		</div>
		@include('partials.errors2', ['field' => 'last_name'])
		<div class="form-group">
			<label for="dni" class="col-lg-2">DNI</label>
			<input type="number" class="custom-input form-control col-lg-7" name="dni" @if(!$isEdit) disabled @endif value="{{ $person->dni }}">
		</div>
		@include('partials.errors2', ['field' => 'dni'])		
		<div class="form-group">
			<label for="birthdate" class="col-lg-2">Fecha de nacimiento</label>
			<input type="date" class="custom-input form-control col-lg-7" name="birthdate" @if(!$isEdit) disabled @endif value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $person->birthdate)->toDateString() }}">
		</div>
		@include('partials.errors2', ['field' => 'birthdate'])
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
				<input type="file" class="custom-input col-lg-7">	
			@endif
		</div>
		@include('partials.errors2', ['field' => 'picture'])
		<div class="form-group">
			<label for="address" class="col-lg-2">Dirección</label>
			<input type="text" class="custom-input form-control col-lg-7 form-control" name="address" @if(!$isEdit) disabled @endif value="{{ $person->address }}">
		</div>
		@include('partials.errors2', ['field' => 'address'])
		<div class="form-group">
			<label for="" class="col-lg-2">Localidad</label>
			<select class="col-lg-7 custom-input form-control" name="town_id" @if(!$isEdit) disabled @endif>
			@foreach($towns as $town)
				@if($person->town !== null)
				<option value="{{ $town->id }}" 
					@if($person->town->id === $town->id)
						selected 
					@endif
					 >{{ $town->name }}
				</option>
				@else
				<option value="{{ $town->id }}">{{ $town->name }}</option>
				@endif
			@endforeach
			</select>
		</div>
		@include('partials.errors2', ['field' => 'town_id'])

		<hr>
		@if($isEdit)
			<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
		@endif
	</form>
@endsection
