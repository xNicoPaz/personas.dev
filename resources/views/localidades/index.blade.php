@extends('layouts.indexLayout')
@section('title')
	Listado de localidades registradas
@endsection

@section('tableId')
id="townsTable"
@endsection

@section('tableHeadings')
	<th scope="col">id</th>
	<th scope="col">Nombre</th>
	<th scope="col">Opciones</th>
@endsection

@section('tableBody')
@foreach($towns as $town)
<tr>
	<td>{{ $town->id }}</td>	
	<td>{{ $town->name }}</td>
	<td>
		<a href="{{ url('localidades/' . $town->id) }}"><i style="color:blue" class="fa fa-search"></i></a>
		<a href="{{ url('localidades/' . $town->id . '/detalles') }}"><i style="color:yellow" class="fa fa-pencil"></i></a>
		<a id="deleteTownLink" href=""><i style="color:red" class="fa fa-trash" ></i></a>

		<form id="deleteTownForm" style="display:inline;" method="POST" action="{{ url('localidades/' . $town->id ) }}">
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
		var townsTable = $('#townsTable ');
		townsTable.find('th:nth-child(1), tr td:nth-child(1)').hide();

		var deleteTownLink = $('#deleteTownLink').click(function(e){
			e.preventDefault();
			$('#deleteTownForm').submit();
		});
	});
</script>
@endsection