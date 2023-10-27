<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Editcontent extends MY_Controller
{

  public function index()
  {
    $data['title']    = 'Admin: Produk';
    $data['content']  = $this->editcontent->select(
      [
        'home.id', 'home.title AS home_title', 'home.description AS home_description'
      ]
    )
      ->get();

    $data['page']    = 'page/homeedit/index';

    $this->view($data);
  }
  public function edit($id)
  {
    $data['content'] = $this->editcontent->where('id', $id)->first();

    if (!$data['content']) {
      $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
      redirect(base_url('category'));
    }

    if (!$_POST) {
      $data['input']  = $data['content'];
    } else {
      $data['input']  = (object) $this->input->post(null, true);
    }

    if (!$this->editcontent->validate()) {
      $data['title']      = 'Admin: Edit Content';
      $data['form_action']  = base_url("editcontent/edit/$id");
      $data['page']      = 'page/homeedit/form';

      $this->view($data);
      return;
    }

    if ($this->editcontent->where('id', $id)->update($data['input'])) {
      $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
    } else {
      $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
    }

    redirect(base_url('editcontent'));
  }
}

/* End of file Homeedit.php */
