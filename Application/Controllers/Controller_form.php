<?php
class Controller_form extends Controller {
  function __construct() {
    $this->model = new Model;
    $this->view = new View;
  }

	function action_index() {
		$this->view->generate('form_view.php', 'template_view.php');
	}
} 