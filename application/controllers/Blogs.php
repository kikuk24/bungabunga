<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Views_model');
  }

  public function index()
  {
    $data['artikel'] = $this->Views_model->get_all();
    print_r($data);
  }
  public function blog($id)

  {
    $data['artikel'] = $this->Views_model->get_by_id($id);
    print_r($data);
    $this->update_views($id);
  }
  public function update_views($id)

  {
    $this->load->helper('cookie');

    $check_visitor = $this->input->cookie(urldecode($id));
    $ip = $this->input->ip_address();
    if ($check_visitor == false) {
      $cookie = array("name" => urldecode($id), "value" => $ip, "expire" => time() + 300, "secure" => false);
      $this->input->set_cookie($cookie);
      $this->Views_model->update_views(urldecode($id));
    }
  }
}

/* End of file Views.php */
