<ul style="padding-left: 50px" class="col-lg-9 alert alert-danger alert-dismissable">
@foreach($errors->get($field) as $message)
	<li> {{ $message }} </li>
@endforeach	
</ul>