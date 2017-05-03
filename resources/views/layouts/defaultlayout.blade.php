<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
</head>
<body>
<div class="maindiv">
<header>
	@include('includes.header')
</header>
<div class="container main-content">
	@yield('content')
</div>
	<footer>
		@include('includes.footer')
	</footer>
</div>
</body>
</html>