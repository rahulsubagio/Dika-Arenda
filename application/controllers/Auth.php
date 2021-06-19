<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
  }

  public function index()
  {
    $this->load->view('authority/login');
  }

  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user     = $this->UserModel->findByUsername($username);

    if ($user != null) {
      $md = md5($password);
      if (hash_equals($md, $user['password'])) {
        var_dump($user);
        if ($user['role'] == 1) {
          redirect(base_url() . 'marketing/');
        } else {
          redirect(base_url() . 'pimpinan/');
        }
      } else {
        redirect(base_url() . 'auth/');
      }
    } else {
      redirect(base_url() . 'auth/');
    }
  }
}
