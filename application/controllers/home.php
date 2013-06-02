<?php
include_once('./application/controllers/custom_controller.php');
class Home extends Custom_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    return $this->render('home/index');    
  }
}