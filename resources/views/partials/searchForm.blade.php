<?php 
	if(!isset($display)){
		$display = "Nombre a buscar";
	}

	if(!isset($inputName)){
		$inputName = 'searchName';
	}
?>
<form action="{{ url($pathname) }}" class="form form-inline" method="POST">
	{{ csrf_field() }}
	<label style="display:inline;" for="{{ $inputName }}" class="col-lg-2">{{ $display }}</label>
	<input type="text" class="custom-input form-control col-lg-8" name="{{ $inputName }}">
	<button class="btn btn-primary pull-right"><i class="fa fa-search"></i> Buscar</button>
</form>
<br>
@include('partials.errors2', ['field' => $inputName])