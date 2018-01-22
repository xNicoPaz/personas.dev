@extends('layouts.public')
@section('content')
	<div style="display:inline;">
		<h1 class="my-4">Detalles de {{ $town->name }} </h1>
		<a href="{{ url('localidades/' . $town->id . '/detalles') }}">
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
	<form action="{{ url('/localidades/' . $town->id) }}" method="POST">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
	@else
	<form>
	@endif
		<div class="form-group">
			<label for="name" class="col-lg-2">Nombre</label>
			<input type="text" class="custom-input col-lg-7 form-control" name="name" @if(!$isEdit) disabled @endif value="{{ $town->name }}">
		</div>
		<div class="form-group">
			<label for="" class="col-lg-2">Provincia</label>
			<select class="col-lg-7 custom-input form-control" name="town_id" @if(!$isEdit) disabled @endif>
			@foreach($provinces as $province)
				<option value="{{ $province->id }}" 
					@if($town->province->id === $province->id)
						selected 
					@endif
					 >{{ $province->name }}
				</option>
			@endforeach
			</select>
		</div>
	</form>
@endsection
