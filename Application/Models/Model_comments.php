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
	}
}

// DELETE FROM `images` WHERE `images`.`id` = 1