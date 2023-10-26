<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{

  public function index()
  {
    $data['title']  = 'products';
    $data['content']  = $this->products->select(
      [
        'product.id', 'product.title AS product_title',
        'product.slug',
        'product.description', 'product.image',
        'product.price', 'product.is_available',
        'category.title AS category_title', 'category.slug AS category_slug'
      ]
    )
      ->join('category')
      ->where('product.is_available', 1)
      ->get();
    $data['total_rows']  = $this->products->where('product.is_available', 1)->count();

    $data['page']  = 'page/products/index';

    $this->view($data);
  }
  public function category($category)
  {
    $data['title']    = 'Products';
    $data['content']  = $this->products->select(
      [
        'product.id', 'product.title AS product_title',
        'product.description', 'product.image',
        'product.price', 'product.is_available',
        'category.title AS category_title', 'category.slug AS category_slug'
      ]
    )
      ->join('category')
      ->where('product.is_available', 1)
      ->where('category.slug', $category)
      ->get();
    $data['total_rows']  = $this->products->where('product.is_available', 1)->where('category.slug', $category)->join('category')->count();
    $data['category']  = ucwords(str_replace('-', ' ', $category));
    $data['page']    = 'page/products/index';

    $this->view($data);
  }
  public function search()
  {
    if (isset($_POST['keyword'])) {
      $this->session->set_userdata('keyword', $this->input->post('keyword'));
    } else {
      redirect(base_url('/'));
    }

    $keyword  = $this->session->userdata('keyword');
    $data['title']    = 'Pencarian: Produk';
    $data['content']  = $this->products->select(
      [
        'product.id', 'product.title AS product_title',
        'product.description', 'product.image',
        'product.price', 'product.is_available',
        'category.title AS category_title', 'category.slug AS category_slug'
      ]
    )
      ->join('category')
      ->like('product.title', $keyword)
      ->orLike('product.description', $keyword)
      ->get();
    $data['total_rows']  = $this->products->like('product.title', $keyword)->orLike('product.description', $keyword)->count();

    $data['page']    = 'page/home/_products';

    $this->view($data);
  }
  public function detail($slug)
  {
    $data['products'] = $this->products->where('slug', $slug)->first();
    if (!$data['products']) {
      $this->session->set_flashdata('product_error', 'Produk tidak ditemukan');
      redirect(base_url('/'));
    }
    // $this->products->table = 'product';
    $data['product_detail'] = $this->products->select(
      [
        'product.id', 'product.title AS product_title',
        'product.description', 'product.image',
        'product.price', 'product.is_available',
        'category.title AS category_title', 'category.slug AS category_slug'
      ]
    )
      ->join('category')
      ->where('product.slug', $slug)
      ->get();
    // $data['title']    = 'Detail Produk, ' . $data['products']->product_title;
    $data['page']    = 'page/products/detail';
    $this->view($data);
  }

}

/* End of file Products.php */
