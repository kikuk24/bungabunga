<?php

function getDropdownList($table, $columns)
{
  $CI    = &get_instance();
  $query  = $CI->db->select($columns)->from($table)->get();

  if ($query->num_rows() >= 1) {
    $option1  = ['' => '- Select -'];
    $option2  = array_column($query->result_array(), $columns[1], $columns[0]);
    $options  = $option1 + $option2;

    return $options;
  }

  return $options  = ['' => '- Select -'];
}
function getProduct()
{
  $CI = &get_instance();
  $query = $CI->db->select(
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
  )
    ->from('product')
    ->join('category', 'category.id = product.id_category', 'left')
    ->get();
  return $query->result();
}
function countProduct()
{
  $CI = &get_instance();
  $query = $CI->db->count_all_results('product');
  return $query;
}
function getCategories()
{
  $CI    = &get_instance();
  $query  = $CI->db->get('category')->result();
  return $query;
}
function countCategory()
{
  $CI    = &get_instance();
  $query  = $CI->db->count_all_results('category');
  return $query;
}
function getHome()
{
  $CI = &get_instance();
  $query = $CI->db->get('home')->result();
  return $query;
}
function countArtikel()
{
  $CI = &get_instance();
  $query = $CI->db->count_all_results('artikel');
  return $query;
}
function getCart()
{
  $CI    = &get_instance();
  $userId  = $CI->session->userdata('id');

  if ($userId) {
    $query  = $CI->db->where('id_user', $userId)->count_all_results('cart');
    return $query;
  }

  return false;
}

function hashEncrypt($input)
{
  $hash  = password_hash($input, PASSWORD_DEFAULT);
  return $hash;
}

function hashEncryptVerify($input, $hash)
{
  if (password_verify($input, $hash)) {
    return true;
  } else {
    return false;
  }
}
