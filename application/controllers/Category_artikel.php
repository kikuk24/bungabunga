<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_artikel extends MY_Controller
{

  public function index($page = null)
  {
    $data['title']    = 'Admin: Category';
    $data['content']  = $this->category_artikel->paginate($page)->get();
    $data['total_rows']  = $this->category_artikel->count();
    $data['pagination']  = $this->category_artikel->makePagination(
      base_url('category'),
      2,
      $data['total_rows']
    );
    $data['page']    = 'page/category/index';

    $this->load->view('page/admin/category_artikel/index', $data);
  }

  /**
   * fungsi pencarian kategori
   */
  public function search($page = null)
  {
    // Validasi keyword
    if (isset($_POST['keyword'])) {
      $this->session->set_userdata('keyword', $this->input->post('keyword'));
    } else {
      redirect(base_url('category'));
    }
    // mengembalikan data yang dicari
    $keyword  = $this->session->userdata('keyword');
    $data['title']    = 'Admin: Category';
    $data['content']  = $this->category->like('title', $keyword)->paginate($page)->get();
    $data['total_rows']  = $this->category->like('title', $keyword)->count();
    $data['pagination']  = $this->category->makePagination(
      base_url('category/search'),
      3,
      $data['total_rows']
    );
    $data['page']    = 'page/category/index';

    $this->view($data);
  }
  // menghapus semua data kategori
  public function reset()
  {
    $this->session->unset_userdata('keyword');
    redirect(base_url('category'));
  }
  // funsi membuat data kategori baru
  public function create()
  {
    if (!$_POST) {
      $input  = (object) $this->category_artikel->getDefaultValues();
    } else {
      $input  = (object) $this->input->post(null, true);
    }

    if (!$this->category_artikel->validate()) {
      $data['title']      = 'Tambah Kategori';
      $data['input']      = $input;
      $data['form_action']  = base_url('category_artikel/create');

      $this->load->view('page/admin/category_artikel/form', $data);
      return;
    }

    if ($this->category_artikel->create($input)) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan!');
    } else {
      $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
    }

    redirect(base_url('dashboard/category_artikel'));
  }

  public function edit($id)
  {
    $data['content'] = $this->category_artikel->where('id', $id)->first();

    if (!$data['content']) {
      $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
      redirect(base_url('dashboard/category_artikel'));
    }

    if (!$_POST) {
      $data['input']  = $data['content'];
    } else {
      $data['input']  = (object) $this->input->post(null, true);
    }

    if (!$this->category_artikel->validate()) {
      $data['title']      = 'Ubah Kategori';
      $data['form_action']  = base_url("category_artikel/edit/$id");
      $data['page']      = 'page/category/form';

      $this->load->view('page/admin/category_artikel/form', $data);
      return;
    }

    if ($this->category_artikel->where('id', $id)->update($data['input'])) {
      $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
    } else {
      $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
    }

    redirect(base_url('dashboard/category_artikel'));
  }

  public function delete($id)
  {
    if (!$_POST) {
      redirect(base_url('dashboard/category_artikel'));
    }

    if (!$this->category_artikel->where('id', $id)->first()) {
      $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan.');
      redirect(base_url('dashboard/category_artikel'));
    }

    if ($this->category_artikel->where('id', $id)->delete()) {
      $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
    } else {
      $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
    }

    redirect(base_url('dashboard/category_artikel'));
  }

  public function unique_slug()
  {
    $slug    = $this->input->post('slug');
    $id      = $this->input->post('id');
    $category  = $this->category_artikel->where('slug', $slug)->first();

    if ($category) {
      if ($id == $category->id) {
        return true;
      }
      $this->load->library('form_validation');
      $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
      return false;
    }

    return true;
  }
}

/* End of file Categori_artikel.php */
