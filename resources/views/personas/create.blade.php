@extends('layouts.public')
@section('content')
	<h1 class="my-4">Alta de persona</h1>
	<hr>
	<form action="{{ url('/personas') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-lg-2" for="first_name">Nombre</label>			
			<input class="custom-input form-control col-lg-7" type="text" name="first_name" value="Nico">
		</div>
		@includeWhen(count($errors->get('first_name')) > 0 , 'partials.errors', ['field' => 'first_name'])
		<div class="form-group">
			<label class="col-lg-2" for="last_name">Apellido</label>
			<input class="custom-input form-control col-lg-7" type="text" name="last_name" value="Paz">
		</div>
		@includeWhen(count($errors->get('last_name')) > 0 , 'partials.errors', ['field' => 'last_name'])
		<div class="form-group">
			<label class="col-lg-2" for="dni">DNI</label>
			<input class="custom-input form-control col-lg-7" type="number" name="dni" value="38733221">
		</div>
		@includeWhen(count($errors->get('dni')) > 0 , 'partials.errors', ['field' => 'dni'])
		<div class="form-group">
			<label class="col-lg-2" for="birthdate">Fecha de nacimiento</label>
			<input class="custom-input form-control col-lg-7" type="date" name="birthdate" value="1995-05-23">
		</div>
		@includeWhen(count($errors->get('birthdate')) > 0 , 'partials.errors', ['field' => 'birthdate'])
		<div class="form-group">
			<label class="col-lg-2" for="picture">Imagen</label>
			<input class="custom-input col-lg-7" type="file" name="picture">
		</div>
		@includeWhen(count($errors->get('picture')) > 0 , 'partials.errors', ['field' => 'picture'])
		<div class="form-group">
			<label class="col-lg-2" for="address">Dirección</label>
			<input class="custom-input form-control col-lg-7" type="text" name="address" value="Lomas del Golf M26 L11">
		</div>
		@includeWhen(count($errors->get('address')) > 0 , 'partials.errors', ['field' => 'address'])
		<div class="form-group">
			<label class="col-lg-2" for="town_id">Localidad</label>
			<select class="custom-input form-control col-lg-7 form-control" name="town_id">
				@foreach($towns as $town)
					<option value="{{ $town->id }}">{{ $town->name }}</option>
				@endforeach
			</select>
		</div>
		@includeWhen(count($errors->get('town_id')) > 0 , 'partials.errors', ['field' => 'town_id'])
		<hr>
		<div class="form-group">
			<input class="btn pull-right btn-primary" type="submit" value="Enviar">		
		</div>
	</form>
@endsection