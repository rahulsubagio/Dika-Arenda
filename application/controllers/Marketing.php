<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Marketing_model');
  }

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
    $this->session->set_flashdata('active', 'jurnalBeli');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi Pembelian');
    $this->session->set_flashdata('button', 'on');
    $this->session->set_flashdata('collapse_pembelian', 'show');
    $this->session->set_flashdata('base', 'marketing');

    $data = $this->_jurnalPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
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
      $data['dataTransaksi']  = $this->Marketing_model->getTransaksi($today);
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
    $this->session->set_flashdata('base', 'marketing');

    $data = $this->_legerPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
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
      $data['dVendor'] = $this->Marketing_model->getVendorId($id);
    }

    return $data;
  }

  public function rekapHarianPembelian()
  {
    $this->session->set_flashdata('active', 'rekharBeli');
    $this->session->set_flashdata('judul', 'Rekapitulasi Harian Transaksi Pembelian');
    $this->session->set_flashdata('button', 'off');
    $this->session->set_flashdata('collapse_pembelian', 'show');
    $this->session->set_flashdata('base', 'marketing');

    $data = $this->_jurnalPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/jurnal', $data);
    $this->load->view('templates/footer');
  }

  public function rekapBulananPembelian()
  {
    $this->session->set_flashdata('active', 'rekbulBeli');
    $this->session->set_flashdata('judul', 'Rekapitulasi Bulanan Transaksi Pembelian');
    $this->session->set_flashdata('jenis', 'bulan');
    $this->session->set_flashdata('collapse_pembelian', 'show');
    $this->session->set_flashdata('base', 'marketing');

    $data = $this->_rekapBulananPembelian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/marketing/sidebar');
    $this->load->view('marketing/pembelian/rekapBulan', $data);
    $this->load->view('templates/footer');
  }

  public function _rekapBulananPembelian()
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
    $data['dataTransaksi'] = $this->Marketing_model->getTransaksi($bulan);
    $data['subtotal'] = $this->Marketing_model->getSubtotalJurnal($bulan);

    return $data;
  }

  public function tambahTransaksi($data = null)
  {
    $vendor   = $this->input->post('id_vendor');
    $kandang  = $this->input->post('id_kandang');
    $surat    = $this->input->post('no_surat');
    $ekor     = intval($this->input->post('ekor'));
    $berat    = floatval($this->input->post('berat'));
    $harga    = intval($this->input->post('harga'));
    $total    = $berat * $harga;
    $bayar    = intval($this->input->post('bayar'));
    $tanggal  = date("Y-m-d");

    $data = array(
      'id_vendor'   => $vendor,
      'id_pegawai'  => $kandang,
      'no_surat'    => $surat,
      'jenis_transaksi' => "pembelian",
      'tanggal'     => $tanggal,
      'ekor'        => $ekor,
      'kg'          => $berat,
      'harga'       => $harga,
      'total'       => $total,
      'pembayaran'  => $bayar
    );
    $id_produk = $this->tambahDetailPembelian($tanggal);
    $this->tambahProduknya($berat, $ekor, $id_produk);
    $this->Marketing_model->tambahTransaksi($data);
    redirect('/marketing/jurnalPembelian');
  }

  public function editTransaksi($id)
  {
    $this->session->set_flashdata('jurnal', 'active');
    $this->session->set_flashdata('judul', 'Edit Transaksi');

    $data['transaksi'] = $this->Marketing_model->getTransaksiById($id);
    $transaksi = $this->Marketing_model->getTransaksiById($id);

    if (isset($_POST['update'])) {
      $berat          = floatval($this->input->post('berat'));
      $ekor           = floatval($this->input->post('ekor'));
      $harga          = intval($this->input->post('harga'));
      $total          = $berat * $harga;
      $pembayaran     = intval($this->input->post('pembayaran'));

      $data = array(
        'id_transaksi'  => $id,
        'id_vendor'     => $this->input->post('id_vendor'),
        'id_pegawai'    => $this->input->post('id_pegawai'),
        'no_surat'      => $this->input->post('no_surat'),
        'tanggal'       => $this->input->post('tanggal'),
        'ekor'          => $ekor,
        'kg'            => $berat,
        'harga'         => $this->input->post('harga'),
        'total'         => $total,
        'pembayaran'    => $pembayaran
      );

      $id_produk = $this->tambahDetailPembelian($transaksi['tanggal']);
      $this->tambahProduknya($berat, $ekor, $id_produk);
      $this->kurangProduk($transaksi['kg'], $transaksi['ekor'], $id_produk);

      $this->Marketing_model->updateTransaksi($id, $data);
      redirect('/marketing/jurnalPembelian');
    } else {
      $this->load->view('templates/navbar');
      $this->load->view('templates/marketing/sidebar');
      $this->load->view('marketing/pembelian/editTransaksi', $data);
      $this->load->view('templates/footer');
    }
  }

  public function tambahKandang()
  {
    $nama   = $this->input->post('namaKandang');
    $telp   = $this->input->post('telpKandang');
    $data   = array(
      'nama_pegawai'  => $nama,
      'telp'          => $telp
    );
    $this->Marketing_model->tambahKandang($data);
    redirect('/marketing/jurnalPembelian');
  }

  public function tambahVendor()
  {
    $nama   = $this->input->post('namaVendor');
    $alamat = $this->input->post('alamatVendor');
    $telp   = $this->input->post('telpVendor');
    $data   = array(
      'nama_vendor'   => $nama,
      'alamat'        => $alamat,
      'telp'          => $telp
    );
    $this->Marketing_model->tambahVendor($data);
    redirect('/marketing/jurnalPembelian');
  }

  public function tambahProduk($tanggal)
  {
    $daybefore = strtotime($tanggal . '-1 day');
    $kemaren = date("Y-m-d", $daybefore);
    $produknya = $this->Marketing_model->getProduk($kemaren);

    $ekor = $produknya['stok_ekor'];
    $kg = $produknya['stok_kg'];

    $data = array(
      'tanggal' => $tanggal,
      'stok_ekor' => $ekor,
      'stok_kg' => $kg
    );
    $this->Marketing_model->tambahProduk($data);
  }

  public function tambahDetailPembelian($tanggal)
  {
    $produk = $this->Marketing_model->cekProduk($tanggal);
    if ($produk == 0) {
      $this->tambahProduk($tanggal);
    }
    $produk = $this->Marketing_model->getProduk($tanggal);
    $id_produk = $produk['id_produk'];
    return $id_produk;
  }

  public function kurangProduk($kg, $ekor, $id)
  {
    $produk = $this->Marketing_model->getProdukbyId($id);
    $ekorLama = intval($produk['stok_ekor']);
    $kgLama = floatval($produk['stok_kg']);
    $ekorBaru = $ekorLama - $ekor;
    $kgBaru = $kgLama - $kg;
    $data = array(
      'id_produk' => $id,
      'tanggal' => $produk['tanggal'],
      'stok_ekor' => $ekorBaru,
      'stok_kg' => $kgBaru
    );
    $this->Marketing_model->updateProduk($id, $data);
  }

  public function tambahProduknya($kg, $ekor, $id)
  {
    $produk = $this->Marketing_model->getProdukbyId($id);
    $ekorLama = intval($produk['stok_ekor']);
    $kgLama = floatval($produk['stok_kg']);
    $ekorBaru = $ekorLama + $ekor;
    $kgBaru = $kgLama + $kg;
    $data = array(
      'id_produk' => $id,
      'tanggal' => $produk['tanggal'],
      'stok_ekor' => $ekorBaru,
      'stok_kg' => $kgBaru
    );
    $this->Marketing_model->updateProduk($id, $data);
  }

  public function deleteTransaksi($id)
  {
    $transaksi = $this->Marketing_model->getTransaksiById($id);
    $id_produk = $this->tambahDetailPembelian($transaksi['tanggal']);
    $this->kurangProduk($transaksi['kg'], $transaksi['ekor'], $id_produk);

    $this->Marketing_model->deletetransaksi($id);
    redirect('/marketing/jurnalPembelian');
  }
}
