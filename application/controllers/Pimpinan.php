<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kasir_model');
  }

  public function index()
  {
    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('pimpinan/dashboard');
    $this->load->view('templates/footer');
  }

  public function jurnalKasir()
  {
    $this->session->set_flashdata('jurnal', 'active');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi Kasir');
    $this->session->set_flashdata('button', 'off');
    $this->session->set_flashdata('base', 'pimpinan');

    $data = $this->loadJurnalKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/jurnal-rekhar', $data);
    $this->load->view('templates/footer');
  }

  public function loadJurnalKasir()
  {
    $tanggal = $this->input->post('tanggal');
    $today = date("Y-m-d");

    if (isset($_POST['update']) && $tanggal != $today) {
      $data['transaksi'] = $this->Kasir_model->getTransaksi($tanggal);
      $data['subtotal'] = $this->Kasir_model->getSubtotalJurnal($tanggal);
      $data['hari'] = $tanggal;
    } else {
      $data['transaksi'] = $this->Kasir_model->getTransaksi($today);
      $data['subtotal'] = $this->Kasir_model->getSubtotalJurnal($today);
      $data['hari'] = $today;
    }
    return $data;
  }

  public function legerKasir()
  {
    $this->session->set_flashdata('leger', 'active');
    $data = $this->loadLegerKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/leger', $data);
    $this->load->view('templates/footer');
  }

  public function loadLegerKasir(){
    $data['daftar_customer'] = $this->Kasir_model->getCustomerLangganan();
    if (isset($_POST['update'])) {
      $bulan = $this->input->post('bulan');
      $code = $this->input->post('customer');
      $dataBulan = strtotime($bulan);
      $bulannya = date("M Y", $dataBulan);

      $data['transaksi'] = $this->Kasir_model->getTransaksiCustomerLeger($bulan, $code);
      $data['customer'] = $this->Kasir_model->getDetailCustomer($code, $bulan);
      $data['subtotal'] = $this->Kasir_model->getSubtotalLeger($bulan, $code);
      $data['bulan'] = $bulannya;
    }
    return $data;
  }

  public function rekapHarianKasir()
  {
    $this->session->set_flashdata('rekhar', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Transaksi Harian');
    $this->session->set_flashdata('button', 'off');

    $data = $this->loadRekapHarianKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/jurnal-rekhar', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapHarianKasir(){
    $tanggal = $this->input->post('tanggal');
    $today = date("Y-m-d");

    if (isset($_POST['update'])) {
      $data['transaksi'] = $this->Kasir_model->getTransaksiCustomer($tanggal);
      $data['subtotal'] = $this->Kasir_model->getSubtotalRekap($tanggal);
      $data['hari'] = $tanggal;
    } else {
      $data['transaksi'] = $this->Kasir_model->getTransaksiCustomer($today);
      $data['subtotal'] = $this->Kasir_model->getSubtotalRekap($today);
      $data['hari'] = $today;
    }
    return $data;
  }

  public function rekapBulananKasir()
  {
    $this->session->set_flashdata('rekbul', 'active');

    $data = $this->loadRekapBulananKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/rekapBulanan', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapBulananKasir(){
    if (isset($_POST['update'])) {
      $bulan = $this->input->post('bulan');
      $dataBulan = strtotime($bulan);
      $bulannya = date("M Y", $dataBulan);
      $data['bulan'] = $bulannya;
    } else {
      $bulan = date("Y-m");
      $data['bulan'] = $bulan;
    }
    $data['customer'] = $this->Kasir_model->getTransaksiBulanan($bulan);
    $data['subtotal'] = $this->Kasir_model->getTotalBulanan($bulan);

    return $data;
  }

  public function rekapPenjualanKasir()
  {
    $this->session->set_flashdata('rekjual', 'active');
    $data = $this->loadRekapPenjualanKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/rekapJual', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapPenjualanKasir(){
    if (isset($_POST['update'])) {
      $bulan = $this->input->post('bulan');
      $dataBulan = strtotime($bulan);
      $bulannya = date("M Y", $dataBulan);
      $data['bulan'] = $bulannya;
    } else {
      $today = date("Y-m");
      $bulan = $today;
    }
    $data['rekap'] = $this->Kasir_model->getPenjualananBulanan($bulan);
    $data['subtotal'] = $this->Kasir_model->getSubtotalPenjualananBulanan($bulan);
    
    return $data;
  }

  public function penyusutanMingguanKasir()
  {
    $this->session->set_flashdata('susutMinggu', 'active');
    $this->session->set_flashdata('button', 'off');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/susutMinggu');
    $this->load->view('templates/footer');
  }

  public function penyusutanBulananKasir()
  {
    $this->session->set_flashdata('susutBulan', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/susutBulan');
    $this->load->view('templates/footer');
  }
}
