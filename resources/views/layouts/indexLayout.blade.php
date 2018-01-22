@extends('layouts.public')
@section('content')
	<h1 class="my-4">@yield('title')</h1>
	<hr>
	<table @yield('tableId') class="table">
		<thead>
			@yield('tableHeadings')
		</thead>
		<tbody>
			@yield('tableBody')
		</tbody>
	</table>
@endsection
