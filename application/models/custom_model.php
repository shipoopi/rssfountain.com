<?php
include_once('./application/models/custom_model.php');
class Custom_Model extends CI_Model{
  public function __construct(){
    parent::__construct();
  }
  
  public function post($field){
    return $this->input->post($field);
  }
  public function get($field){
    return $this->input->get($field);
  }

  public function get_rows($table, $where=NULL){
    if($where)
      $this->db->where($where);
    return $this->fetch_rows($this->db->get($table));
  }
  public function get_row($table, $where=NULL){
    if($where)
      $this->db->where($where);
    return $this->fetch_row($this->db->get($table));
  }
  public function get_field($table, $field){
    $row = $this->get_row($table);
    return @$row[$field];
  }

  public function fetch_rows($query){
    if($query->num_rows() > 0)
      return $query->result_array();
    return array();
  }
  public function fetch_row($query){
    if($query->num_rows() > 0)
      return $query->row_array();
    return NULL;
  }
}