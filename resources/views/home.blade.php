<?php
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Форма обратной связи</title>
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="{{ asset('css/app.css?v1.0.0') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<div class="container my-5">
			<h1>Форма обратной связи</h1>
			<hr>
			<div class="row">
				<div class="col-12">
					<feedback-form-component></feedback-form-component>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js?v1.0.0') }}"></script>
</body>
</html>
