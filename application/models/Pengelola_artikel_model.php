<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pengelola_artikel_model extends MY_Model
{
  public $table = 'artikel';
  public function getDefaultValues()
  {
    return [
      'id_category_artikel'  => '',
      'slug'      => '',
      'title'      => '',
      'content'  => '',
      'cover'      => ''
    ];
  }

  public function getValidationRules()
  {
    $validationRules = [
      [
        'field'  => 'id_category_artikel',
        'label'  => 'Kategori',
        'rules'  => 'required'
      ],
      [
        'field'  => 'slug',
        'label'  => 'Slug',
        'rules'  => 'trim|required|callback_unique_slug'
      ],
      [
        'field'  => 'title',
        'label'  => 'Judul',
        'rules'  => 'trim|required'
      ],
      [
        'field'  => 'content',
        'label'  => 'Content',
        'rules'  => 'trim|required'
      ],
    ];

    return $validationRules;
  }

  public function uploadImage($fieldName, $fileName)
  {
    $config  = [
      'upload_path'    => './images/artikel',
      'file_name'      => $fileName,
      'allowed_types'    => 'jpg|gif|png|jpeg|JPG|PNG|webp|WEBP',
      'max_size'      => 2054,
      'max_width'      => 0,
      'max_height'    => 0,
      'overwrite'      => true,
      'file_ext_tolower'  => true
    ];

    $this->load->library('upload', $config);

    if ($this->upload->do_upload($fieldName)) {
      return $this->upload->data();
    } else {
      $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
      return false;
    }
  }

  public function deleteImage($fileName)
  {
    if (file_exists("./images/artikel/$fileName")) {
      unlink("./images/artikel/$fileName");
    }
  }
}

/* End of file Blog_model.php */
