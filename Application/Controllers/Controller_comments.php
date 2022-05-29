<?php
class Controller_comments extends Controller {
  function __construct() {
    $this->model = new Model_comments;
    $this->view = new View;
  }

	function action_index() {
    if (array_key_exists('commentText', $_POST)) {
      $id_image = $_GET['id'];
      $id_user = $_COOKIE['sf30_id'];
      $this->model->post_comment($_POST['commentText'], $id_image, $id_user);
    }

    if (array_key_exists('delete', $_POST)) {
      $id_user = $_COOKIE['sf30_id'];
      $this->model->delete_comment($_POST['delete'], $id_user);
    }

    $imageData = $this->model->get_data();
    $commentsData = $this->model->get_comments();
    if (is_array($commentsData) && !empty($commentsData)) {
      foreach ($commentsData as &$value) {
        $userData = $this->model->get_user($value['id_user']);
        $value['user'] = $userData;
      }
    }

    $data = [
      'imageData' => $imageData, 
      'commentsData' => $commentsData
    ];

		$this->view->generate('comments_view.php', 'template_view.php', $data);
	}
} 