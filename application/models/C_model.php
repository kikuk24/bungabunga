<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_model extends CI_Model
{
  public function getCategori()
  {
    $this->db->select('*');
    $this->db->from('category_artikel');
    $query = $this->db->get();
    $query->result_array();
  }
}

/* End of file C_model.php */
