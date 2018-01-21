@extends('layouts.public')
@section('content')
	<h1 class="my-4">Listado de personas registradas</h1>
	<hr>
	<table id="peopleTable" class="table">
		<thead>
			<th scope="col">id</th>
			<th scope="col">DNI</th>
			<th scope="col">Nombre completo</th>
			<th scope="col">Opciones</th>
		</thead>
		<tbody>
		@foreach($people as $person)
			<tr>
				<td>{{ $person->id }}</td>
				<td>{{ $person->dni }}</td>
				<td>{{ $person->last_name . " " . $person->first_name }}</td>
				<td>
					<a href="{{ url('personas/' . $person->id . '/detalles') }}"><i style="color:blue" class="fa fa-search"></i></a>
					<a href="{{ url('personas/' . $person->id . '/detalles') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
					<a href="{{ url('personas/' . $person->id . '/detalles') }}"><i style="color:red" class="fa fa-trash"></i></a>
				</td>
			</tr>
		@endforeach			
		</tbody>
	</table>
@endsection

@section('customScripts')
<script>
	$(document).ready(function(){
		var peopleTable = $('#peopleTable');
		peopleTable.find('th:nth-child(1), tr td:nth-child(1)').hide();
	});
</script>
@endsection