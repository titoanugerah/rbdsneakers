<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class management extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('management_model');
    error_reporting(1);
  }

  public function Dashboard()
  {
    $this->load->view('Management/Template', $this->management_model->ContentDashboard());
  }

  public function Profile()
  {
    $this->load->view('Management/Template', $this->management_model->ContentProfile());
  }

  public function AccountManagement($page)
  {
    $keyword = null;
    if ($this->input->post('search'))
    {
      $keyword = $this->input->post('search');
    }
    $this->session->set_flashdata('page', $page);
    $this->load->view('Management/Template', $this->management_model->ContentAccountManagement($keyword, $page));
  }

  public function GetDetailCustomer()
  {
    echo $this->management_model->GetDetailCustomer($this->input->get('Id'));
  }

  public function GetDetailManagement()
  {
    echo $this->management_model->GetDetailManagement($this->input->get('Id'));
  }

  public function UpdateAccountManagement()
  {
    echo $this->management_model->UpdateAccountManagement($this->input->get('Id'), $this->input->get('Privilleges'));
  }

}

 ?>
