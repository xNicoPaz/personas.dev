@extends('layouts.indexLayout')
@section('title')
	Listado de localidades registradas
@endsection

@section('tableId')
id="townsTable"
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col"><i class="fa fa-map-marker"></i></th>
	<th scope="col">Nombre <a id="nameSort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
	<th scope="col"><i class="fa fa-flag"></i> Provincia <a id="provinceSort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
	<th scope="col"><i class="fa fa-globe"></i> País <a id="countrySort" href=""><i style="color:black;" class="pointer fa fa-sort"></i></a></th>
@endsection

@section('middle')
@include('partials.searchForm', ['pathname' => '/localidades/q'])
@endsection

@section('tableBody')
@foreach($towns as $town)
<tr>
	<td>{{ $town->id }}</td>	
	<td>
		<a href="{{ url('localidades/' . $town->id) }}"><i style="color:blue" class="fa fa-search"></i></a>
		<a href="{{ url('localidades/' . $town->id . '/editar') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
		<a href="{{ url('localidades/' . $town->id . '/destruir') }}"><i style="color:red" class="fa fa-trash" ></i></a>
	</td>	
	<td data-value="{{ $town->name }}">{{ $town->name }}</td>
	@if(isset($town->province))
	<td data-value="{{ $town->province->name }}">
		<a href="{{ url('/provincias/' . $town->province->id) }}"><i class="fa fa-search"></i></a> {{ $town->province->name }}
	</td>
	@else
	<td data-value=""></td>
	@endif
	@if(isset($town->province->country))
	<td data-value="{{ $town->province->country->name }}">
		<a href="{{ url('/paises/' . $town->province->country->id) }}"><i class="fa fa-search"></i></a> {{ $town->province->country->name }}
	</td>
	@else
	<td data-value=""></td>
	@endif
</tr>
@endforeach	
@endsection

@section('customScripts')
<script>
	var nameSortToggle = true;
	var provinceSortToggle = true;
	var countrySortToggle = true;

	$(document).ready(function(){
		var townsTable = $('#townsTable ');
		townsTable.find('th:nth-child(1), tr td:nth-child(1)').hide();

		townsTable.find('thead th a').click(function(e){
			e.preventDefault();
		});

		$('#nameSort').click(function(){
			var index = townsTable.find('thead th').index($(this).closest('th'));
			tableSort(townsTable, index, nameSortToggle);
			nameSortToggle = !nameSortToggle;
		});

		$('#provinceSort').click(function(){
			var index = townsTable.find('thead th').index($(this).closest('th'));
			tableSort(townsTable, index, provinceSortToggle);
			provinceSortToggle = !provinceSortToggle;
		});

		$('#countrySort').click(function(){
			var index = townsTable.find('thead th').index($(this).closest('th'));
			tableSort(townsTable, index, countrySortToggle);
			countrySortToggle = !countrySortToggle;
		});
	});
</script>
@endsection