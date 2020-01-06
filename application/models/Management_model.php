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

  public function ContentCategoryMangement($keyword)
  {
    // if ($keyword!=null)
    // {
    //   $data['category'] = $this->core_model->GetSearchData('Category', $keyword, 0);
    // }
    // else
    // {
    //   $data['category'] = $this->core_model->GetAllData('Category', 0);
    // }
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'CategoryManagement';
    return $data;
  }

  public function ContentProductManagement()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'ProductManagement';
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

  public function UpdateAccountManagement($id, $privilleges)
  {
    if ($this->session->userdata['AccountManagement'])
    {
      $this->db->query('CALL UpdateAccountManagement('.$id.','.$privilleges.')');
      $data['title'] = 'Berhasil';
      $data['type'] = 'success';
      $data['message'] = 'Update berhasil akun berhasil dilakukan';
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
    }

    return json_encode($data);
  }

  public function AddAccountManagement($email, $privilleges)
  {
    if ($this->session->userdata['AccountManagement'])
    {
      $operation = ($this->db->query('CALL AddAccountManagement("'.$email.'",'.$privilleges.')'))->row();
      $data['title'] = $operation->Title;
      $data['type'] = $operation->Status;
      $data['message'] = $operation->Message;
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
    }
    return json_encode($data);
  }

  public function GetCategory($keyword)
  {
    if ($keyword!=null && $keyword!='')
    {
      $data['category'] = $this->core_model->GetSearchData('Category', $keyword, 0);
    }
    else
    {
      $data['category'] = $this->core_model->GetAllData('Category', 0);
    }
    return json_encode($data);
  }

  public function GetDetailCategory($id)
  {
    $data['detail'] = $this->core_model->GetSingleData('Category', 'Id', $id);
    $data['product'] = $this->core_model->GetSomeData('Product', 'CategoryId', $id);
    return json_encode($data);
  }

  public function UpdateCategory($id, $name, $description)
  {
    if ($this->session->userdata['StockManagement'])
    {
      $this->db->query('CALL UpdateCategory('.$id.',"'.$name.'","'.$description.'")');
      $data['title'] = 'Berhasil';
      $data['type'] = 'success';
      $data['message'] = 'Update kategori berhasil dilakukan';
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
    }
    return json_encode($data);
  }

  public function DeleteCategory($id, $email)
  {
    if ($this->session->userdata['StockManagement'] && $this->session->userdata['Email']==$email)
    {
      $this->db->query('CALL DeleteCategory('.$id.')');
      $data['title'] = 'Berhasil';
      $data['type'] = 'success';
      $data['message'] = 'Proses hapus kategori berhasil dilakukan';
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini atau email yang anda masukan salah';
    }
    return json_encode($data);
  }

  public function RecoverCategory($id)
  {
    if ($this->session->userdata['StockManagement'])
    {
      $this->db->query('CALL RecoverCategory('.$id.')');
      $data['title'] = 'Berhasil';
      $data['type'] = 'success';
      $data['message'] = 'Proses pemulihan kategori berhasil dilakukan';
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini atau email yang anda masukan salah';
    }
    return json_encode($data);
  }

}


 ?>
