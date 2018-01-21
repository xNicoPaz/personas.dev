@extends('layouts.public')
@section('content')
	<h1 class="my-4">Alta de país</h1>
	<hr>
	<form action="url{{'/paises/store'}}">
		<div class="form-group">
			<label class="col-lg-2" for="name">Nombre</label>
			<input class="custom-input col-lg-7" type="text" name="name">
		</div>
		<hr>
		<input class="btn btn-primary pull-right" type="submit" value="Enviar">
	</form>
@endsection