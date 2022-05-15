<?php
class Model_main extends Model {
  public function get_data() {
    $data = getDbData('SELECT * FROM `images`;');
		return $data;
  }
}

