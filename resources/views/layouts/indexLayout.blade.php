@extends('layouts.public')
@section('content')
	<h1 class="my-4">@yield('title')</h1><small>@yield('small')</small>
	<hr>

	@yield('middle')

	<table @yield('tableId') class="table table-responsive table-inverse">
		<thead>
			@yield('tableHeadings')
		</thead>
		<tbody>
			@yield('tableBody')
		</tbody>
	</table>
@endsection
