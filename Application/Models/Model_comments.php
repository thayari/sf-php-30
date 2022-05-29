<?php
class Model_comments extends Model {
  public function get_data() {
		$id = $_GET['id'];
    $data = getDbData('SELECT * FROM `images` WHERE `id` = '.$id);
		return $data;
  }

	public function get_comments() {
		$id = $_GET['id'];
		$data = getDbData('SELECT * FROM `comments` WHERE `id_image` = '.$id);
		return $data;
	}

	public function get_user($id) {
		$data = getDbData('SELECT * FROM `users` WHERE `id` = '.$id);
		return $data[0]['login'];
	}

	public function post_comment($text, $id_image, $id_user) {
		setDbData('INSERT INTO `comments` (`id_user`, `id_image`, `text`) VALUES ('.$id_user.', '.$id_image.', "'.$text.'")');
	}

	public function delete_comment($id, $id_user) {
		$data = getDbData('SELECT * FROM `comments` WHERE `id` = '.$id);
		if ($id_user == $data[0]['id_user']) {
			setDbData('DELETE FROM `comments` WHERE `id` = '.$id);
		}
	}
}

// DELETE FROM `images` WHERE `images`.`id` = 1