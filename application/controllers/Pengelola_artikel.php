<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pengelola_artikel extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title']    = 'halaman artikel';
    $data['content']  = $this->pengelola_artikel->select([
      'artikel.id', 'artikel.title AS judul', 'artikel.content', 'artikel.cover', 'artikel.id_category_artikel',
      'artikel.dibuat', 'artikel.slug AS artikel_slug',
      'category_artikel.title AS category_title', 'category_artikel.slug AS category_slug'
    ])
      ->join('category_artikel')
      // ->paginate($page)
      ->orderBy('artikel.dibuat', 'DESC')
      ->get();
    $data['total_rows']  = $this->pengelola_artikel->count();
    $data['pagination']  = $this->pengelola_artikel->makePagination(
      base_url('product'),
      2,
      $data['total_rows']
    );
    $data['page']    = 'page/artikel/index';

    $this->view($data);
  }
  public function create()
  {
    if (!$_POST) {
      $input  = (object) $this->pengelola_artikel->getDefaultValues();
    } else {
      $input  = (object) $this->input->post(null, true);
    }

    if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
      $imageName  = url_title($input->title, '-', true) . '-' . date('YmdHis');
      $upload    = $this->pengelola_artikel->uploadImage('image', $imageName);
      if ($upload) {
        $input->cover  = $upload['file_name'];
      } else {
        redirect(base_url('artikel/create'));
      }
    }

    if (!$this->pengelola_artikel->validate()) {
      $data['title']      = 'Tambah Produk';
      $data['input']      = $input;
      $data['form_action']  = base_url('pengelola_artikel/create');

      $this->load->view('page/admin/artikel/form', $data);
      return;
    }

    if ($this->pengelola_artikel->create($input)) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan!');
    } else {
      $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
    }

    redirect(base_url('dashboard/artikel'));
  }
  public function unique_slug()
  {
    $slug    = $this->input->post('slug');
    $id      = $this->input->post('id');
    $artikel   = $this->pengelola_artikel->where('slug', $slug)->first();

    if ($artikel) {
      if ($id == $artikel->id) {
        return true;
      }
      $this->load->library('form_validation');
      $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
      return false;
    }

    return true;
  }
}
/* End of file Blog.php */