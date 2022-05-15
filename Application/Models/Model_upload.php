<?php
class Model_upload extends Model
{
	public function uploadFile()
	{
		define('URL', '/'); // URL текущей страницы
		define('UPLOAD_MAX_SIZE', 5000000); // 1mb
		define('ALLOWED_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
		define('UPLOAD_DIR', 'images');

		$errors = [];
		if (!empty($_FILES)) {
			for ($i = 0; $i < count($_FILES['files']); $i++) {
				$fileName = $_FILES['files']['name'];

				if ($_FILES['files']['size'] > UPLOAD_MAX_SIZE) {
					$errors[] = 'Недопустимый размер файла ' . $fileName;
					continue;
				}

				if (!in_array($_FILES['files']['type'], ALLOWED_TYPES)) {
					$errors[] = 'Недопустимый формат файла ' . $fileName;
					continue;
				}

				$filePath = UPLOAD_DIR . '/' . basename($fileName);

				if (!move_uploaded_file($_FILES['files']['tmp_name'], $filePath)) {
					$errors[] = 'Ошибка загрузки файла ' . $fileName;
					continue;
				}
				else {
					$query = "INSERT INTO images (url) VALUES('".$filePath."');";
					$result = setDbData($query);
					if (!$result) {
						$errors[] = 'Ошибка базы данных';
					}
				}
			}
		}
	}
}
