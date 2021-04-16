<?php

class Kasir_model extends CI_Model
{
  public function tambahCustomer($data)
  {
    $this->db->insert('customer', $data);
  }

  public function getCustomer()
  {
    return $this->db->select('code, nama_customer')
      ->order_by('code')->get('customer')
      ->result_array();
  }

  public function countCustomer($status)
  {
    return $this->db
      ->where('status', $status)
      ->from('customer')
      ->count_all_results();
  }

  public function createRekening($data)
  {
    $this->db->insert('rekening', $data);
  }

  public function getNewRekening()
  {
    return $this->db->select('id_rekening')
      ->order_by('id_rekening', 'DESC')
      ->limit(1)
      ->get('rekening')
      ->row_array();
  }

  public function getRekening($id)
  {
    return $this->db->where('id_rekening', $id)->get('rekening')->row_array();
  }

  public function updateRekening($id, $data)
  {
    $this->db->set('saldo_akhir', $data)
      ->where('id_rekening', $id)
      ->update('rekening');
  }

  public function tambahDetailRekening($data)
  {
    $this->db->insert('detail_rekening', $data);
  }

  public function getDetailRekening($code, $tanggal)
  {
    return $this->db->select('code, id_rekening, tanggal, saldo_akhir')
      ->where('code', $code)
      ->where('tanggal', $tanggal)
      ->get('detail_rekening')
      ->row_array();
  }

  public function updateDetailRekening($code, $tanggal, $data)
  {
    $this->db->set('saldo_akhir', $data)
      ->where('code', $code)
      ->where('tanggal', $tanggal)
      ->update('detail_rekening');
  }

  public function tambahTransaksi($data)
  {
    $this->db->insert('penjualan', $data);
  }

  public function getTransaksi($tanggal)
  {
    return $this->db
      ->from('penjualan as p')
      ->join('customer as c', 'p.code = c.code')
      ->like('tanggal', $tanggal)
      ->get()
      ->result_array();
  }

  public function getSubtotalJurnal($tanggal)
  {
    return $this->db
      ->select('SUM(ekor) as ekor, SUM(kg) as kg, AVG(NULLIF(harga, 0)) as harga, AVG(NULLIF(a_kompensasi, 0)) as a, SUM(total) as total, SUM(pembayaran) as pembayaran')
      ->from('penjualan')
      ->like('tanggal', $tanggal)
      ->get()
      ->row_array();
  }

  public function getTransaksiCustomer($tanggal)
  {
    return $this->db
      ->from('penjualan as p')
      ->join('customer as c', 'p.code = c.code')
      ->where('status', 'customer')
      ->like('tanggal', $tanggal)
      ->get()
      ->result_array();
  }

  public function getSubtotalRekap($tanggal)
  {
    return $this->db
      ->select('SUM(ekor) as ekor, SUM(p.kg) as kg, AVG(NULLIF(harga, 0)) as harga, AVG(NULLIF(a_kompensasi, 0)) as a, SUM(total) as total, SUM(pembayaran) as pembayaran')
      ->from('penjualan as p')
      ->join('customer as c', 'p.code = c.code')
      ->where('status', 'customer')
      ->like('tanggal', $tanggal)
      ->get()
      ->row_array();
  }

  public function getCustomerLangganan(){
    return $this->db
    ->where('status', 'customer')
    ->get('customer')->result_array();
  }

  public function getTransaksiCustomerLeger($tanggal, $code)
  {
    return $this->db
      ->from('penjualan as p')
      ->join('customer as c', 'p.code = c.code')
      ->where('p.code', $code)
      ->like('tanggal', $tanggal)
      ->get()
      ->result_array();
  }

  public function getSubtotalLeger($tanggal, $code)
  {
    return $this->db
      ->select('SUM(ekor) as ekor, SUM(kg) as kg, AVG(NULLIF(harga, 0)) as harga, AVG(NULLIF(a_kompensasi, 0)) as a, SUM(total) as total, SUM(pembayaran) as pembayaran')
      ->from('penjualan')
      ->where('code', $code)
      ->like('tanggal', $tanggal)
      ->get()
      ->row_array();
  }

  public function getDetailCustomer($code, $tanggal)
  {
    return $this->db->select('c.code, nama_customer, id_rekening, tanggal, saldo_awal, saldo_akhir')
      ->from('customer as c')
      ->join('detail_rekening as d', 'c.code = d.code')
      ->where('d.code', $code)
      ->like('tanggal', $tanggal)
      ->get()
      ->row_array();
  }

}
