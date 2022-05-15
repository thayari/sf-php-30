<?php
class Controller_delete extends Controller {
  function __construct() {
    $this->model = new Model_delete;
    $this->view = new View;
  }

	function action_index() {
		$this->model->deleteFile();
		$this->view->generate('delete_view.php', 'template_view.php');
	}
} 