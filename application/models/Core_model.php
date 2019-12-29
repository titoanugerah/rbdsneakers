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
    $this->load->helper('text');
  }

  //CORE
  public function GetSingleData($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal ))->row();
  }

  public function GetAllData($table, $page)
  {
    $this->db->limit(50, (50*$page));
    return $this->db->get($table)->result();
  }

  public function GetSearchData($table, $keyword, $page)
  {
    $where = null;
    foreach ($this->db->field_data($table) as $column)
    {
      $where = $where.' '.$column->name.' LIKE  "%'.$keyword.'%" or ';
    };
    $this->db->limit(50, (50*$page));
    return $this->db->get_where($table, substr($where, 0, strlen($where)-3))->result();
  }
  //FUNCTIONAL
  public function GetWebConf()
  {
    return $this->GetSingleData('webconf', 'Id', 1);
  }
}

 ?>
