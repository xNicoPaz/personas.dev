@extends('layouts.public')
@section('content')
	<div style="display:inline;">
		<h1 class="my-4">Detalles de {{ $country->name }} </h1>
		<a href="{{ url('paises/' . $country->id . '/detalles') }}">
		<button class="btn btn-primary">
			<i style="color:yellow" class="fa fa-pencil"></i> Editar
		</button>
		</a>
		<a id="deleteTownLink" href="">
		<button class="btn btn-warning">
			<i style="color:red" class="fa fa-trash"></i> Eliminar
		</button>
		</a>		
	</div>

	<hr>
	@if($isEdit)
	<form action="{{ url('/paises/' . $country->id) }}" method="POST">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
	@else
	<form>
	@endif
		<div class="form-group">
			<label for="name" class="col-lg-2">Nombre</label>
			<input type="text" class="custom-input col-lg-7 form-control" name="name" @if(!$isEdit) disabled @endif value="{{ $country->name }}">
		</div>
	</form>
@endsection