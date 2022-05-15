<?php
class Controller_auth extends Controller {
  function __construct() {
    $this->model = new Model_auth;
    $this->view = new View;
  }

	function action_index() {
		$this->model->submitForm();
		$this->view->generate('auth_view.php', 'template_view.php');
	}
} 