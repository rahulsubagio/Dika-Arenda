<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }


  public function findAll()
  {
    return $this->db->get('user')->row_array();
  }

  public function findByUsername($username)
  {
    //mendapatkan data berdasarkan email
    return $this->db
      ->where('username', $username)
      ->get('user')
      ->row_array();
  }
}
