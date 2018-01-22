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
	<th scope="col">Opciones</th>
@endsection

@section('tableBody')
@foreach($people as $person)
	<tr>
		<td>{{ $person->id }}</td>
		<td>{{ $person->dni }}</td>
		<td>{{ $person->last_name . " " . $person->first_name }}</td>
		<td>
			<a href="{{ url('personas/' . $person->id . '/detalles') }}"><i style="color:blue" class="fa fa-search"></i></a>
			<a href="{{ url('personas/' . $person->id . '/detalles') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
			<a id="deletePersonLink" href=""><i style="color:red" class="fa fa-trash"></i></a>

			<form id="deletePersonForm" style="display:inline;" action="{{ url('personas/' . $person->id) }}" method="POST">
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

		var deletePersonLink = $('#deletePersonLink').click(function(e){
			e.preventDefault();
			$('#deletePersonForm').submit();
		});
	});
</script>
@endsection