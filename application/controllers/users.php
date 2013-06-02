<?php
include_once('./application/controllers/custom_controller.php');
class Users extends Custom_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }
  public function index()
  {
    $this->data['users'] = $this->users_model->get_users();
    $this->data['labels'] = array('firstName'=>'first',
				  'lastName'=>'last',
				  'email'=>'email'
				  );
    return $this->render('users/index');    
  }
}