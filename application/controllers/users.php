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
  
  public function login(){
    if(!$this->is_form_submitted('login'))
      return $this->render('user/login');

    $this->form_validate(array('username', 'password'), 'required');
    $this->form_validate(array('username'), 'strtolower');
    if(!$this->form_validated())
      return $this->render('user/login');

    $this->form_validate('username', 'callback_validate_authenticate');
    if(!$this->form_validated())
      return $this->render('user/login');
    redirect('?notice=User%20logged%20in.');
  }

  public function validate_authenticate($user){
    $this->form_validation->set_message('validate_authenticate', 'Invalid username or password');
    if(!($user = $this->user_model->authenticate())){
      return false;
    }
    $_SESSION['user'] =  $user;
    return true;
  }
  public function logout(){
    unset($_SESSION['user']);
    return $this->render('user/logout');
  }

  public function register(){
    if(!$this->is_form_submitted('register'))
      return $this->render('user/register');
    $this->form_validate(array('username', 'password', 'retype_password'), 'required');
    $this->form_validate('username', 'validate_username_unique');

    if(!$this->form_validated())
      return $this->render('user/register');

    if($this->post('password') != $this->post('retype_password')){
      $this->error('Passwords did not match');
      return $this->render('user/register');
    }
    if(!($user = $this->user_model->register())){
      $this->form_error('Error creating user');
      return $this->render('user/register');
    }
    redirect('user/login?notice=User%20created.%20Please%20log%20in.');
  }
}