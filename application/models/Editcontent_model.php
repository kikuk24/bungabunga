<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Editcontent_model extends MY_Model
{
  protected $table = 'home';
  public function getDefaultValues()
  {
    return [
      'id' => '',
      'title' => '',
      'description' => '',
    ];
  }
  public function getValidationRules()
  {
    $validationRules = [
      [
        'field'  => 'title',
        'label'  => 'title',
        'rules'  => 'required'
      ],
      [
        'field'  => 'description',
        'label'  => 'description',
        'rules'  => 'required'
      ],
    ];
    return $validationRules;
  }
}
/* End of file Homeedit.php */
