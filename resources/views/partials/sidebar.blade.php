<?php 
  $pathArray = explode('/', Request::path()); 
?>
<div class="col-lg-3">
	@if($pathArray[0] === "home" || $pathArray[0] === "index" || $pathArray[0] === "")
		<h1 class="my-4"></h1>	
	@else
	<h1 class="my-4">Opciones</h1>
	<div class="list-group">
		<a href="{{ url('/' . $pathArray[0] . '/crear') }}" 
            @if(count($pathArray) > 1 && $pathArray[1] === "crear")
            	class="list-group-item active"
            @else
            	class="list-group-item"
            @endif
        >Alta</a>
		<a href="{{ url('/' . $pathArray[0]) }}" class="list-group-item">Baja</a>
		<a href="{{ url('/' . $pathArray[0]) }}" 
		@if(count($pathArray) === 3)
			@if($pathArray[2] === 'editar')
			class="list-group-item active" 
			@endif
		@else
			class="list-group-item" 
		@endif
		>
		Modificación</a>
		<a href="{{ url('/' . $pathArray[0]) }}" something="{{ Request::path() }}" 
			@if(count($pathArray) === 1)
			 class="list-group-item active" 
			@else
			 class="list-group-item"
			@endif
		>
		Consulta</a>
	</div>
	@endif
</div>