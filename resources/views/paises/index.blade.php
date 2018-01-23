@extends('layouts.indexLayout')
@section('title')
	Listado de paises registrados
@endsection

@section('middle')
	<form action="{{ url('/paises/q/') }}" class="form form-inline" method="GET">
		<label style="display:inline;" for="searchName" class="col-lg-2">Nombre a buscar</label>
		<input type="text" class="custom-input form-control col-lg-8" name="searchName">
		<button class="btn btn-primary pull-right"><i class="fa fa-search"></i> Buscar</button>
	</form>
	<br>
@endsection

@section('tableId')
id="countriesTable"
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col">Nombre</th>
	<th scope="col">Opciones</th>
@endsection

@section('tableBody')
@foreach($countries as $country)
<tr>
	<td>{{ $country->id }}</td>	
	<td>{{ $country->name }}</td>
	<td>
		<a href="{{ url('paises/' . $country->id) }}"><i style="color:blue" class="fa fa-search"></i></a>
		<a href="{{ url('paises/' . $country->id . '/editar') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
		<a href="{{ url('paises/' . $country->id . '/destruir') }}"><i style="color:red" class="fa fa-trash" ></i></a>
	</td>	
</tr>
@endforeach	
@endsection

@section('customScripts')
<script>
	$(document).ready(function(){
		var countriesTable = $('#countriesTable ');
		countriesTable.find('th:nth-child(1), tr td:nth-child(1)').hide();
	});
</script>
@endsection