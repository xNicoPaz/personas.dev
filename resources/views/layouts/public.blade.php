<!DOCTYPE html>
<html>
@include('partials.head')
<body>
	@include('partials.nav')
	<div class="container">
		<div class="row">
			@include('partials.sidebar')
			<div class="col-lg-9">
				@yield('content')
			</div>
		</div>		
	</div>
	<br>
	@include('partials.footer')
	@include('partials.sharedScripts')
</body>	
</html>