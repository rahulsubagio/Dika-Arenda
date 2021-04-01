<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/navbar');
        $this->load->view('templates/pimpinan/sidebar');
        $this->load->view('pimpinan/dashboard');
        $this->load->view('templates/footer');
    }
}

?>