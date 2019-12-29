<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Management_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('core_model');
  }


  //APPLICATION
  public function ContentDashboard()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'Blank';
    return $data;
  }

  public function ContentProfile()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'Profile';
    return $data;
  }

  public function ContentAccountManagement($keyword, $page)
  {
    if ($keyword!=null)
    {
      $data['customer'] = $this->core_model->GetSearchData('Customer', $keyword, $page);
      $data['management'] = $this->core_model->GetSearchData('Management', $keyword, $page);
    }
    else
    {
      $data['customer'] = $this->core_model->GetAllData('Customer', $page);
      $data['management'] = $this->core_model->GetAllData('Management', $page);
    }
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'AccountManagement';
    return $data;
  }

  public function GetDetailCustomer($id)
  {
    $data['detail'] = $this->core_model->GetSingleData('Customer', 'Id', $id);
    $data['order'] = ($this->db->query('CALL GetDetailOrderByCustomer('.$id.')'))->result();
    return json_encode($data);
  }

  public function GetDetailManagement($id)
  {
    $data['detail'] = $this->core_model->GetSingleData('Management', 'Id', $id);
    return json_encode($data);
  }
}


 ?>
