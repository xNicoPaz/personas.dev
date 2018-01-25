@extends('layouts.indexLayout')
@section('title')
	Listado de paises registrados
@endsection

@section('middle')
@include('partials.searchForm', ['pathname' => '/paises/q'])
@endsection

@section('tableId')
id="countriesTable"
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col"><i class="fa fa-globe"></i></th>
	<th scope="col">Nombre <a id="nameSort" href=""><i style="color:black;" class="fa fa-sort"></i></a></th>
@endsection

@section('tableBody')
@foreach($countries as $country)
<tr>
	<td>{{ $country->id }}</td>	
	<td>
		<a href="{{ url('paises/' . $country->id) }}"><i style="color:blue" class="fa fa-search"></i></a>
		<a href="{{ url('paises/' . $country->id . '/editar') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
		<a href="{{ url('paises/' . $country->id . '/destruir') }}"><i style="color:red" class="fa fa-trash" ></i></a>
	</td>	
	<td data-value="{{ $country->name }}">{{ $country->name }}</td>
</tr>
@endforeach	
@endsection

@section('customScripts')
<script>
	var nameSortToggle = true;

	$(document).ready(function(){
		var countriesTable = $('#countriesTable ');
		countriesTable.find('th:nth-child(1), tr td:nth-child(1)').hide();

		countriesTable.find('thead th a').click(function(e){
			e.preventDefault();
		});

		$('#nameSort').click(function(){
			var index = countriesTable.find('thead th').index($(this).closest('th'));
			tableSort(countriesTable, index, nameSortToggle);
			nameSortToggle = !nameSortToggle;
		});
	});
</script>
@endsection