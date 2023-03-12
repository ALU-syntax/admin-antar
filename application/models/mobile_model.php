<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_model extends CI_model
{
  public function topup_pulsa($data)
  {
    $this->db->insert('topup_pulsaMP', $data)->result_array();
    return $this->db->affected_rows();
  }

  public function postCallback()
  {
    $this->db->insert('mp_callback')->result_array();
  }
}
