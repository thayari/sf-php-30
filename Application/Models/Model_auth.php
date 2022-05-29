<?php
class Model_auth extends Model {
	public function submitForm() {
		if(isset($_POST['submit'])) {
			$err = [];
			// проверяем логин
			if (!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) {
				$err[] = "Логин может состоять только из букв английского алфавита и цифр";
			} 

			if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
				$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
			} 
			// проверяем, не существует ли пользователя с таким именем
			$query = 'SELECT * FROM `users` WHERE `login`="'.$_POST['login'].'"';
			$data = getDbData($query);

			if (count($data) > 0) {
				$userData = $data[0];
				$password = $userData['password'];
				$id = $userData['id'];

				// залогинить пользователя
				if($password === md5(md5($_POST['password']))) {
					// Генерируем случайное число и шифруем его
					$hash = md5($this->generateCode(10));

					// Записываем в БД новый хеш авторизации
					$query = 'UPDATE `users` SET hash = "'.$hash.'" WHERE id = "'.$id.'"';
					// echo $query;die();
					setDbData($query);

					// Ставим куки
					setcookie("sf30_id", $id, time()+60*60*24*30, "/");
					setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true); // httponly !!! 
					
					$_COOKIE['hash'] = $hash;

					// $this->checkHash($userData);
					header("Location: index.php?url=main"); exit();
				}
				else
				{
					$err[] = "Вы ввели неправильный логин/пароль";
				}
			} 
			else if (count($err) == 0) {
				// зарегистрировать пользователя
				$login = $_POST['login'];
				$password = md5(md5(trim($_POST['password']))); 
				$query = 'INSERT INTO `users` SET `login`="'.$login.'", password="'.$password.'"';
				setDbData($query);
				header("Location: index.php?url=main"); exit();
			}
			else {
				print "<b>При регистрации произошли следующие ошибки:</b><br>";
				foreach($err AS $error) {
					print $error."<br>";
				}
			}
		}
		else {
			// выход
			if (isset($_COOKIE['sf30_id'])) {
				setcookie("sf30_id", "", time() - 3600*24*30*12, "/");
				setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
				header("Location: index.php?url=auth"); exit();
			}
		}
	}

	function generateCode($length=6) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$code = "";
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length) {
			$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
	} 

	function checkHash($userData) {
		if (isset($_COOKIE['hash'])) {
			if($userData['hash'] !== $_COOKIE['hash']) {
				// setcookie("sf30_id", "", time() - 3600*24*30*12, "/");
				setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
				print "Хм, что-то не получилось";
			}
			else {
				print "Привет, ".$userData['user_login'].". Всё работает!";
			}
		}
		else {
			print "Включите куки";
		}
	}
}
