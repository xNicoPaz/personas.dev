<!DOCTYPE html>
<html>
@include('partials.head')
<body>
	@include('partials.nav')
	<div id="wrap" class="container">
		<div id="main" class="row">
			@include('partials.sidebar')
			<div class="col-lg-10">
				@yield('content')
			</div>
		</div>		
	</div>
	<br>
	@include('partials.footer')
	@include('partials.sharedScripts')
	@yield('customScripts')
</body>	
</html>