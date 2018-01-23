@extends('layouts.public')
@section('content')
	<div style="display:inline;">
		<h1 class="my-4">Detalles de {{ $town->name }} </h1>
		@if(!$isEdit)
		<a href="{{ url('localidades/' . $town->id . '/editar') }}">
		<button class="btn btn-primary">
			<i style="color:yellow" class="fa fa-pencil"></i> Editar
		</button>
		</a>
		<a href="{{ url('/localidades/' . $town->id . '/destruir') }}">
		<button class="btn btn-warning">
			<i style="color:red" class="fa fa-trash"></i> Eliminar
		</button>
		</a>
		@endif		
	</div>

	<hr>
	@if($isEdit)
	<form action="{{ url('/localidades/' . $town->id) }}" method="POST">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
	@else
	<form>
	@endif
		<div class="form-group">
			<label for="name" class="col-lg-2">Nombre</label>
			<input type="text" class="custom-input col-lg-7 form-control" name="name" @if(!$isEdit) disabled @endif value="{{ $town->name }}">
		</div>
		@include('partials.errors2', ['field' => 'name'])
		<div class="form-group">
			<label for="" class="col-lg-2">Provincia</label>
			<select class="col-lg-7 custom-input form-control" name="province_id" @if(!$isEdit) disabled @endif>
			@foreach($provinces as $province)
				@if($town->province_id !== null)
				<option value="{{ $province->id }}" 
					@if($town->province_id === $province->id)
						selected 
					@endif
					 >{{ $province->name }}
				</option>
				@else
				<option value="{{ $province->id }}">{{ $province->name }}</option>
				@endif
			@endforeach
			</select>
		</div>
		@include('partials.errors2', ['field' => 'province_id'])
		<hr>

		@if($isEdit)
			<input type="submit" class="btn btn-primary pull-right" value="Actualizar">
		@endif
	</form>
@endsection
