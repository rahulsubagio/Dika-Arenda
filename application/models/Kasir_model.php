<?php

class Kasir_model extends CI_Model
{
  public function tambahCustomer($data){
    $this->db->insert('customer',$data);
  }

  public function getCustomer(){
    return $this->db->select('code, nama_customer')
    ->order_by('code')->get('customer')
    ->result_array();
  }

  public function countCustomer($status){
    return $this->db
        ->where('status', $status)
        ->from('customer')
        ->count_all_results();
  }

  public function createRekening($data){
    $this->db->insert('rekening', $data);
  }

  public function getNewRekening(){
    return $this->db->select('id_rekening')
    ->order_by('id_rekening', 'DESC')
    ->limit(1)
    ->get('rekening')
    ->row_array();
  }

  public function getRekening($id){
    return $this->db->where('id_rekening', $id)->get('rekening')->row_array();
  }

  public function updateRekening($id, $data){
    $this->db->set('saldo_akhir', $data)
    ->where('id_rekening', $id)
    ->update('rekening');
  }

  public function tambahDetailRekening($data){
    $this->db->insert('detail_rekening', $data);
  }

  public function getDetailRekening($code, $tanggal){
    return $this->db->select('code, id_rekening, tanggal, saldo_akhir')
    ->where('code', $code)
    ->where('tanggal', $tanggal)
    ->get('detail_rekening')
    ->row_array();
  }

  public function updateDetailRekening($code, $tanggal, $data){
    $this->db->set('saldo_akhir', $data)
    ->where('code', $code)
    ->where('tanggal', $tanggal)
    ->update('detail_rekening');
  }

  public function tambahTransaksi($data){
    $this->db->insert('penjualan',$data);
  }
}
