@extends('layouts/defaultlayout')
@section('content')
<div class="container">
	<h1>All Nerds</h1>

	<!--For displaying any messsages-->
	@if (Session::has('message'))
	<div class="alert alert-info" id="message">{{ Session::get('message') }}</div>
	@endif

	<table class="table">
		<thead>
			<td>Id</td>
			<td>Name</td>
			<td>Email</td>
			<td>Nerd Level</td>
			<td>Actions</td>
		</thead>

		<tbody>
			@foreach($nerds as $key=>$value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->password }}</td>
				<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'nerds/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

					<!--Button for actions delete update-->
					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<a class="btn small" href="{{ URL::to('nerds/' .$value->id) }}">view</a>

					<!--Edit nerd info using Get /nerds/{is}edit-->
					<a class="btn small" href="{{ URL::to('nerds/'.$value->id .'/edit') }}">Edit</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#message').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@stop