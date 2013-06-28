<?php 
include_once('./application/models/custom_model.php');
class Users_model extends Custom_Model {

  public function __construct()
  {
      $this->load->database();
  }
  public function get_users(){
    return $this->get_rows('users');
  }
}