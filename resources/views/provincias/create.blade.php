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
		@include('partials.errors2', ['field' => 'name'])

		<div class="form-group">
			<label for="country_id" class="col-lg-2">País</label>
			<select name="country_id" class="custom-input form-control col-lg-7">
			@foreach($countries as $country)
				<option value="{{ $country->id }}">{{ $country->name }}</option>
			@endforeach
			</select>
			<a id="newCountryBtn" href="{{ url('/paises/crear') }}" class="col-lg-2 btn btn-primary" target="blank" ><i class="fa fa-plus"></i> Añadir país</a>
		</div>
		@include('partials.errors2', ['field' => 'country_id'])

		<hr>
		<button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Añadir prov.</button>
	</form>
@endsection

@section('customScripts')
<script>
	$(document).ready(function(){
		var newCountryBtn = $('#newCountryBtn');

		newCountryBtn.click(function(e){
			e.preventDefault();
			window.open($(this).attr('href'), '_blank');
		});
	});
</script>
@endsection