@extends('layouts.indexLayout')
@section('title')
	Listado de personas registradas
@endsection

@section('tableId')
id="peopleTable"
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col">DNI</th>
	<th scope="col">Nombre completo</th>
	<th scope="col">Localidad</th>
	<th scope="col">Provincia</th>
	<th scope="col">País</th>
	<th scope="col">Opciones</th>
@endsection

@section('tableBody')
@foreach($people as $person)
	<tr>
		<td>{{ $person->id }}</td>
		<td>{{ $person->dni }}</td>
		<td>{{ $person->last_name . " " . $person->first_name }}</td>
		<td><a href="{{ url('/personas/localidades/' . $person->town->id) }}">{{ $person->town->name }}</a></td>
		<td><a href="{{ url('/personas/provincias/' . $person->town->province->id) }}">{{ $person->town->province->name }}</a></td>
		<td><a href="{{ url('/personas/paises/' . $person->town->province->country->id) }}">{{ $person->town->province->country->name }}</a></td>
		<td>
			<a href="{{ url('/personas/' . $person->id) }}"><i style="color:blue" class="fa fa-search"></i></a>
			<a href="{{ url('/personas/' . $person->id . '/editar') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
			<a href="{{ url('/personas/' . $person->id . '/destruir') }}"><i style="color:red" class="fa fa-trash"></i></a>

			<form class="deletePersonForm" style="display:inline;" action="{{ url('personas/' . $person->id) }}">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			</form>
		</td>
	</tr>
@endforeach			
@endsection

@section('customScripts')
<script>
	$(document).ready(function(){
		var peopleTable = $('#peopleTable');
		peopleTable.find('th:nth-child(1), tr td:nth-child(1)').hide();
	});
</script>
@endsection