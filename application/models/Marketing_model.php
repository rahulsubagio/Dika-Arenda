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
}
