<?php

namespace controller;

include_once './src/servises/connect.php';

use services\Connect;
use PDO;
use PDOException;
use stdClass;

class Adm
{
	public static function GetUsers()
	{
		$pdo = Connect::connect();
		$query = $pdo->query("SELECT * FROM `users`");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function GetUser($id)
	{
		$pdo = Connect::connect();
		$query = $pdo->query("SELECT * FROM `users` where `id` = '$id'");
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function auth()
	{
		$pdo = Connect::connect();


		$name = trim($_POST['name']);
		$surname = trim($_POST['surname']);
		$patronymic = trim($_POST['patronymic']);

		$query = $pdo->prepare("SELECT * FROM users WHERE name = ? AND surname = ? AND patronymic = ?");
		$query->execute([$name, $surname, $patronymic]);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		if ($user) {
			$_SESSION['user'] = [
				'userID' => $user['id'],
				'role' => $user['role'],
				'fio' => "{$user['surname']} {$user['name']} {$user['patronymic']}"
			];
			header("Location: " . ($_SESSION['user']['role'] == 0 ? '/' : '/adm'));
			exit();
		} else {
			echo "Пользователь не найден.";
		}
	}

	private static function uploadImg()
	{
		$targetDir = "view/general/img-personal/";
		$filePaths = [];

		foreach ($_FILES as $file) {
			$targetFile = $targetDir . basename($file["name"]);
			move_uploaded_file($file["tmp_name"], $targetFile);
		}
		return $targetFile;
	}
	public static function addUser()
	{
		$pdo = Connect::connect();

		$name = trim($_POST['name'] ?? '');
		$surname = trim($_POST['surname'] ?? '');
		$patronymic = trim($_POST['patronymic'] ?? '');
		$birthday = trim($_POST['birthday'] ?? '');
		$gender = trim($_POST['gender'] ?? '');
		$adm_user = $_POST['adm_user'] ?? '';
		$date_reg = $_POST['date_reg'] ?? '';
		$role = isset($_POST['role']) ? 1 : 0;

		$img_url = self::uploadImg();

		$sql = "INSERT INTO users (name, surname, patronymic, birthday, gender, img_url, role, adm_user, date_reg) VALUES (:name, :surname, :patronymic, :birthday, :gender, :img_url, :role, :adm_user, :date_reg)";
		$stmt = $pdo->prepare($sql);

		try {
			$stmt->execute([
				':name' => $name,
				':surname' => $surname,
				':patronymic' => $patronymic,
				':birthday' => $birthday,
				':gender' => $gender,
				':img_url' => $img_url,
				':date_reg' => $date_reg,
				':role' => $role,
				':adm_user' => $adm_user
			]);
		} catch (PDOException $e) {
			echo "Ошибка при добавлении пользователя: " . $e->getMessage();;
			return;
		}
		header("Location: /adm");
		exit();
	}

	public static function upUser()
	{

		$pdo = Connect::connect();

		$userID = $_POST['userID'];
		$name = trim($_POST['name'] ?? '');
		$surname = trim($_POST['surname'] ?? '');
		$patronymic = trim($_POST['patronymic'] ?? '');
		$birthday = trim($_POST['birthday'] ?? '');
		$gender = trim($_POST['gender'] ?? '');
		$adm_user = $_POST['adm_user'] ?? '';
		$date_reg = $_POST['date_reg'] ?? '';
		$role = isset($_POST['role']) ? 1 : 0;

		$sql = "
        UPDATE users SET
            name        = :name,
            surname     = :surname,
            patronymic  = :patronymic,
            birthday    = :birthday,
            gender      = :gender,
            role        = :role,
            adm_user    = :adm_user,
            date_reg    = :date_reg
        WHERE id = :userID
    ";
		$stmt = $pdo->prepare($sql);
		try {
			$stmt->execute([
				':name' => $name,
				':surname' => $surname,
				':patronymic' => $patronymic,
				':birthday' => $birthday,
				':gender' => $gender,
				':role' => $role,
				':adm_user' => $adm_user,
				':date_reg' => $date_reg,
				':userID' => $userID
			]);
		} catch (PDOException $e) {
			echo "Ошибка при обновлении пользователя: " . $e->getMessage();
			return;
		}
		header("Location: /adm");
		exit();
	}

	public static function upImg()
	{

		$pdo = Connect::connect();

		$userID = $_POST['userID'];
		$img_url = self::uploadImg();

		$sql = "UPDATE users SET img_url = :img_url WHERE id = :userID";
		$stmt = $pdo->prepare($sql);
		try {
			$stmt->execute([
				':img_url' => $img_url,
				':userID' => $userID
			]);
		} catch (PDOException $e) {
			echo "Ошибка при обновлении пользователя: " . $e->getMessage();
			return;
		}
		header("Location: /adm");
		exit();
	}

		public static function logout()
	{
		unset($_SESSION['user']);
		header("Location: /");
		exit();
	}
}
