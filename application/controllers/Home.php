<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index()
  {
    $this->session->set_flashdata('home', 'active');

    $this->load->view('templates/landing_page/header');
    $this->load->view('home/index');
    $this->load->view('templates/landing_page/footer');
  }

  public function about()
  {
    $this->session->set_flashdata('about', 'active');

    $this->load->view('templates/landing_page/header');
    $this->load->view('home/about');
    $this->load->view('templates/landing_page/footer');
  }
}
