<div class="form-group">
	<label class="col-lg-2" for="{{ $name }}">{{ $display }}</label>
	<select class="custom-input col-lg-7 form-control" name="{{ $name }}">
		@foreach($collection as $item)
			<option value="{{ $item->id }}">{{ $item->name }}</option>
		@endforeach
	</select>
</div>
