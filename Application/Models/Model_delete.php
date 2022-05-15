<?php
class Model_delete extends Model {
  public function deleteFile() {
		$id = $_GET['id'];
		$data = getDbData('SELECT * FROM `images` WHERE id = '.$id);
		$imageUrl = $data[0]['url'];

		unlink($_SERVER['DOCUMENT_ROOT'].'/'.$imageUrl);

		setDbData('DELETE FROM `images` WHERE `images`.`id` = '.$id);
  }
}
