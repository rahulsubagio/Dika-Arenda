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
    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/dashboard');
    $this->load->view('templates/footer');
  }

  public function jurnal()
  {
    $this->session->set_flashdata('jurnal', 'active');
    $this->session->set_flashdata('judul', 'Jurnal Transaksi');

    $data['customer'] = $this->Kasir_model->getCustomer();
    $countC = $this->Kasir_model->countCustomer('customer') + 1;
    $countU = $this->Kasir_model->countCustomer('umum') + 1;
    $data['countCustomer'] = $countC;
    $data['countUmum'] = $countU;
    $tanggal = $this->input->post('tanggal');
    $today = date("Y-m-d");

    if (isset($_POST['update']) && $tanggal != $today) {
      $data['transaksi'] = $this->Kasir_model->getTransaksi($tanggal);
      $data['subtotal'] = $this->Kasir_model->getSubtotalJurnal($tanggal);
      $data['hari'] = $tanggal;
      $this->session->set_flashdata('button', 'off');
    } else {
      $data['transaksi'] = $this->Kasir_model->getTransaksi($today);
      $data['subtotal'] = $this->Kasir_model->getSubtotalJurnal($today);
      $data['hari'] = $today;
      $this->session->set_flashdata('button', 'on');
    }

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/jurnal-rekhar', $data);
    $this->load->view('templates/footer');
  }

  public function leger()
  {
    $this->session->set_flashdata('leger', 'active');
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

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/leger', $data);
    $this->load->view('templates/footer');
  }

  public function rekapHarian()
  {
    $this->session->set_flashdata('rekhar', 'active');
    $this->session->set_flashdata('judul', 'Rekapitulasi Transaksi Harian');
    $this->session->set_flashdata('button', 'off');

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

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/jurnal-rekhar', $data);
    $this->load->view('templates/footer');
  }

  public function rekapBulanan()
  {
    $this->session->set_flashdata('rekbul', 'active');

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

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/rekapBulanan', $data);
    $this->load->view('templates/footer');
  }

  public function rekapPenjualan()
  {
    $this->session->set_flashdata('rekjual', 'active');

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/rekapJual');
    $this->load->view('templates/footer');
  }

  public function penyusutanMingguan()
  {
    $this->session->set_flashdata('susutMinggu', 'active');
    $this->session->set_flashdata('button', 'on');
    if (isset($_POST['update'])) {
      $minggu = $this->input->post('minggu');
      $year = substr($minggu, 0, 4);
      $week = substr($minggu, 6, 2);
      $date1 = date("l, M jS, Y", strtotime($year . "W" . $week . "1")); // First day of week
      $date2 = date("l, M jS, Y", strtotime($year . "W" . $week . "7")); // Last day of week
      $tanggalnya = $date1 . " - " . $date2;
      $data['minggu'] = $tanggalnya;
    } else {
      $today = date("d-m-Y");
      $date = new DateTime($today);
      $week = $date->format("W");
      $year = $date->format("Y");
      $date1 = date("l, M jS, Y", strtotime($year . "W" . $week . "1")); // First day of week
      $date2 = date("l, M jS, Y", strtotime($year . "W" . $week . "7")); // Last day of week
      $minggu = $date1 . " - " . $date2;
      $data['minggu'] = $minggu;
    }

    $this->load->view('templates/navbar');
    $this->load->view('templates/kasir/sidebar');
    $this->load->view('kasir/susutMinggu', $data);
    $this->load->view('templates/footer');
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
    date_default_timezone_set("Asia/Jakarta");
    $tanggalSatu = date("Y-m-01");
    $today = date("Y-m-d H:i:s");

    if ($this->input->post('customer') != NULL) {

      $code = $this->input->post('customer');
      $ekor = intval($this->input->post('ekor'));
      $kg = floatval($this->input->post('kg'));
      $harga = intval($this->input->post('harga'));
      $a = intval($this->input->post('a'));
      $total = $kg * $harga;
      $pembayaran = intval($this->input->post('pembayaran'));

      if ($a > 0) {
        $total = $a * $kg;
      }

      $data = array(
        'code' => $code,
        'tanggal' => $today,
        'ekor' => $ekor,
        'kg' => $kg,
        'harga' => $harga,
        'a_kompensasi' => $a,
        'total' => $total,
        'pembayaran' => $pembayaran
      );

      $jenisCode = substr($code, 0, 1);
      if ($jenisCode == "C") {
        $saldoTambahan = ($total * -1) + $pembayaran;

        $detailRekening = $this->Kasir_model->getDetailRekening($code, $tanggalSatu);

        $idRekening = intval($detailRekening['id_rekening']);
        $dataRekening = $this->Kasir_model->getRekening($idRekening);

        $saldoBaru = intval($dataRekening['saldo_akhir']) + $saldoTambahan;
        $this->Kasir_model->updateRekening($idRekening, $saldoBaru);

        $saldoAkhirBulan = intval($detailRekening['saldo_akhir']);
        $saldoAkhirBulanBaru = $saldoAkhirBulan + $saldoTambahan;
        $this->Kasir_model->updateDetailRekening($code, $tanggalSatu, $saldoAkhirBulanBaru);
      }

      $this->Kasir_model->tambahTransaksi($data);
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
      $total = $kg * $harga;
      $pembayaran = intval($this->input->post('pembayaran'));

      if ($a > 0) {
        $total = $a * $kg;
      }

      $data = array(
        'code' => $codeCus,
        'tanggal' => $today,
        'ekor' => $ekor,
        'kg' => $kg,
        'harga' => $harga,
        'a_kompensasi' => $a,
        'total' => $total,
        'pembayaran' => $pembayaran
      );

      if ($this->input->post('status') == "customer") {
        $saldo = ($total * -1) + $pembayaran;
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

      $this->Kasir_model->tambahTransaksi($data);
    }

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
      $harga = intval($this->input->post('harga'));
      $a = intval($this->input->post('a'));
      $total = ($kg * $harga) - ($a * $kg);
      $pembayaran = intval($this->input->post('pembayaran'));

      $data = array(
        'id_penjualan' => $this->input->post('id'),
        'code' => $this->input->post('code'),
        'tanggal' => $this->input->post('tanggal'),
        'ekor' => $this->input->post('ekor'),
        'kg' => $this->input->post('kg'),
        'harga' => $this->input->post('harga'),
        'a_kompensasi' => $this->input->post('a'),
        'total' => $total,
        'pembayaran' => $this->input->post('pembayaran')
      );
      if ($cekCode == 'C') {
        $bulan = date('Y-m-01');
        $transaksiLama = $this->Kasir_model->getTransaksiById($id);
        $detailRekening = $this->Kasir_model->getDetailRekening($code, $bulan);
        $rekening = $this->Kasir_model->getRekening($detailRekening['id_rekening']);

        $hargaLama = intval($transaksiLama['harga']);
        $kgLama = floatval($transaksiLama['kg']);
        $aLama = intval($transaksiLama['a_kompensasi']);
        $pembayaranLama = intval($transaksiLama['pembayaran']);

        $saldoLama = (($hargaLama * $kgLama) - ($aLama * $kgLama)) * -1 + $pembayaranLama;
        $saldoBaru = (($harga * $kg) - ($a * $kg)) * -1 + $pembayaran;

        $saldoDetailRekening = intval($detailRekening['saldo_akhir']);
        $saldoRekening = intval($rekening['saldo_akhir']);

        $perubahanSaldoDetailRekening = $saldoDetailRekening - $saldoLama + $saldoBaru;
        $perubahanSaldoRekening = $saldoRekening - $saldoLama + $saldoBaru;

        var_dump($saldoLama . ' ' . $saldoBaru . ' ' . $perubahanSaldoDetailRekening . ' ' . $perubahanSaldoRekening);

        $this->Kasir_model->updateDetailRekening($code, $bulan, $perubahanSaldoDetailRekening);
        $this->Kasir_model->updateRekening($detailRekening['id_rekening'], $perubahanSaldoRekening);
      }
      $this->Kasir_model->updateTransaksi($id, $data);
      redirect(base_url() . "kasir/jurnal");
    } else {
      $this->load->view('templates/navbar');
      $this->load->view('templates/kasir/sidebar');
      $this->load->view('kasir/editPenjualan', $data);
      $this->load->view('templates/footer');
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

      $hargaLama = intval($transaksiLama['harga']);
      $kgLama = floatval($transaksiLama['kg']);
      $aLama = intval($transaksiLama['a_kompensasi']);
      $pembayaranLama = intval($transaksiLama['pembayaran']);

      $saldoLama = (($hargaLama * $kgLama) - ($aLama * $kgLama)) * -1 + $pembayaranLama;

      $saldoDetailRekening = intval($detailRekening['saldo_akhir']);
      $saldoRekening = intval($rekening['saldo_akhir']);

      $perubahanSaldoDetailRekening = $saldoDetailRekening - $saldoLama;
      $perubahanSaldoRekening = $saldoRekening - $saldoLama;

      // var_dump($saldoLama  . ' ' . $perubahanSaldoDetailRekening . ' ' .$saldoRekening.' '. $perubahanSaldoRekening);

      $this->Kasir_model->updateDetailRekening($transaksi['code'], $bulan, $perubahanSaldoDetailRekening);
      $this->Kasir_model->updateRekening($detailRekening['id_rekening'],$perubahanSaldoRekening);
    }
    $this->Kasir_model->deleteTransaksi($id);
    redirect(base_url() . "kasir/jurnal");
  }
}
