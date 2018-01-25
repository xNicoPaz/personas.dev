<?php 
  $pathArray = explode('/', Request::path()); 
?>
<div class="col-lg-2">
	@if($pathArray[0] === "home" || $pathArray[0] === "index" || $pathArray[0] === "")
		<h1 class="my-4"></h1>	
	@else
	<h2 class="my-4">Opciones</h2>
	<div class="list-group">
		<a href="{{ url('/' . $pathArray[0] . '/crear') }}" 
            @if(count($pathArray) > 1 && $pathArray[1] === "crear")
            	class="list-group-item active"
            @else
            	class="list-group-item"
            @endif
        >
    	<i style="color:green;" class="fa fa-plus"></i> Alta</a>
		<a href="{{ url('/' . $pathArray[0]) }}" class="list-group-item"><i style="color:red;" class="fa fa-trash"></i> Baja</a>
		<a href="{{ url('/' . $pathArray[0]) }}" 
		@if(count($pathArray) === 3)
			@if($pathArray[2] === 'editar')
			class="list-group-item active" 
			@else
			class="list-group-item" 
			@endif
		@else
			class="list-group-item" 
		@endif
		>
		<i style="color:yellow;" class="fa fa-pencil"></i> Modificación</a>
		<a href="{{ url('/' . $pathArray[0]) }}" something="{{ Request::path() }}" 
			@if(count($pathArray) === 1)
			class="list-group-item active" 
			@elseif(count($pathArray) === 3)
				@if(!is_numeric($pathArray[1]))
			 	class="list-group-item active" 
				@else
				class="list-group-item"
				@endif
			@else
			class="list-group-item"
			@endif
		>
		<i class="fa fa-search"></i> Consulta</a>
	</div>
	@endif
</div>