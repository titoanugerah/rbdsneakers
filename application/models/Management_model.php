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

  public function ContentOrderManagement()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'OrderManagement';
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

  public function ContentWebManagement()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['viewName'] = 'WebManagement';
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
      $data = ($this->db->query('CALL AddAccountManagement("'.$email.'",'.$privilleges.')'))->row();
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

  public function AddCategory($input)
  {
    if ($this->session->userdata['StockManagement'])
    {
      $query = $this->db->query('CALL AddCategory("'.$input['Name'].'","'.$input['Description'].'",'.$this->session->userdata['Id'].')');
      $data['Id'] = $query->row('Id');
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

  public function GetDetailOrder()
  {
    return json_encode($this->core_model->GetAllData('ViewDetailOrder1',0));
  }

  public function GetSalesReport()
  {
    return json_encode($this->core_model->GetAllData('sumary_profit',0));
  }

  public function updateProduct($input)
  {
    $this->core_model->UpdateDataBatch('Product', 'Id', $input['Id'], $input);
    $data['title'] = 'Berhasil';
    $data['type'] = 'success';
    $data['message'] = 'Update produk berhasil dilakukan';
    return $data; 
  }

  public function ConfirmPayment()
  {
    $this->db->where(array('Id' => $this->input->post('Id')));
    $this->db->update('Order', array('Status' => 1));
    $webconf = $this->core_model->GetWebConf();
    $query = $this->db->query('Select b.Email, b.Fullname from `Order` as a, `Customer` as b where a.Id='.$this->input->post('Id').' and a.CustomerId=b.Id');
    $content = "
    Bersamaan dengan email ini kami sampaikan bahwa pembayaran kamu sudah dikonfirmasi, silahkan akses ".base_url('invoice/'.$this->input->post('Id'))." untuk melihat invoice";
    $this->core_model->SentEmail($query->row('Email'),$query->row('Fullname'),"Pesanan anda diproses", $content, $webconf);
    return json_encode('OK');
  }

  public function ConfirmDelivery()
  {
    $this->db->where(array('Id' => $this->input->post('Id')));
    $this->db->update('Order', array('AWB' => $this->input->post('AWB'),'Status' => 2));
    $webconf = $this->core_model->GetWebConf();
    $query = $this->db->query('Select b.Email, b.Fullname from `Order` as a, `Customer` as b where a.Id='.$this->input->post('Id').' and a.CustomerId=b.Id');
    $content = "
    Bersamaan dengan email ini kami sampaikan bahwa pesanan kamu sudah dikirimkan dengan nomor AWB ".$this->input->post('AWB');
    $this->core_model->SentEmail($query->row('Email'),$query->row('Fullname'),"Pesanan anda sudah dikirim", $content, $webconf);

    return json_encode('OK');

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
    if ((($table=='Category'|| $table=='Product' || $table=='Variant') && $this->session->userdata['StockManagement']) || ($table=='Management' && $this->session->userdata['AccountManagement']))
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
    if ((($table=='Category'|| $table=='Product' || $table=='Variant') && $this->session->userdata['StockManagement']) || ($table=='Management' && $this->session->userdata['AccountManagement']))
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

  public function UploadFile($type,$id)
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
      $upload['filename'] = $filename;
      $this->core_model->UpdateData($type, 'Id', $id, 'Image', $filename.$upload['ext']);
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
    } else if ($input['Table'] == 'Variant') {
      $data['size'] = $this->db->query("SELECT A.Size as Size, Sum(A.Stock) as Stock FROM Stock as A WHERE VariantId = ".$input['Value']." GROUP BY Size")->result();
      $data['stock'] = $this->core_model->GetSomeData('Stock', 'VariantId', $input['Value']);
    } else if($input['Table']== 'WebConf') {
      $data['about'] = $this->core_model->GetAllData('About', 0);

    }
    return json_encode($data);
  }

  public function GetWebConf()
  {
    $data['detail'] = $this->core_model->GetWebConf();
    $data['about'] = $this->core_model->GetAllData('About',0);
    return json_encode($data);     
  }

  public function UpdateWebConf($input)
  {
    if ($this->session->userdata['SalesManagement']){
      try {
         $que = 'CALL UpdateWebConf("'.$input['brand_name'].'","'.$input['brand_slogan'].'","'.$input['office_name'].'","'.$input['office_map'].'","'.$input['office_address'].'","'.$input['office_phone_number'].'","'.$input['host'].'","'.$input['email'].'","'.$input['password'].'","'.$input['port'].'","'.$input['crypto'].'","'.$input['bank_name'].'","'.$input['bank_account'].'","'.$input['bank_user'].'","'.$input['official_facebook_account'].'","'.$input['official_twitter_account'].'","'.$input['official_instagram_account'].'")';
         $query = $this->db->query($que);
         $data['title'] = 'Berhasil';
         $data['type'] = 'success';
         $data['message'] = 'Proses perubahan CMS berhasil dilakukan';
      } catch (Exception $e) {
        $data['title'] = 'Gagal';
        $data['type'] = 'danger';
        $data['message'] = 'Terjadi kesalahan sistem '.$e->getMessage();         
      }
    }
    else
    {
       $data['title'] = 'Gagal';
       $data['type'] = 'danger';
       $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
    }
   return json_encode($data);
  }

  public function AddVariant($input)
  {
     if ($this->session->userdata['StockManagement']){
        $query = $this->db->query('CALL AddVariant('.$input['ProductId'].',"'.$input['Model'].'","'.$input['Color'].'",'.$this->session->userdata['Id'].')');
        $data['id'] = $query->row('Id');
        $data['title'] = 'Berhasil';
        $data['type'] = 'success';
        $data['message'] = 'Proses penambahan varian produk berhasil dilakukan';
     }
     else
     {
        $data['title'] = 'Gagal';
        $data['type'] = 'danger';
        $data['message'] = 'Anda tidak memiliki hak akses untuk aksi ini';
     }
    return json_encode($data);
  }

  public function AddSize($input)
  {
    if (($this->session->userdata['StockManagement'])) {
       $query = $this->db->query('CALL AddSize('.$input['VariantId'].','.$input['Size'].','.$this->session->userdata['Id'].')');
      if ($query->row('Status')==1) {
        $data['title'] = 'Berhasil';
        $data['type'] = 'success';
        $data['message'] = 'Proses penambahan ukuran varian berhasil dilakukan';
      } else {
        $data['title'] = 'Gagal';
        $data['type'] = 'danger';
        $data['message'] = 'Proses penambahan ukuran varian gagal dilakukan, ukuran sudah tersedia';
      }
    } else {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Proses penambahan ukuran varian gagal dilakukan, anda tidak memiliki hak akses';
    }
    return json_encode($data);
  }

  public function AddStock($input)
  {
    if (($this->session->userdata['StockManagement'])) {
       $query = $this->db->query('CALL AddStock('.$input['VariantId'].','.$input['Size'].','.$input['Stock'].','.$this->session->userdata['Id'].')');
      if ($query->row('IsExist')>0) {
        $data['title'] = 'Berhasil';
        $data['type'] = 'success';
        $data['message'] = 'Proses penambahan stok berhasil dilakukan';
      } else {
        $data['title'] = 'Gagal';
        $data['type'] = 'danger';
        $data['message'] = 'Proses penambahan ukuran varian gagal dilakukan, ukuran tidak ada';
      }
    } else {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Proses penambahan ukuran varian gagal dilakukan, anda tidak memiliki hak akses';
    }
    return json_encode($data);
  }

  public function UpdateVariant($input)
  {
    if (($this->session->userdata['StockManagement'])) {
       $query = $this->db->query('CALL UpdateVariant('.$input['VariantId'].',"'.$input['Model'].'","'.$input['Color'].'",'.$this->session->userdata['Id'].')');
       $data['title'] = 'Berhasil';
       $data['type'] = 'success';
       $data['message'] = 'Proses update varian berhasil dilakukan';
    } else {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Proses penambahan ukuran varian gagal dilakukan, anda tidak memiliki hak akses';
    }
    return json_encode($data);
  }

  public function AddAbout($input)
  {
    if (($this->session->userdata['SalesManagement'])) {
      $queries = "CALL AddAbout('".$input['Title']."','".$input['Content']."',".$this->session->userdata['Id'].")";
      $query = $this->db->query($queries);
      $data['id'] = $query->row('Id');
      $data['queries'] = $queries;
       $data['title'] = 'Berhasil';
       $data['type'] = 'success';
       $data['message'] = 'Proses tambah konten berhasil dilakukan';
    } else {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Proses tambah konten gagal dilakukan, anda tidak memiliki hak akses';
    }
    return json_encode($data);
  }

  public function UpdateAbout($input)
  {
    if (($this->session->userdata['SalesManagement'])) {
       $query = $this->db->query("CALL UpdateAbout(".$input["Id"].",'".$input["Title"]."','".$input["Content"]."',".$this->session->userdata["Id"].")");
       $data['id'] = $query->row('Id');
       $data['title'] = 'Berhasil';
       $data['type'] = 'success';
       $data['message'] = 'Proses update konten berhasil dilakukan';
    } else {
      $data['title'] = 'Gagal';
      $data['type'] = 'danger';
      $data['message'] = 'Proses update konten gagal dilakukan, anda tidak memiliki hak akses';
    }
    return json_encode($data);
  }

}


 ?>
