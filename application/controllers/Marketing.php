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

  public function jurnalPembelian()
  {
    $this->session->set_flashdata('jurnalBeli', 'active');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi Pembelian');
    $this->session->set_flashdata('button', 'on');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/jurnal');
    $this->load->view('templates/footer');
  }

  public function legerPembelian()
  {
    $this->session->set_flashdata('legerBeli', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/leger');
    $this->load->view('templates/footer');
  }

  public function rekapHarianPembelian()
  {
    $this->session->set_flashdata('rekharBeli', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Harian Transaksi Pembelian');
    $this->session->set_flashdata('button', 'off');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/jurnal');
    $this->load->view('templates/footer');
  }

  public function rekapMingguanPembelian()
  {
    $this->session->set_flashdata('rekmingBeli', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Mingguan Transaksi Pembelian');
    $this->session->set_flashdata('jenis', 'minggu');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/rekapMingguBulan');
    $this->load->view('templates/footer');
  }

  public function rekapBulananPembelian()
  {
    $this->session->set_flashdata('rekbulBeli', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Bulanan Transaksi Pembelian');
    $this->session->set_flashdata('jenis', 'bulan');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/rekapMingguBulan');
    $this->load->view('templates/footer');
  }

}
