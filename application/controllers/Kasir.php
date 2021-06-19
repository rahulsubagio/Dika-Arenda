<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kasir_model');
  }

  public function index()
  {
    $today = date("Y-m-d");
    $tanggalSatu = date('Y-m-01');
    $hitungDetailBaru = $this->Kasir_model->getDetailBaru($tanggalSatu);
    if ($today == $tanggalSatu || $hitungDetailBaru == 0) {
      $this->tambahDetailRekening($tanggalSatu);
    }

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/dashboard');
    $this->load->view('templates/footer');
  }

  public function jurnal()
  {
    $this->session->set_flashdata('jurnal', 'active');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi');
    $this->session->set_flashdata('base', 'kasir');

    $data = $this->loadJurnal();

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/jurnal-rekhar', $data);
    $this->load->view('templates/footer');
  }

  public function loadJurnal()
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
    $this->session->set_flashdata('button', 'on');
    $data['customer'] = $this->Kasir_model->getCustomer();
    $countC = $this->Kasir_model->countCustomer('customer') + 1;
    $countU = $this->Kasir_model->countCustomer('umum') + 1;
    $data['countCustomer'] = $countC;
    $data['countUmum'] = $countU;

    return $data;
  }

  public function leger()
  {
    $this->session->set_flashdata('leger', 'active');
    $this->session->set_flashdata('base', 'kasir');
    $data = $this->loadLeger();

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/leger', $data);
    $this->load->view('templates/footer');
  }

  public function loadLeger()
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

  public function rekapHarian()
  {
    $this->session->set_flashdata('rekhar', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Transaksi Harian');
    $this->session->set_flashdata('button', 'off');
    $this->session->set_flashdata('base', 'kasir');

    $data = $this->loadRekapHarian();

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/jurnal-rekhar', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapHarian()
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

  public function rekapBulanan()
  {
    $this->session->set_flashdata('rekbul', 'active');
    $this->session->set_flashdata('base', 'kasir');
    $data = $this->loadRekapBulanan();

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/rekapBulanan', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapBulanan()
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

  public function rekapPenjualan()
  {
    $this->session->set_flashdata('rekjual', 'active');
    $this->session->set_flashdata('base', 'kasir');
    $data = $this->loadRekapPenjualan();

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/rekapJual', $data);
    $this->load->view('templates/footer');
  }

  public function loadRekapPenjualan()
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

  public function penyusutanMingguan()
  {
    $this->session->set_flashdata('susutMinggu', 'active');
    $this->session->set_flashdata('button', 'on');
    $this->session->set_flashdata('base', 'kasir');
    $data = $this->loadPenyusutanMingguan();

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
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

  public function penyusutanBulanan()
  {
    $this->session->set_flashdata('susutBulan', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/susutBulan');
    $this->load->view('templates/footer');
  }

  public function tambahTransaksi()
  {
    $tanggalSatu = date("Y-m-01");
    $tanggal = strtotime($this->input->post('tanggal'));
    $today = date("Y-m-d", $tanggal);

    if ($this->input->post('customer') != NULL) {

      $code = $this->input->post('customer');
      $ekor = intval($this->input->post('ekor'));
      $kg = floatval($this->input->post('kg'));
      $harga = intval($this->input->post('harga'));
      $a = intval($this->input->post('a'));
      $pembayaran = intval($this->input->post('pembayaran'));
      $total = ($kg * $harga) - ($a * $kg);

      $jenisCode = substr($code, 0, 1);
      if ($jenisCode == "C") {
        $saldoTambahan = $pembayaran - $total;

        $detailRekening = $this->Kasir_model->getDetailRekening($code, $tanggalSatu);

        $idRekening = intval($detailRekening['id_rekening']);
        $dataRekening = $this->Kasir_model->getRekening($idRekening);

        $saldoBaru = intval($dataRekening['saldo_akhir']) + $saldoTambahan;
        $this->Kasir_model->updateRekening($idRekening, $saldoBaru);

        $saldoAkhirBulan = intval($detailRekening['saldo_akhir']);
        $saldoAkhirBulanBaru = $saldoAkhirBulan + $saldoTambahan;
        $this->Kasir_model->updateDetailRekening($code, $tanggalSatu, $saldoAkhirBulanBaru);
      }
    } else if ($this->input->post('customerBaru') != NULL) {

      if ($this->input->post('status') == "customer") {
        $codeCus = $this->input->post('codeCustomerBaru');
      } else {
        $codeCus = $this->input->post('codeUmumBaru');
      }

      $customer = array(
        'code' => $codeCus,
        'nama_customer' => $this->input->post('customerBaru'),
        'alamat' => $this->input->post('alamatBaru'),
        'status' => $this->input->post('status')
      );
      $this->Kasir_model->tambahCustomer($customer);

      $ekor = intval($this->input->post('ekor'));
      $kg = floatval($this->input->post('kg'));
      $harga = intval($this->input->post('harga'));
      $a = intval($this->input->post('a'));

      $pembayaran = intval($this->input->post('pembayaran'));
      $total = ($kg * $harga) - ($a * $ekor);

      if ($this->input->post('status') == "customer") {
        $saldo = $pembayaran - $total;
        $rekeningnya = array(
          'id_rekening' => "NULL",
          'saldo_akhir' => $saldo
        );

        $this->Kasir_model->createRekening($rekeningnya);
        $saldoAwal = 0;

        $rekening = $this->Kasir_model->getNewRekening();
        $detail = array(
          'code' => $codeCus,
          'id_rekening' => $rekening['id_rekening'],
          'tanggal' => $tanggalSatu,
          'saldo_awal' => $saldoAwal,
          'saldo_akhir' => $saldo
        );
        $this->Kasir_model->tambahDetailRekening($detail);
      }

      $code = $codeCus;
    }

    // $data = array(
    //   'code' => $codeCus,
    //   'tanggal' => $today,
    //   'ekor' => $ekor,
    //   'kg' => $kg,
    //   'harga' => $harga,
    //   'a_kompensasi' => $a,
    //   'total' => $total,
    //   'pembayaran' => $pembayaran
    // );

    $id_produk = $this->tambahDetailPenjualan($today);
    $data = array(
      'code' => $code,
      'id_produk' => $id_produk,
      'tanggal' => $today,
      'ekor' => $ekor,
      'kg' => $kg,
      'harga' => $harga,
      'a_kompensasi' => $a,
      'total' => $total,
      'pembayaran' => $pembayaran
    );

    $this->kurangProduk($kg, $ekor, $id_produk);
    $this->Kasir_model->tambahTransaksi($data);

    // $this->Post_model->tambahPost($data);
    // $this->session->set_flashdata('notif', 'ditambahkan');
    // $this->session->set_flashdata('alert', 'success');
    // $this->session->set_flashdata('tipe', 'berhasil');
    redirect(base_url() . 'kasir/jurnal');
  }

  public function editTransaksi($id)
  {
    $this->session->set_flashdata('jurnal', 'active');
    $this->session->set_flashdata('judul', 'Edit Transaksi');

    $data['transaksi'] = $this->Kasir_model->getTransaksiById($id);
    //edit umum -> update aja
    // edit customer -> update, detail_rekening, rekening
    if (isset($_POST['update'])) {
      $code = $this->input->post('code');
      $cekCode = substr($code, 0, 1);

      $kg = floatval($this->input->post('kg'));
      $ekor = floatval($this->input->post('ekor'));
      $harga = intval($this->input->post('harga'));
      $a = intval($this->input->post('a'));
      $total = ($kg * $harga) - ($a * $kg);
      $pembayaran = intval($this->input->post('pembayaran'));

      $data = array(
        'id_penjualan' => $this->input->post('id'),
        'id_produk' => $this->input->post('id_produk'),
        'code' => $this->input->post('code'),
        'tanggal' => $this->input->post('tanggal'),
        'ekor' => $this->input->post('ekor'),
        'kg' => $this->input->post('kg'),
        'harga' => $this->input->post('harga'),
        'a_kompensasi' => $this->input->post('a'),
        'total' => $total,
        'pembayaran' => $this->input->post('pembayaran')
      );
      $transaksiLama = $this->Kasir_model->getTransaksiById($id);
      $kgLama = floatval($transaksiLama['kg']);
      $ekorLama = intval($transaksiLama['ekor']);

      if ($cekCode == 'C') {
        $bulan = date('Y-m-01');

        $detailRekening = $this->Kasir_model->getDetailRekening($code, $bulan);
        $rekening = $this->Kasir_model->getRekening($detailRekening['id_rekening']);

        // $hargaLama = intval($transaksiLama['harga']);
        // $kgLama = floatval($transaksiLama['kg']);
        // $aLama = intval($transaksiLama['a_kompensasi']);
        $totalLama = intval($transaksiLama['total']);
        $pembayaranLama = intval($transaksiLama['pembayaran']);

        $saldoLama = ($totalLama) * -1 + $pembayaranLama;
        $saldoBaru = (($harga * $kg) - ($a * $kg)) * -1 + $pembayaran;

        $saldoDetailRekening = intval($detailRekening['saldo_akhir']);
        $saldoRekening = intval($rekening['saldo_akhir']);

        $perubahanSaldoDetailRekening = $saldoDetailRekening - $saldoLama + $saldoBaru;
        $perubahanSaldoRekening = $saldoRekening - $saldoLama + $saldoBaru;

        var_dump($saldoLama . ' ' . $saldoBaru . ' ' . $perubahanSaldoDetailRekening . ' ' . $perubahanSaldoRekening);

        $this->Kasir_model->updateDetailRekening($code, $bulan, $perubahanSaldoDetailRekening);
        $this->Kasir_model->updateRekening($detailRekening['id_rekening'], $perubahanSaldoRekening);
      }
      //edit produk

      $id_produk = $this->input->post('id_produk');
      $this->tambahProduknya($kgLama, $ekorLama, $id_produk);
      $this->kurangProduk($kg, $ekor, $id_produk);

      $this->Kasir_model->updateTransaksi($id, $data);
      redirect(base_url() . "kasir/jurnal");
    } else {
      $this->load->view('templates/navbar');
      $this->load->view('templates/kasir/sidebar');
      $this->load->view('kasir/editPenjualan', $data);
      $this->load->view('templates/footer');
    }
  }

  public function tambahDetailRekening($tanggalSatu)
  {
    $bulanLalu = date("Y-m", strtotime("first day of previous month"));
    $customernya = $this->Kasir_model->getCustomerLangganan();
    foreach ($customernya as $c) {
      $dataCustomer = $this->Kasir_model->getDetailCustomer($c['code'], $bulanLalu);
      $saldoAwal = $dataCustomer['saldo_akhir'];
      $dataBaru = array(
        'code' => $c['code'],
        'id_rekening' => $dataCustomer['id_rekening'],
        'tanggal' => $tanggalSatu,
        'saldo_awal' => $saldoAwal,
        'saldo_akhir' => $saldoAwal
      );
      $this->Kasir_model->tambahDetailRekening($dataBaru);
    }
  }

  public function deleteTransaksi($id)
  {
    //delete umum -> delete aja
    // delete customer -> delete, detail_rekening, rekening

    $transaksi = $this->Kasir_model->getTransaksiById($id);
    $cekCode = substr($transaksi['code'], 0, 1);
    if ($cekCode == 'C') {
      $bulan = date('Y-m-01');
      $transaksiLama = $this->Kasir_model->getTransaksiById($id);
      $detailRekening = $this->Kasir_model->getDetailRekening($transaksi['code'], $bulan);
      $rekening = $this->Kasir_model->getRekening($detailRekening['id_rekening']);

      // $hargaLama = intval($transaksiLama['harga']);
      // $kgLama = floatval($transaksiLama['kg']);
      // $aLama = intval($transaksiLama['a_kompensasi']);
      $totalLama = intval($transaksiLama['total']);
      $pembayaranLama = intval($transaksiLama['pembayaran']);

      // $saldoLama = $pembayaranLama - (($hargaLama * $kgLama) - ($aLama * $kgLama));
      $saldoLama = $pembayaranLama - $totalLama;

      $saldoDetailRekening = intval($detailRekening['saldo_akhir']);
      $saldoRekening = intval($rekening['saldo_akhir']);

      $perubahanSaldoDetailRekening = $saldoDetailRekening - $saldoLama;
      $perubahanSaldoRekening = $saldoRekening - $saldoLama;

      // var_dump($saldoLama  . ' ' . $perubahanSaldoDetailRekening . ' ' .$saldoRekening.' '. $perubahanSaldoRekening);

      $this->Kasir_model->updateDetailRekening($transaksi['code'], $bulan, $perubahanSaldoDetailRekening);
      $this->Kasir_model->updateRekening($detailRekening['id_rekening'], $perubahanSaldoRekening);
    }

    $kg = floatval($transaksi['kg']);
    $ekor = intval($transaksi['ekor']);
    $id_produk = $transaksi['id_produk'];
    $this->tambahProduknya($kg, $ekor, $id_produk);

    $this->Kasir_model->deleteDetailTransaksi($id);
    $this->Kasir_model->deleteTransaksi($id);
    redirect(base_url() . "kasir/jurnal");
  }

  public function tambahDetailSusut()
  {
    $tanggal = $this->input->post('tanggal');

    $produknya = $this->Kasir_model->cekProduk($tanggal);
    if ($produknya == 0) {
      $this->tambahProduk($tanggal);
    }
    $produknya = $this->Kasir_model->getProduk($tanggal);
    $id_produk = intval($produknya['id_produk']);

    $ayam_masuk_ekor = intval($this->input->post('ayam_masuk_ekor'));
    $ayam_masuk_kg = intval($this->input->post('ayam_masuk_kg'));

    $kandang_ekor = intval($this->input->post('kandang_ekor'));
    $kandang_kg = floatval($this->input->post('kandang_kg'));
    $armada_ekor = intval($this->input->post('armada_ekor'));
    $armada_kg = floatval($this->input->post('armada_kg'));
    $rpa_ekor = intval($this->input->post('rpa_ekor'));
    $rpa_kg = floatval($this->input->post('rpa_kg'));

    $admin_ekor = intval($this->input->post('admin_ekor'));
    $admin_kg = floatval($this->input->post('admin_kg'));
    $riil_ekor = intval($this->input->post('riil_ekor'));
    $riil_kg = floatval($this->input->post('riil_kg'));

    $ekor = $kandang_ekor + $armada_ekor + $rpa_ekor;
    $kg = $kandang_kg + $armada_kg + $rpa_kg;

    $persen = $this->hitungPersentase($admin_kg, $ayam_masuk_kg);
    $this->tambahSusut($ekor, $kg, $persen);
    $susutnya = $this->Kasir_model->getSusutTerbaru();
    $id_susut = intval($susutnya['id_penyusutan']);

    $data = array(
      'id_produk' => $id_produk,
      'id_penyusutan' => $id_susut,
      'ayam_masuk_ekor' => $ayam_masuk_ekor,
      'ayam_masuk_kg' => $ayam_masuk_kg,
      'mati_kandang_ekor' => $kandang_ekor,
      'mati_kandang_kg' => $kandang_kg,
      'mati_armada_ekor' => $armada_ekor,
      'mati_armada_kg' => $armada_kg,
      'mati_rpa_ekor' => $rpa_ekor,
      'mati_rpa_kg' => $rpa_kg,
      'admin_ekor' => $admin_ekor,
      'admin_kg' => $admin_kg,
      'riil_ekor' => $riil_ekor,
      'riil_kg' => $riil_kg
    );
    $this->Kasir_model->tambahDetailSusut($data);
    redirect(base_url() . "kasir/penyusutanMingguan");
  }

  public function tambahProduk($tanggal)
  {
    $daybefore = strtotime($tanggal . '-1 day');
    $kemaren = date("Y-m-d", $daybefore);
    $produknya = $this->Kasir_model->getProduk($kemaren);

    $ekor = $produknya['stok_ekor'];
    $kg = $produknya['stok_kg'];

    $data = array(
      'tanggal' => $tanggal,
      'stok_ekor' => $ekor,
      'stok_kg' => $kg
    );
    $this->Kasir_model->tambahProduk($data);
  }

  public function tambahSusut($ekor, $kg, $persen)
  {
    $data = array(
      'jumlah_ekor' => $ekor,
      'jumlah_kg' => $kg,
      'persentase' => $persen
    );
    $this->Kasir_model->tambahSusut($data);
  }

  public function hitungPersentase($admin, $ayamMasuk)
  {
    $persen = $admin / $ayamMasuk * 100;
    return $persen;
  }

  public function tambahDetailPenjualan($tanggal)
  {
    $produk = $this->Kasir_model->cekProduk($tanggal);
    if ($produk == 0) {
      $this->tambahProduk($tanggal);
    }
    $produk = $this->Kasir_model->getProduk($tanggal);
    $id_produk = $produk['id_produk'];
    return $id_produk;
  }

  public function kurangProduk($kg, $ekor, $id)
  {
    $produk = $this->Kasir_model->getProdukbyId($id);
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
    $this->Kasir_model->updateProduk($id, $data);
  }

  public function tambahProduknya($kg, $ekor, $id)
  {
    $produk = $this->Kasir_model->getProdukbyId($id);
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
    $this->Kasir_model->updateProduk($id, $data);
  }
}
