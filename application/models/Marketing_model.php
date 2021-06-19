<?php

class Marketing_model extends CI_Model
{
  public function tambahKandang($data)
  {
    $this->db->insert('pegawai', $data);
  }

  public function getKandang()
  {
    return $this->db->get('pegawai')->result_array();
  }

  public function getKandangId($id)
  {
    return $this->db->get_where('pegawai', array('id_pegawai' => $id))->result_array();
  }

  public function tambahVendor($data)
  {
    $this->db->insert('vendor', $data);
  }

  public function getVendor()
  {
    return $this->db->get('vendor')->result_array();
  }

  public function getVendorId($id)
  {
    return $this->db->get_where('vendor', array('id_vendor' => $id))->result_array();
  }

  public function tambahTransaksi($data)
  {
    $this->db->insert('transaksi', $data);
  }

  public function getTransaksi($tanggal)
  {
    return $this->db
      ->select('*')
      ->from('transaksi as t')
      ->join('vendor as v', 't.id_vendor = v.id_vendor')
      ->join('pegawai as p', 't.id_pegawai = p.id_pegawai')
      ->like('tanggal', $tanggal)
      ->order_by('id_transaksi', 'ASC')
      ->get()
      ->result_array();
  }

  public function getTransaksiLeger($id, $tanggal)
  {
    return $this->db
      ->select('*')
      ->from('transaksi as t')
      ->join('vendor as v', 't.id_vendor = v.id_vendor')
      ->join('pegawai as p', 't.id_pegawai = p.id_pegawai')
      ->where('t.id_vendor', $id)
      ->like('tanggal', $tanggal)
      ->get()
      ->result_array();
  }

  public function getSubtotalJurnal($tanggal)
  {
    return $this->db
      ->select('SUM(ekor) as ekor, SUM(kg) as kg, AVG(NULLIF(harga, 0)) as harga, SUM(kg*harga) as jumlah , SUM(total) as total, SUM(pembayaran) as pembayaran')
      ->from('transaksi')
      ->like('tanggal', $tanggal)
      ->get()
      ->row_array();
  }

  public function getSubtotalLeger($id, $tanggal)
  {
    return $this->db
      ->select('SUM(ekor) as ekor, SUM(kg) as kg, AVG(NULLIF(harga, 0)) as harga, SUM(kg*harga) as jumlah , SUM(total) as total, SUM(pembayaran) as pembayaran')
      ->from('transaksi')
      ->where('id_vendor', $id)
      ->like('tanggal', $tanggal)
      ->get()
      ->row_array();
  }
}
