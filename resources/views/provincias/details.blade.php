@extends('layouts.public')
@section('content')
	<div style="display:inline;">
		<h1 class="my-4">Detalles de {{ $province->name }} </h1>
		@if(!$isEdit)
		<a href="{{ url('provincias/' . $province->id . '/editar') }}">
		<button class="btn btn-primary">
			<i style="color:yellow" class="fa fa-pencil"></i> Editar
		</button>
		</a>
		<a id="deleteTownLink" href="{{ url('provincias/' . $province->id . '/destruir') }}">
		<button class="btn btn-warning">
			<i style="color:red" class="fa fa-trash"></i> Eliminar
		</button>
		</a>
		@endif
	</div>

	<hr>
	@if($isEdit)
	<form action="{{ url('/provincias/' . $province->id) }}" method="POST">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
	@else
	<form>
	@endif
		<div class="form-group">
			<label for="name" class="col-lg-2">Nombre</label>
			<input type="text" class="custom-input col-lg-7 form-control" name="name" @if(!$isEdit) disabled @endif value="{{ $province->name }}">
		</div>
		@include('partials.errors2', ['field' => 'name'])
		<div class="form-group">
			<label for="" class="col-lg-2">País</label>
			<select class="col-lg-7 custom-input form-control" name="country_id" @if(!$isEdit) disabled @endif>
			@foreach($countries as $country)
				<option value="{{ $country->id }}" 
					@if($province->country->id === $country->id)
						selected 
					@endif
					 >{{ $country->name }}
				</option>
			@endforeach
			</select>
		</div>
		@include('partials.errors2', ['field' => 'country_id'])
		<hr>

		@if($isEdit)
			<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
		@endif
	</form>
@endsection
