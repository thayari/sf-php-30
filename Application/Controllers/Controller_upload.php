<?php
class Controller_upload extends Controller {
  function __construct() {
    $this->model = new Model_upload;
    $this->view = new View;
  }

	function action_index() {
		$this->model->uploadFile();
		$this->view->generate('upload_view.php', 'template_view.php');
	}
} 