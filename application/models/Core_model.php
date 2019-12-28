<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Core_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  //CORE
  public function GetSingleData($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal ))->row();
  }

  //FUNCTIONAL
  public function GetWebConf()
  {
    return $this->GetSingleData('webconf', 'Id', 1);
  }
}

 ?>
