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

  public function ContentAccountManagement()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'AccountManagement';
    return $data;
  }

  public function ContentCategoryMangement()
  {
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
  //deprecated
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

  //will deprecated
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


  //will be deprecated
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


  //will deprecated
  public function GetProduct($keyword, $order)
  {
    if ($keyword!=null && $keyword!='')
    {
      $data['product'] = $this->core_model->GetSearchData('Product', $keyword, $order);
    }
    else
    {
      $data['product'] = $this->core_model->GetAllData('Product', $order);
    }
    return json_encode($data);
  }

  public function GetAll2($table1, $table2, $keyword, $order)
  {
    if ($this->session->userdata['Role']=='Management')
    {
      if ($keyword!=null && $keyword!='')
      {
        $data[strtolower($table1)] = $this->core_model->GetSearchData($table1, $keyword, $order);
        $data[strtolower($table2)] = $this->core_model->GetSearchData($table2, $keyword, $order);
      }
      else
      {
        $data[strtolower($table2)] = $this->core_model->GetAllData($table2, $order);
        $data[strtolower($table1)] = $this->core_model->GetAllData($table1, $order);
      }
      return json_encode($data);
    }
  }


  public function GetAll($table, $keyword, $order)
  {
    if ($this->session->userdata['Role']=='Management')
    {
      if ($keyword!=null && $keyword!='')
      {
        $data[strtolower($table)] = $this->core_model->GetSearchData($table, $keyword, $order);
      }
      else
      {
        $data[strtolower($table)] = $this->core_model->GetAllData($table, $order);
      }
      return json_encode($data);
    }
  }

  public function Recover($table, $id)
  {
    if ((($table=='Category'|| $table=='Product') && $this->session->userdata['StockManagement']) || ($table=='Management' && $this->session->userdata['AccountManagement']))
    {
      $this->db->query('CALL DeleteOrRecover'.$table.'('.$id.',1)');
      $data['title'] = 'Berhasil';
      $data['type'] = 'success';
      $data['message'] = 'Proses pemulihan data berhasil dilakukan';
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
    }
    return json_encode($data);
  }

  public function Delete($table, $id)
  {
    if ((($table=='Category'|| $table=='Product') && $this->session->userdata['StockManagement']) || ($table=='Management' && $this->session->userdata['AccountManagement']))
    {
      $this->db->query('CALL DeleteOrRecover'.$table.'('.$id.',0)');
      $data['title'] = 'Berhasil';
      $data['type'] = 'success';
      $data['message'] = 'Proses penghapusan data berhasil dilakukan';
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
    }
    return json_encode($data);
  }

  public function AddProduct($entry)
  {
    if ($this->session->userdata['StockManagement'])     {
      $query = $this->db->query('CALL AddProduct("'.$entry['Name'].'","'.$entry['Description'].'",'.$entry['CategoryId'].','.$entry['Price'].','.$this->session->userdata['Id'].')');
      $data['id'] = $query->row('Id');
      $data['title'] = 'Berhasil';
      $data['type'] = 'success';
      $data['message'] = 'Proses penambahan produk berhasil dilakukan';
    }
    else
    {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
    }
    return json_encode($data);

  }

  public function uploadFile($type,$id)
  {
    $filename = $type.'_'.$id;
    $config['upload_path'] = APPPATH.'../assets/picture/';
    $config['overwrite'] = TRUE;
    $config['file_name']     =  str_replace(' ','_',$filename);
    $config['allowed_types'] = 'jpg|png|jpeg';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('file')) {
      $upload['status']= 'danger';
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']= 'success';
      $upload['message'] = "File berhasil di upload";
      $upload['ext'] = $this->upload->data('file_ext');
      $this->core_model->updateData($type, 'id', $id, 'Image', $filename.$upload['ext']);
    }
    return json_encode($upload);
  }

  public function ContentDetailProduct($id)
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'DetailProduct';
    $data['id'] = $id;
    return $data;
  }

  public function GetDetail($input)
  {
    $data['detail'] = $this->core_model->GetSingleData($input['Table'], $input['Variable'], $input['Value']);
    if ($input['Table']=='Product') {
      $data['variant'] = $this->core_model->GetSomeData('Variant', 'ProductId', $input['Value']);
//      $data['review'] = $this->core_model->GetSomeData('Review', 'ProductId', $input['Id']);
    }
    return json_encode($data);
  }

}


 ?>
