
@if(count($errors)>0 )
	<div class="alert alert-danger">
	@foreach($errors -> all() as $error)
		<li style="list-style-type: none"><span class="glyphicon glyphicon-remove"></span>
			<span>{{ $error }}</span>
		</li>
	@endforeach
	</div>
@endif
@if(Session::has('error'))
	<div class="alert alert-danger">
		<ul>
			<li style="list-style-type: none">
				<span class="glyphicon glyphicon-remove"></span>
				<span>{{ Session::get('error') }}</span>
			</li>
		</ul>
	</div>
@endif