<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

  public function get_all()
  {
    $this->db->select([
      'artikel.id', 'artikel.title AS judul', 'artikel.content', 'artikel.cover', 'artikel.id_category_artikel',
      'artikel.dibuat', 'artikel.slug AS artikel_slug',
      'category_artikel.title AS category_title', 'category_artikel.slug AS category_slug'
    ]);
    $this->db->from('artikel');
    $this->db->join('category_artikel', 'category_artikel.id = artikel.id_category_artikel', 'left');
    $this->db->order_by('artikel.id', 'desc');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getCategori()
  {
    $this->db->select('*');
    $this->db->from('category_artikel');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function nestedArtikel($category_id)
  {
    $this->db->select([
      'artikel.id', 'artikel.title AS judul', 'artikel.content', 'artikel.cover', 'artikel.id_category_artikel',
      'artikel.dibuat', 'artikel.slug AS artikel_slug',
      'category_artikel.title AS category_title', 'category_artikel.slug AS category_slug'
    ]);
    $this->db->from('artikel');
    $this->db->join('category_artikel', 'category_artikel.id = artikel.id_category_artikel', 'left');
    $this->db->where('artikel.id_category_artikel', $category_id);
    $query = $this->db->get();
    return $query->result_array();
  }









  public function get_by_id($slug)
  {
    $this->db->select([
      'artikel.id', 'artikel.title AS judul', 'artikel.content', 'artikel.cover', 'artikel.id_category_artikel',
      'artikel.dibuat', 'artikel.slug AS artikel_slug',
      'category_artikel.title AS category_title', 'category_artikel.slug AS category_slug'
    ]);
    $this->db->from('artikel');
    $this->db->where('artikel.slug', $slug);
    $this->db->join('category_artikel', 'category_artikel.id = artikel.id_category_artikel', 'left');
    $query = $this->db->get();
    return $query->row();
  }

  public function update_views($slug)
  {
    $this->db->where('slug', urldecode($slug));
    $this->db->select('views');
    $count = $this->db->get('artikel')->row();
    $this->db->where('slug', urldecode($slug));
    $this->db->set('views', ($count->views + 1));
    $this->db->update('artikel');
  }
}


/* End of file Artikel.php */
