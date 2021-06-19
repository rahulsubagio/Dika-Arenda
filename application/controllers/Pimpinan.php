<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kasir_model');
    $this->load->model('Marketing_model');
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
    $this->session->set_flashdata('collapse_kasir', 'show');
    $this->session->set_flashdata('jualkasir', 'show');

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
    $this->session->set_flashdata('collapse_kasir', 'show');
    $this->session->set_flashdata('jualkasir', 'show');

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/leger', $data);
    $this->load->view('templates/footer');
  }

  public function loadLegerKasir()
  {
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
    $this->session->set_flashdata('collapse_kasir', 'show');
    $this->session->set_flashdata('jualkasir', 'show');

    $data = $this->loadRekapHarianKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/jurnal-rekhar', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapHarianKasir()
  {
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
    $this->session->set_flashdata('collapse_kasir', 'show');
    $this->session->set_flashdata('jualkasir', 'show');

    $data = $this->loadRekapBulananKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/rekapBulanan', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapBulananKasir()
  {
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
    $this->session->set_flashdata('collapse_kasir', 'show');
    $this->session->set_flashdata('jualkasir', 'show');

    $data = $this->loadRekapPenjualanKasir();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/rekapJual', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapPenjualanKasir()
  {
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
    $this->session->set_flashdata('collapse_kasir', 'show');
    $this->session->set_flashdata('susutkasir', 'show');
    $this->session->set_flashdata('base', 'pimpinan');
    $data = $this->loadPenyusutanMingguan();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('kasir/susutMinggu', $data);
    $this->load->view('templates/footer');
  }

  public function loadPenyusutanMingguan()
  {
    if (isset($_POST['update'])) {
      // $minggu = $this->input->post('minggu');
      // $year = substr($minggu, 0, 4);
      // $week = substr($minggu, 6, 2);
      // $date1 = date("l, M jS, Y", strtotime($year . "W" . $week . "1")); // First day of week
      // $date2 = date("l, M jS, Y", strtotime($year . "W" . $week . "7")); // Last day of week
      // $tanggalnya = $date1 . " - " . $date2;
      // $data['minggu'] = $tanggalnya;

      $bulan = $this->input->post('bulan');
      $dataBulan = strtotime($bulan);
      $bulannya = date("M Y", $dataBulan);
      $data['bulan'] = $bulannya;
    } else {
      // $today = date("d-m-Y");
      // $date = new DateTime($today);
      // $week = $date->format("W");
      // $year = $date->format("Y");
      // $date1 = date("l, M jS, Y", strtotime($year . "W" . $week . "1")); // First day of week
      // $date2 = date("l, M jS, Y", strtotime($year . "W" . $week . "7")); // Last day of week
      // $minggu = $date1 . " - " . $date2;
      // $data['minggu'] = $minggu;

      $today = date("Y-m");
      $bulan = $today;
      $data['bulan'] = $bulan;
    }
    // $tanggal1 = date("Y-m-d", strtotime($date1));
    // $tanggal2 = date("Y-m-d", strtotime($date2));

    $data['susut'] = $this->Kasir_model->getSusutSeminggu($bulan);
    // $data['jual'] = $this->Kasir_model->getPenjualananBulanan($bulan);
    return $data;
  }

  // marketing
  public function jurnalPembelian()
  {
    $this->session->set_flashdata('active', 'jurnalBeli');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi Pembelian');
    $this->session->set_flashdata('button', 'on');
    $this->session->set_flashdata('collapse_pembelian', 'show');
    $this->session->set_flashdata('base', 'pimpinan');

    $data = $this->_jurnalPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('marketing/pembelian/jurnal', $data);
    $this->load->view('templates/footer');
  }

  public function _jurnalPembelian()
  {
    $tanggal = $this->input->post('tanggal');
    $today = date("Y-m-d");

    $data['dataKandang']    = $this->Marketing_model->getKandang();
    $data['dataVendor']     = $this->Marketing_model->getVendor();

    if (isset($_POST['update']) && $tanggal != $today) {
      $data['dataTransaksi']  = $this->Marketing_model->getTransaksi($tanggal);
      $data['subtotal'] = $this->Marketing_model->getSubtotalJurnal($tanggal);
      $data['hari'] = $tanggal;
      // $this->session->set_flashdata('button', 'on');
    } else {
      $data['dataTransaksi']  = $this->Marketing_model->getTransaksi($tanggal);
      $data['subtotal'] = $this->Marketing_model->getSubtotalJurnal($today);
      $data['hari'] = $today;
      // $this->session->set_flashdata('button', 'on');
    }

    return $data;
  }

  public function legerPembelian()
  {
    $this->session->set_flashdata('legerBeli', 'active');
    $this->session->set_flashdata('collapse_pembelian', 'show');
    $this->session->set_flashdata('base', 'pimpinan');

    $data = $this->_legerPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('marketing/pembelian/leger', $data);
    $this->load->view('templates/footer');
  }

  public function _legerPembelian()
  {
    $data['dataVendor']     = $this->Marketing_model->getVendor();

    if (isset($_POST['update'])) {
      $bulan      = $this->input->post('bulan');
      $id         = $this->input->post('id_vendor');
      $dataBulan  = strtotime($bulan);
      $bulannya   = date("M Y", $dataBulan);

      $data['dataTransaksi']  = $this->Marketing_model->getTransaksiLeger($id, $bulan);
      $data['subtotal'] = $this->Marketing_model->getSubtotalLeger($id, $bulan);
      $data['bulan'] = $bulannya;
    }

    return $data;
  }

  public function rekapHarianPembelian()
  {
    $this->session->set_flashdata('active', 'rekharBeli');
    $this->session->set_flashdata('judul', 'Rekapitulasi Harian Transaksi Pembelian');
    $this->session->set_flashdata('button', 'off');
    $this->session->set_flashdata('collapse_pembelian', 'show');
    $this->session->set_flashdata('base', 'pimpinan');

    $data = $this->_jurnalPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('marketing/pembelian/jurnal', $data);
    $this->load->view('templates/footer');
  }

  public function rekapBulananPembelian()
  {
    $this->session->set_flashdata('active', 'rekbulBeli');
    $this->session->set_flashdata('judul', 'Rekapitulasi Bulanan Transaksi Pembelian');
    $this->session->set_flashdata('jenis', 'bulan');
    $this->session->set_flashdata('collapse_pembelian', 'show');
    $this->session->set_flashdata('base', 'pimpinan');

    $data = $this->_rekapBulananPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/pimpinan/sidebar');
    $this->load->view('marketing/pembelian/rekapBulan', $data);
    $this->load->view('templates/footer');
  }

  public function _rekapBulananPembelian()
  {
    if (isset($_POST['update'])) {
      $bulan      = $this->input->post('bulan');
      $dataBulan  = strtotime($bulan);
      $bulannya   = date("M Y", $dataBulan);

      $data['dataTransaksi']  = $this->Marketing_model->getTransaksi($bulan);
      $data['subtotal'] = $this->Marketing_model->getSubtotalJurnal($bulan);
      $data['bulan'] = $bulannya;
      return $data;
    }
  }
}
