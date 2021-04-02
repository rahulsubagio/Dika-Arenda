<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing extends CI_Controller
{
  public function index()
  {
    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/dashboard');
    $this->load->view('templates/footer');
  }
}
