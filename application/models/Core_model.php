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

  public function GetSomeData($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal ))->result();
  }

  public function GetNumRows($table, $whereVar, $whereVal)
  {
    return $this->db->get_where($table, $where = array($whereVar => $whereVal ))->num_rows();
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

  public function InsertData($table,$data)
  {
    return $this->db->insert($table, $data);
  }

  public function DeleteData($table, $whereVar, $whereVal)
  {
    return $this->db->delete($table, array($whereVar => $whereVal));
  }

  public function UpdateData($table, $whereVar, $whereVal, $setVar, $setVal)
  {
    $data = array($setVar => $setVal );
    $this->db->where($where = array($whereVar => $whereVal ));
    return $this->db->update($table, $data);
  }

  public function UpdateDataBatch($table, $whereVar, $whereVal, $data)
  {
    $this->db->where($where = array($whereVar => $whereVal ));
    return $this->db->update($table, $data);
  }

  public function SentEmail($to, $fullname, $subject, $content, $account)
  {
   // $account = $this->getSingleData('webconf', 'id', 1);
    $config['smtp_crypto'] = $account->crypto; 
    $config['protocol'] = 'mail'; 
    $config['smtp_host'] = $account->host;
    $config['smtp_user'] = $account->email; 
    $config['smtp_pass'] = $account->password; 
    $config['smtp_port'] = $account->port; 
    $config['charset']='utf-8'; // Default should be utf-8 (this should be a text field) 
    $config['newline']="\r\n"; //"\r\n" or "\n" or "\r". DEFAULT should be "\r\n" 
    $config['crlf'] = "\r\n"; //"\r\n" or "\n" or "\r" DEFAULT should be "\r\n" 
    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->from($account->email);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message('
    Yth. '.$fullname.'
    Di Tempat.

    '.$content.'
    Terima Kasih
    ');
    $sent = $this->email->send(); 
    error_reporting(1);
    var_dump($config);die;
  }

  //FUNCTIONAL
  public function GetWebConf()
  {
    return $this->GetSingleData('webconf', 'Id', 1);
  }
}

 ?>
