@extends('layouts.public')
@section('content')
	<h1 class="my-4">Alta de provincia</h1>
	<hr>
	<form action="{{ url('/provincias') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-lg-2" for="name">Nombre</label>
			<input class="custom-input form-control col-lg-7" type="text" name="name">
		</div>
		@includeWhen(count($errors->get('name')) > 0 , 'partials.errors', ['field' => 'name'])

		<div class="form-group">
			<label for="country_id" class="col-lg-2">País</label>
			<select name="country_id" class="custom-input form-control col-lg-7">
			@foreach($countries as $country)
				<option value="{{ $country->id }}">{{ $country->name }}</option>
			@endforeach
			</select>
		</div>
		@includeWhen(count($errors->get('country_id')) > 0 , 'partials.errors', ['field' => 'country_id'])

		<hr>
		<input class="btn btn-primary pull-right" type="submit" value="Enviar">
	</form>
@endsection