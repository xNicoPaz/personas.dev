@extends('layouts.public')
@section('content')
	<h1 class="my-4">Alta de localidad</h1>
	<hr>
	<form action="{{ url('/localidades') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-lg-2" for="name">Nombre</label>
			<input class="custom-input form-control col-lg-7" type="text" name="name">
		</div>
		<div class="form-group">
			<label for="province_id" class="col-lg-2">Provincia</label>
			<select name="province_id" class="custom-input form-control col-lg-7">
			@foreach($provinces as $province)
				<option value="{{ $province->id }}">{{ $province->name }}</option>
			@endforeach	
			</select>
		</div>
		<hr>
		<input class="btn btn-primary pull-right" type="submit" value="Enviar">
	</form>
@endsection