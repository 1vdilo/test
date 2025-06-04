<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
	<div class='container-md'>
		<?

		use controller\Adm;

		include '/OSPanel/domains/test/view/asets/header.php'
		?>
		<br>
		<h1>Авторизация</h1>
		<form action="/auth_form" method="post">
			<div class="mb-3">

				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
				<div id="emailHelp" class="form-text">Введите ваше имя</div>
			</div>
			<div class="mb-3">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='surname'>
				<div id="emailHelp" class="form-text">Введите вашу фамилию</div>
			</div>
			<div class="mb-3">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='patronymic'>
				<div id="emailHelp" class="form-text">Введите ваше отчество</div>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>