<nav class="navbar navbar-inverse fixed-top">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('nerds') }}">Simple CRUD</a>
	</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('nerds/create') }}">Create Nerd</a></li>
			<li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li>
		</ul>
	</div>
</nav>
</nav>