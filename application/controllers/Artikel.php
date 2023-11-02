<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Artikel_model');
    $this->load->model('C_model');
  }

  public function index()
  {
    $data['categories'] = $this->Artikel_model->getCategori();
    $data['artikel'] = array();
    foreach ($data['categories'] as $category) {
      $articles = $this->Artikel_model->nestedArtikel($category['id']);
      $data['articles'][$category['id']] = $articles;
    }
    $data['page'] = 'page/artikel/index';
    $this->view($data);
  }
  public function detail($slug)

  {
    $data['artikel'] = $this->Artikel_model->get_by_id($slug);
    print_r($data);
    $this->update_views($slug);
  }
  public function nestedCategory()
  {
    $data['content'] = $this->Artikel_model->nestedArtikel();
    print_r($data);
  }
  public function update_views($slug)

  {
    $this->load->helper('cookie');

    $check_visitor = $this->input->cookie(urldecode($slug));
    $ip = $this->input->ip_address();
    if ($check_visitor == false) {
      $cookie = array("name" => urldecode($slug), "value" => $ip, "expire" => time() + 300, "secure" => false);
      $this->input->set_cookie($cookie);
      $this->Artikel_model->update_views(urldecode($slug));
    }
  }
}

/* End of file Views.php */
