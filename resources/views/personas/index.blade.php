@extends('layouts.indexLayout')
@section('title')
	Listado de personas registradas
@endsection

@section('small')
Haga click en una localidad, provincia o país para filtrar los resultados
@endsection

@section('tableId')
id="peopleTable"
@endsection

@section('middle')
<small>Puede buscar personas por DNI, nombre o apellido</small>
@include('partials.searchForm', ['pathname' => '/personas/q', 'display' => 'Valor a buscar', 'inputName' => 'searchValue'])
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col"><span><i class="fa fa-user"></i></span></th>
	<th scope="col">DNI <a id="dniSort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
	<th scope="col">Nombre completo <a id="fullNameSort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
	<th scope="col"><i class="fa fa-map-marker"></i> Localidad <a id="townSort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
	<th scope="col"><i class="fa fa-flag"></i> Provincia <a id="provinceSort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
	<th scope="col"><i class="fa fa-globe"></i> País <a id="countrySort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
@endsection

@section('tableBody')
@foreach($people as $person)
	<tr>
		<td>{{ $person->id }}</td>
		<td>
			<a href="{{ url('/personas/' . $person->id) }}"><i style="color:blue" class="fa fa-search"></i></a>
			<a href="{{ url('/personas/' . $person->id . '/editar') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
			<a href="{{ url('/personas/' . $person->id . '/destruir') }}"><i style="color:red" class="fa fa-trash"></i></a>

			<form class="deletePersonForm" style="display:inline;" action="{{ url('personas/' . $person->id) }}">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			</form>
		</td>
		<td data-value="{{ $person->dni }}">{{ $person->dni }}</td>
		<td data-value="{{ $person->last_name . " " . $person->first_name }} }}">{{ $person->last_name . " " . $person->first_name }}</td>
		@if(isset($person->town))
		<td data-value="{{ $person->town->name }}">
			<a href="{{ url('/localidades/' . $person->town->id) }}"><i class="fa fa-search"></i></a>
			<a href="{{ url('/personas/localidades/' . $person->town->id) }}">{{ $person->town->name }}</a>
		</td>
		@else
		<td data-value=""></td>
		@endif
		@if(isset($person->town->province))
		<td data-value="{{ $person->town->province->name }}">
			<a href="{{ url('/provincias/' . $person->town->province->id) }}"><i class="fa fa-search"></i></a>
			<a href="{{ url('/personas/provincias/' . $person->town->province->id) }}">{{ $person->town->province->name }}</a>
		</td>
		@else
		<td data-value=""></td>
		@endif
		@if(isset($person->town->province->country))
		<td data-value="{{ $person->town->province->country->name }}">
			<a href="{{ url('/paises/' . $person->town->province->country->id) }}"><i class="fa fa-search"></i></a>
			<a href="{{ url('/personas/paises/' . $person->town->province->country->id) }}">{{ $person->town->province->country->name }}</a>
		</td>
		@else
		<td data-value=""></td>
		@endif
	</tr>
@endforeach			
@endsection

@section('customScripts')
<script>
	var dniSortToggle = true;
	var fullNameSortToggle = true;
	var townSortToggle = true;
	var provinceSortToggle = true;
	var countrySortToggle = true;

	$(document).ready(function(){
		var peopleTable = $('#peopleTable');
		peopleTable.find('th:nth-child(1), tr td:nth-child(1)').hide();

		peopleTable.find('thead th a').click(function(e){
			e.preventDefault();
		});

		$('#dniSort').click(function(){
			var index = peopleTable.find('thead th').index($(this).closest('th'));
			tableSort(peopleTable, index, dniSortToggle);
			dniSortToggle = !dniSortToggle;
		});

		$('#fullNameSort').click(function(){
			var index = peopleTable.find('thead th').index($(this).closest('th'));
			tableSort(peopleTable, index, fullNameSortToggle);
			fullNameSortToggle = !fullNameSortToggle;
		});

		$('#townSort').click(function(){
			var index = peopleTable.find('thead th').index($(this).closest('th'));
			tableSort(peopleTable, index, townSortToggle);
			townSortToggle = !townSortToggle;
		});

		$('#provinceSort').click(function(){
			var index = peopleTable.find('thead th').index($(this).closest('th'));
			tableSort(peopleTable, index, provinceSortToggle);
			provinceSortToggle = !provinceSortToggle;
		});

		$('#countrySort').click(function(){
			var index = peopleTable.find('thead th').index($(this).closest('th'));
			tableSort(peopleTable, index, countrySortToggle);
			countrySortToggle = !countrySortToggle;
		});
	});


</script>
@endsection