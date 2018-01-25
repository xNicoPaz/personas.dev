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
		@include('partials.errors2', ['field' => 'name'])
		<div class="form-group">
			<label for="province_id" class="col-lg-2">Provincia</label>
			<select name="province_id" class="custom-input form-control col-lg-7">
			@foreach($provinces as $province)
				<option value="{{ $province->id }}">{{ $province->name }}</option>
			@endforeach	
			</select>
			<a id="newProvinceBtn" href="{{ url('/provincias/crear') }}" class="col-lg-2 btn btn-primary" target="blank" ><i class="fa fa-plus"></i> Añadir prov.</a>
		</div>
		@include('partials.errors2', ['field' => 'province_id'])
		<hr>
		<button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Añadir localidad</button>
	</form>
@endsection

@section('customScripts')
<script>
	$(document).ready(function(){
		var newProvinceBtn = $('#newProvinceBtn');

		newProvinceBtn.click(function(e){
			e.preventDefault();
			window.open($(this).attr('href'), '_blank');
		});
	});
</script>
@endsection