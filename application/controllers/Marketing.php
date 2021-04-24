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

  // pembelian
  public function jurnalPembelian()
  {
    $this->session->set_flashdata('jurnalBeli', 'active');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi Pembelian');
    $this->session->set_flashdata('button', 'on');
    $this->session->set_flashdata('collapse_pembelian', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/jurnal');
    $this->load->view('templates/footer');
  }

  public function legerPembelian()
  {
    $this->session->set_flashdata('legerBeli', 'active');
    $this->session->set_flashdata('collapse_pembelian', 'show');

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
    $this->session->set_flashdata('collapse_pembelian', 'show');

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
    $this->session->set_flashdata('collapse_pembelian', 'show');

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
    $this->session->set_flashdata('collapse_pembelian', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/rekapMingguBulan');
    $this->load->view('templates/footer');
  }

  // penjualan
  public function jurnalPenjualan()
  {
    $this->session->set_flashdata('jurnalJual', 'active');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi Pembelian');
    $this->session->set_flashdata('button', 'on');
    $this->session->set_flashdata('collapse_penjualan', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/penjualan/jurnal');
    $this->load->view('templates/footer');
  }

  public function legerPenjualan()
  {
    $this->session->set_flashdata('legerJual', 'active');
    $this->session->set_flashdata('collapse_penjualan', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/penjualan/leger');
    $this->load->view('templates/footer');
  }

  public function rekapHarianPenjualan()
  {
    $this->session->set_flashdata('rekharJual', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Harian Transaksi Pembelian');
    $this->session->set_flashdata('button', 'off');
    $this->session->set_flashdata('collapse_penjualan', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/penjualan/jurnal');
    $this->load->view('templates/footer');
  }

  public function rekapMingguanPenjualan()
  {
    $this->session->set_flashdata('rekmingJual', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Mingguan Transaksi Pembelian');
    $this->session->set_flashdata('jenis', 'minggu');
    $this->session->set_flashdata('collapse_penjualan', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/penjualan/rekapMingguBulan');
    $this->load->view('templates/footer');
  }

  public function rekapBulananPenjualan()
  {
    $this->session->set_flashdata('rekbulJual', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Bulanan Transaksi Pembelian');
    $this->session->set_flashdata('jenis', 'bulan');
    $this->session->set_flashdata('collapse_penjualan', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/penjualan/rekapMingguBulan');
    $this->load->view('templates/footer');
  }
}
