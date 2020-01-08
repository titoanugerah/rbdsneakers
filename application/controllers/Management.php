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

  public function CategoryManagement()
  {
    $keyword = null;
    if ($this->input->post('search'))
    {
      $keyword = $this->input->post('search');
    }
    $this->load->view('Management/Template', $this->management_model->ContentCategoryMangement($keyword));
  }

  public function ProductManagement()
  {
    $this->load->view('Management/Template', $this->management_model->ContentProductManagement());
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

  public function AddAccountManagement()
  {
    echo $this->management_model->AddAccountManagement($this->input->post('Email'), $this->input->post('Privilleges'));
  }

  public function GetCategory()
  {
    echo $this->management_model->GetCategory($this->input->post('Keyword'));
  }

  public function GetDetailCategory()
  {
    echo $this->management_model->GetDetailCategory($this->input->post('Id'));
  }

  public function UpdateCategory()
  {
    echo $this->management_model->UpdateCategory($this->input->post('Id'),$this->input->post('Name'),$this->input->post('Description'));
  }

  public function DeleteCategory()
  {
    echo $this->management_model->DeleteCategory($this->input->post('Id'),$this->input->post('Email'));
  }

  public function RecoverCategory()
  {
    echo $this->management_model->RecoverCategory($this->input->post('Id'));
  }

  public function GetProduct()
  {
    echo $this->management_model->GetProduct($this->input->post('Keyword'), $this->input->post('Order'));
  }

}

 ?>
