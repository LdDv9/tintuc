	@if(Session::has('success'))
		<div class="alert alert-success">
			<ul>
				<li style="list-style-type: none">
					<span class="glyphicon glyphicon-check"></span>
					<span class="lead" >{{ Session::get('success') }}</span>
				</li>
			</ul>
		</div>
	@endif