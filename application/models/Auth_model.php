<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  private $_table = 'user';
  const SESSION_KEY = 'user_id';

  public function rules()
  {
    return [
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|required|valid_email|is_unique[user.email]',
        'errors' => [
          'is_unique' => 'email %s sudah ada'
        ]
      ],
      [
        'field' => 'password',
        'label' => 'password',
        'rules' => 'required|min_lenght[8]'
      ]
    ];
  }
  public function login($email, $password)
  {
    $this->db->where('email', $email);
    $query = $this->db->get($this->_table);
    $user = $query->row();

    if (!$user) {
      return FALSE;
    }
    if (!password_verify($password, $user->password)) {
      return FALSE;
    }
  }
}

/* End of file Auth_model.php */
