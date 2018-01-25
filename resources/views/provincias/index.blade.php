@extends('layouts.indexLayout')
@section('title')
	Listado de provincias registradas
@endsection

@section('tableId')
id="provincesTable"
@endsection

@section('middle')
@include('partials.searchForm', ['pathname' => '/provincias/q'])
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col"><i class="fa fa-flag"></i></th>
	<th scope="col">Nombre <a id="nameSort" href=""><i style="color:black;" class="fa fa-sort"></i></a></th>
	<th scope="col"><i class="fa fa-globe"></i> País <a id="countrySort" href=""><i style="color:black;s" class="fa fa-sort"></i></a></th>
@endsection

@section('tableBody')
@foreach($provinces as $province)
<tr>
	<td>{{ $province->id }}</td>	
	<td>
		<a href="{{ url('provincias/' . $province->id) }}"><i style="color:blue" class="fa fa-search"></i></a>
		<a href="{{ url('provincias/' . $province->id . '/editar') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
		<a href="{{ url('provincias/' . $province->id . '/destruir') }}"><i style="color:red" class="fa fa-trash" ></i></a>
	</td>	
	<td data-value="{{ $province->name }}">{{ $province->name }}</td>
	@if(isset($province->country))
	<td data-value="{{ $province->country->name }}">
		<a href="{{ url('/paises/' . $province->country->id) }}"> <i class="fa fa-search"></i></a> {{ $province->country->name }}
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
	var countrySortToggle = true;

	$(document).ready(function(){
		var provincesTable = $('#provincesTable ');
		provincesTable.find('th:nth-child(1), tr td:nth-child(1)').hide();

		provincesTable.find('thead th a').click(function(e){
			e.preventDefault();
		});

		$('#nameSort').click(function(){
			var index = provincesTable.find('thead th').index($(this).closest('th'));
			tableSort(provincesTable, index, nameSortToggle);
			nameSortToggle = !nameSortToggle;
		});

		$('#countrySort').click(function(){
			var index = provincesTable.find('thead th').index($(this).closest('th'));
			tableSort(provincesTable, index, countrySortToggle);
			countrySortToggle = !countrySortToggle;
		});
	});
</script>
@endsection