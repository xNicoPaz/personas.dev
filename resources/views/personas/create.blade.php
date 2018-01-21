@extends('layouts.public')
@section('content')
	<h1 class="my-4">Alta de persona</h1>
	<hr>
	<form action="url{{'/personas/store'}}" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-lg-2" for="first_name">Nombre</label>			
			<input class="custom-input col-lg-7" type="text" name="first_name">
		</div>
		<div class="form-group">
			<label class="col-lg-2" for="last_name">Apellido</label>
			<input class="custom-input col-lg-7" type="text" name="last_name">
		</div>
		<div class="form-group">
			<label class="col-lg-2" for="dni">DNI</label>
			<input class="custom-input col-lg-7" type="number" name="dni">
		</div>
		<div class="form-group">
			<label class="col-lg-2" for="birthdate">Fecha de nacimiento</label>
			<input class="custom-input col-lg-7" type="date" name="birthdate">
		</div>
		<div class="form-group">
			<label class="col-lg-2" for="picture">Imagen</label>
			<input class="custom-input col-lg-7" type="file" name="picture">
		</div>
		<div class="form-group">
			<label class="col-lg-2" for="address">Dirección</label>
			<input class="custom-input col-lg-7" type="text" name="address">
		</div>
		<div class="form-group">
			<label class="col-lg-2" for="town_id">Localidad</label>
			<select class="custom-input col-lg-7 form-control" name="town_id">
				@foreach($towns as $town)
					<option value="{{ $town->id }}">{{ $town->name }}</option>
				@endforeach
			</select>
		</div>
		<hr>
		<div class="form-group">
			<input class="btn pull-right btn-primary" type="submit" value="Enviar">		
		</div>
	</form>
@endsection