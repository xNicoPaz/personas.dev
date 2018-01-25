@extends('layouts.public')
@section('content')
	<h1 class="my-4">Alta de país</h1>
	<hr>
	<form action="{{ url('/paises') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-lg-2" for="name">Nombre</label>
			<input class="custom-input form-control col-lg-7" type="text" name="name">
		</div>
		@include('partials.errors2', ['field' => 'name'])
		<hr>
		<button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Añadir país</button>
	</form>
@endsection