<?php 
  $pathArray = explode('/', Request::path()); 
  $subDir = $pathArray[1];
?>
<div class="col-lg-3">
	@if($pathArray[0] === "home" || $pathArray[0] === "index" || $pathArray[0] === "")
		<h1 class="my-4"></h1>	
	@else
	<h1 class="my-4">Opciones</h1>
	<div class="list-group">
		<a href="{{ url('/' . $pathArray[0] . '/crear') }}" 
            @if($subDir === "crear")
            	class="list-group-item active"
            @else
            	class="list-group-item"
            @endif
        >Alta</a>
		<a href="{{ url('/' . $pathArray[0]) }}" class="list-group-item">Baja</a>
		<a href="{{ url('/' . $pathArray[0]) }}" class="list-group-item">Modificación</a>
		<a href="{{ url('/' . $pathArray[0]) }}" class="list-group-item">Consulta</a>
	</div>
	@endif
</div>