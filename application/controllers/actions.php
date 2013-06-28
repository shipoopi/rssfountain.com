<?php
include_once('./application/controllers/custom_controller.php');
class Actions extends Custom_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  public function markRead()
  {
    $this->data['success'] = 1;
    return $this->render_json();
  }
}