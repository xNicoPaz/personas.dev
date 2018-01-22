@extends('layouts.indexLayout')
@section('title')
	Listado de paises registrados
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
		<a href="{{ url('paises/' . $country->id . '/detalles') }}"><i style="color:blue" class="fa fa-search"></i></a>
		<a href="{{ url('paises/' . $country->id . '/detalles') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
		<a id="deleteCountryLink" href=""><i style="color:red" class="fa fa-trash" ></i></a>

		<form id="deleteCountryForm" style="display:inline;" method="POST" action="{{ url('paises/' . $country->id ) }}">
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
		var countriesTable = $('#countriesTable ');
		countriesTable.find('th:nth-child(1), tr td:nth-child(1)').hide();

		var deleteCountryLink = $('#deleteCountryLink').click(function(e){
			e.preventDefault();
			$('#deleteCountryForm').submit();
		});
	});
</script>
@endsection