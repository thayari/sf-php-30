<?php
class Controller_comments extends Controller {
  function __construct() {
    $this->model = new Model_comments;
    $this->view = new View;
  }

	function action_index() {
    $data = $this->model->get_data();
		$this->view->generate('comments_view.php', 'template_view.php', $data);
	}
} 