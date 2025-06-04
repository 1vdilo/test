<?
if ($_SESSION['user']['role'] == 0) {
	header('Location: /');
}
?>

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
		<h1>Добавить участника системы</h1>
		<form action="/adduser_form" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
				<div id="emailHelp" class="form-text">Имя</div>
			</div>
			<div class="mb-3">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='surname'>
				<div id="emailHelp" class="form-text">Фамилию</div>
			</div>
			<div class="mb-3">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='patronymic'>
				<div id="emailHelp" class="form-text">Отчество</div>
			</div>
			<div class="mb-3">
				<input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='birthday'>
				<div id="emailHelp" class="form-text">Год рождения</div>
			</div>
			<div class="mb-3">
				<select class="form-select form-select-sm" aria-label="Small select example" name='gender'>
					<option name='gender' selected>Выберите пол</option>
					<option value="Мужской">Мужской</option>
					<option value="Женский">Женский</option>
				</select>
			</div>
			<div class="mb-3">
				<input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='img_url'>
				<div id="emailHelp" class="form-text">Фотография участника системы</div>
			</div>
			<div class="mb-3">
				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
					<label class="form-check-label" for="switchCheckDefault" name='role' value='1'>Задать роль администратора</label>
				</div>
			</div>
			<input type="hidden" name="adm_user" value="<?= $_SESSION['user']['fio'] ?>">
			<? date_default_timezone_set('Asia/Krasnoyarsk') ?>
			<input type="hidden" name="date_reg" value='<?= date("Y-m-d") ?>'>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>