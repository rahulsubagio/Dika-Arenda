<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
  public function index()
  {
    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/dashboard');
    $this->load->view('templates/footer');
  }
}
