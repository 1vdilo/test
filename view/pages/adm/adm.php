
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
		<p><a class="link-offset-2 link-underline link-underline-opacity-100" href="/adduser">Добавить пользователя</a></p>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Имя</th>
					<th scope="col">Фамилия</th>
					<th scope="col">Отчество</th>
					<th scope="col">Год рождения</th>
					<th scope="col">Пол</th>
					<th scope="col">Дата регистрации в системе</th>
					<th scope="col">Фото пользователя</th>
					<th scope="col">Роль</th>
					<th scope="col">Изменить</th>
				</tr>
			</thead>
			<tbody>
				<?
				$users = Adm::GetUsers();
				foreach ($users as $user):
				?>
					<tr>
						<th scope="row"><?= $user['id'] ?></th>
						<td><?= $user['name'] ?></td>
						<td><?= $user['surname'] ?></td>
						<td><?= $user['patronymic'] ?></td>
						<td><?= $user['birthday'] ?></td>
						<td><?= $user['gender'] ?></td>
						<td><?= $user['date_reg'] ?></td>
						<td><img src="<?= $user['img_url'] ?>" alt="" style='height: 60px; width: 60px'></td>
						<td><?= $user['role'] ?></td>
						<td><a href="/upuser?id=<?= $user['id'] ?>">Изменить</a></td>
					</tr>
				<? endforeach ?>
			</tbody>
		</table>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>