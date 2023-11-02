<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function getProduct()
  {
    $this->db->select(
      [
        'product.id',
        'product.title AS product_title',
        'product.slug',
        'product.description',
        'product.image',
        'product.price',
        'product.is_available',
        'category.title AS category_title',
        'category.slug AS category_slug'
      ]
    );

    $this->db->from('product');
    $this->db->join('category', 'category.id = product.id_category', 'left');

    $query = $this->db->get();
    return $query->result();
  }
}

/* End of file Admin_model.php */
