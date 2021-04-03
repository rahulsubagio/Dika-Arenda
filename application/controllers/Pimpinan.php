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

    public function jurnal()
  {
    $this->session->set_flashdata('jurnal', 'active');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi');
    $this->session->set_flashdata('button', 'off');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/jurnal-rekhar');
    $this->load->view('templates/footer');
  }

  public function leger()
  {
    $this->session->set_flashdata('leger', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/leger');
    $this->load->view('templates/footer');
  }

  public function rekapHarian()
  {
    $this->session->set_flashdata('rekhar', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Transaksi Harian');
    $this->session->set_flashdata('button', 'off');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/jurnal-rekhar');
    $this->load->view('templates/footer');
  }

  public function rekapBulanan()
  {
    $this->session->set_flashdata('rekbul', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/rekapBulanan');
    $this->load->view('templates/footer');
  }

  public function rekapPenjualan()
  {
    $this->session->set_flashdata('rekjual', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/rekapJual');
    $this->load->view('templates/footer');
  }

  public function penyusutanMingguan()
  {
    $this->session->set_flashdata('susutMinggu', 'active');
    $this->session->set_flashdata('button', 'off');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/susutMinggu');
    $this->load->view('templates/footer');
  }

  public function penyusutanBulanan()
  {
    $this->session->set_flashdata('susutBulan', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/susutBulan');
    $this->load->view('templates/footer');
  }
}