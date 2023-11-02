<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Views_model extends CI_Model
{

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('artikel');
    $query = $this->db->get();
    return $query->result();
  }
  public function get_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('artikel');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function update_views($id)
  {
    $this->db->where('id', urldecode($id));
    $this->db->select('views');
    $count = $this->db->get('artikel')->row();
    $this->db->where('id', urldecode($id));
    $this->db->set('views', ($count->visit + 1));
    $this->db->update('artikel');
  }
}

/* End of file ModelName.php */
