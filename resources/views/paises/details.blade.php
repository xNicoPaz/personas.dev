@extends('layouts.public')
@section('content')
	<div style="display:inline;">
		<h1 class="my-4">Detalles de {{ $country->name }} </h1>
		@if(!$isEdit)
		<a href="{{ url('paises/' . $country->id . '/editar') }}">
		<button class="btn btn-primary">
			<i style="color:yellow" class="fa fa-pencil"></i> Editar
		</button>
		</a>
		<a href="{{ url('paises/' . $country->id . '/destruir') }}">
		<button class="btn btn-warning">
			<i style="color:red" class="fa fa-trash"></i> Eliminar
		</button>
		</a>		
		@endif
	</div>

	<hr>
	@if($isEdit)
	<form action="{{ url('/paises/' . $country->id) }}" method="POST">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
	@else
	<form>
	@endif
		<div class="form-group">
			<label for="name" class="col-lg-2">Nombre</label>
			<input type="text" class="custom-input col-lg-7 form-control" name="name" @if(!$isEdit) disabled @endif value="{{ $country->name }}">
		</div>
		@include('partials.errors2', ['field' => 'name'])
		<hr>

		@if($isEdit)
			<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
		@endif
	</form>
@endsection
