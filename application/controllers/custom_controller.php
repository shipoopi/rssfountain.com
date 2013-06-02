<?php
session_start();
  //this controller is extended by all other controllers
  //in the app, and provides common functionality
class Custom_Controller extends CI_Controller{
  public $data = array();
  public $rendered = FALSE;
  public function __construct(){
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('better_form');
    $this->load->library('utils');
  }

  public function render($view=NULL, $data=array()){
    $data = array_merge($this->data, $data);
    if($view == NULL){
      if(empty($data['content_view']))
	$view = $this->router->class . '/' . $this->router->method;
    }
    if(!empty($view))
      $data['content_view'] = $view;   
    $data['controller_name'] = $this->router->class;
    $data['method_name'] = $this->router->method;
    $this->load->vars($data);

    $this->load->view('templates/layout');
    $this->rendered = TRUE;
  }

  public function is_form_submitted($name){
    $this->load->library('form_validation');
    if($this->input->post('form_submitted') == $name)
      return true;
    return false;
  }
  public function form_validate($fields, $rule='required'){
    if(!is_array($fields))
      $fields = array($fields);
    foreach($fields as $field){
      $this->form_validation->set_rules($field, pretty($field), $rule);
    }
  }
  public function form_validated(){
    if($this->form_validation->run() === FALSE)
      return false;
    return true;
  }
  public function form_error($message){
    $this->form_validation->set_message(ugly($message), $message);
  }
  public function post($field){
    return $this->input->post($field);
  }
  public function get($field){
    return $this->input->get($field);
  }


}