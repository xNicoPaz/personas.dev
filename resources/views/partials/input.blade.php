<div class="form-group">
	<label class="col-lg-2" for="{{ $name }}">{{ $display }}</label>			
	<input class="custom-input form-control col-lg-7" type="{{ $type }}" name="{{ $name }}" 
	@if(isset($value))
		value="{{ $value }}"
	@endif >
</div>