<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard  extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Product_model');
    $this->load->model('Category_model');
    $this->load->model('Category_artikel_model');
    $this->load->model('Pengelola_artikel_model');
    $role = $this->session->userdata('role');
    if ($role != 'admin') {
      redirect(base_url('/'));
      return;
    }
  }
  public function index()
  {
    $this->load->view('page/admin/index');
  }
  public function products($page = null)
  {
    $data['title']    = 'Admin: Produk';
    $data['content']  = $this->Product_model->select(
      [
        'product.id', 'product.title AS product_title', 'product.image',
        'product.price', 'product.is_available',
        'category.title AS category_title'
      ]
    )
      ->join('category')
      ->paginate($page)
      ->orderBy('product.id', 'DESC')
      ->get();
    $data['total_rows']  = $this->Product_model->count();
    $data['pagination']  = $this->Product_model->makePagination(
      base_url('dashboard/products'),
      3,
      $data['total_rows']
    );

    $this->load->view('page/admin/product/index', $data);
  }

  public function category($page = null)
  {
    $data['title']    = 'Admin: Category';
    $data['content']  = $this->Category_model->paginate($page)->get();
    $data['total_rows']  = $this->Category_model->count();
    $data['pagination']  = $this->Category_model->makePagination(
      base_url('category'),
      2,
      $data['total_rows']
    );

    $this->load->view('page/admin/category/index', $data);
  }
  public function category_artikel($page = null)
  {
    $data['title']    = 'Admin: Category';
    $data['content']  = $this->Category_artikel_model->paginate($page)->get();
    $data['total_rows']  = $this->Category_artikel_model->count();
    $data['pagination']  = $this->Category_artikel_model->makePagination(
      base_url('category'),
      2,
      $data['total_rows']
    );

    $this->load->view('page/admin/category_artikel/index', $data);
  }
  public function artikel($page = null)
  {

    $data['title']    = 'halaman artikel';
    $data['content']  = $this->Pengelola_artikel_model->select([
      'artikel.id', 'artikel.title AS judul', 'artikel.views', 'artikel.content', 'artikel.cover', 'artikel.id_category_artikel',
      'artikel.dibuat', 'artikel.slug AS artikel_slug',
      'category_artikel.title AS category_title', 'category_artikel.slug AS category_slug'
    ])
      ->join('category_artikel')
      ->paginate($page)
      ->orderBy('artikel.dibuat', 'DESC')
      ->get();
    $data['total_rows']  = $this->Pengelola_artikel_model->count();
    $data['pagination']  = $this->Pengelola_artikel_model->makePagination(
      base_url('product'),
      2,
      $data['total_rows']
    );
    $data['page']    = 'page/admin/artikel/index';

    $this->load->view('page/admin/artikel/index', $data);
  }
}


/* End of file Admin.php */
