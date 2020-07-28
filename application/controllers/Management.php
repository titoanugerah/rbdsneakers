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
    $this->load->view('Management/Template', $this->management_model->ContentAccountManagement());
  }

  public function CategoryManagement()
  {
    $this->load->view('Management/Template', $this->management_model->ContentCategoryMangement());
  }

  public function ProductManagement()
  {
    $this->load->view('Management/Template', $this->management_model->ContentProductManagement());
  }

  public function DetailProduct($id)
  {
    $this->load->view('Management/Template', $this->management_model->ContentDetailProduct($id));
  }

  public function UpdateProduct()
  {
    echo json_encode($this->management_model->UpdateProduct($this->input->post()));
  }

  public function WebManagement()
  {
    $this->load->view('Management/Template', $this->management_model->ContentWebManagement());
  }

  public function GetWebConf()
  {
    echo $this->management_model->GetWebConf();
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

  public function AddCategory()
  {
    echo $this->management_model->AddCategory($this->input->post());
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
    echo $this->management_model->UploadFile($type, $id);
  }

  public function GetDetail()
  {
    echo $this->management_model->GetDetail($this->input->post());
  }

  public function AddVariant()
  {
    echo $this->management_model->AddVariant($this->input->post());
  }

  public function AddSize()
  {
    echo $this->management_model->AddSize($this->input->post());
  }

  public function AddStock()
  {
    echo $this->management_model->AddStock($this->input->post());
  }

  public function UpdateWebConf()
  {
    echo $this->management_model->UpdateWebConf($this->input->post());
  }

  public function UpdateVariant()
  {
    echo $this->management_model->UpdateVariant($this->input->post());
  }

  public function AddAbout()
  {
    echo $this->management_model->AddAbout($this->input->post());
  }

  public function UpdateAbout()
  {
    echo $this->management_model->UpdateAbout($this->input->post());
  }

}

 ?>
