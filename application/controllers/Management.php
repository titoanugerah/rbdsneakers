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
    $this->load->view('Management/Template', $this->management_model->ContentCategoryMangement());
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

  public function GetDetailCategory()
  {
    echo $this->management_model->GetDetailCategory($this->input->post('Id'));
  }

  public function UpdateCategory()
  {
    echo $this->management_model->UpdateCategory($this->input->post('Id'),$this->input->post('Name'),$this->input->post('Description'));
  }

  public function GetProduct()
  {
    echo $this->management_model->GetProduct($this->input->post('Keyword'), $this->input->post('Order'));
  }

  public function GetAll2()
  {
    echo $this->management_model->GetAll2($this->input->post('Table1'), $this->input->post('Table2'), $this->input->post('Keyword'), $this->input->post('Order'));
  }

  public function GetAll()
  {
    echo $this->management_model->GetAll($this->input->post('Table'), $this->input->post('Keyword'), $this->input->post('Order'));
  }

  public function Recover()
  {
    echo $this->management_model->Recover($this->input->post('Table'), $this->input->post('Id'));
  }

  public function Delete()
  {
    echo $this->management_model->Delete($this->input->post('Table'), $this->input->post('Id'));
  }

  public function AddProduct()
  {
    echo $this->management_model->AddProduct($this->input->post());
  }

  public function UploadFile($type, $id)
  {
//    echo json_encode($type);
    echo $this->management_model->UploadFile($type, $id);
  }

}

 ?>
