@extends('layouts.indexLayout')
@section('title')
	Listado de provincias registradas
@endsection

@section('tableId')
id="provincesTable"
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col">Nombre</th>
	<th scope="col">Opciones</th>
@endsection

@section('tableBody')
@foreach($provinces as $province)
<tr>
	<td>{{ $province->id }}</td>	
	<td>{{ $province->name }}</td>
	<td>
		<a href="{{ url('provincias/' . $province->id . '/detalles') }}"><i style="color:blue" class="fa fa-search"></i></a>
		<a href="{{ url('provincias/' . $province->id . '/editar') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
		<a href="{{ url('provincias/' . $province->id . '/destruir') }}"><i style="color:red" class="fa fa-trash" ></i></a>
	</td>	
</tr>
@endforeach	
@endsection

@section('customScripts')
<script>
	$(document).ready(function(){
		var provincesTable = $('#provincesTable ');
		provincesTable.find('th:nth-child(1), tr td:nth-child(1)').hide();
	});
</script>
@endsection