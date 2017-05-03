@extends('layouts/defaultlayout')
@section('content')
<h5>Showing Nerd {{ $nerd->name }}</h5>
<div class="jumbotron text-center">
	<h1>{{ $nerd->name }}</h1>
	<p>
		<strong>Email: </strong>{{ $nerd->email }}</p></br>
		<strong>Nerd level: </strong> {{ $nerd->password }}
	</p>
	
</div>
@stop