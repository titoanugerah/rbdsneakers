<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Model are open for all
 */
class General_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('core_model');
  }

  //APPLICATION
  public function ContentHome()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['Category'] = $this->core_model->GetAllData('Category',0);
    $data['account'] = $this->account();
    $data['view'] = 'Home';
    return $data;
  }

  public function ContentAbout()
  {
    $data['about'] = $this->core_model->GetAllData('About', 0);
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['Category'] = $this->core_model->GetAllData('Category',0);
    $data['account'] = $this->account();
    $data['view'] = 'About';
    return $data;
  }

  public function ContentContact()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['Category'] = $this->core_model->GetAllData('Category',0);
    $data['account'] = $this->account();
    $data['view'] = 'Contact';
    return $data;
  }

  public function ContentShop()
  {
    $data['webConf'] = $this->core_model->GetWebConf();
    $data['Category'] = $this->core_model->GetAllData('Category',0);
    $data['account'] = $this->account();
    $data['view'] = 'Shop';
    return $data;
  }

  public function GetProduct($input)
  {
    $result = $this->db->query('CALL GetProduct('.$input['CategoryId'].',"'.$input['Keyword'].'",'.$input['Count'].')');
    return json_encode($result->result());
  }

  public function GetSizeVariant()
  {
    $data = ($this->db->query('Select a.Size, (sum(a.Stock) - IFNULL(sum(b.Qty), 0)) as Stock from Stock as a left join DetailOrder as b on ( a.VariantId = b.VariantId and a.Size = b.Size) where a.VariantId = '.$this->input->post('Id').' group by a.Size'))->result();
    return json_encode($data);
  }

  public function GetDetailProduct($input)
  {
    $result['detail'] = $this->core_model->GetSingleData('Product','Id', $input['Id']);
    $result['variant'] = $this->core_model->GetSomeData('Variant', 'ProductId', $input['Id']);
    $result['order'] = ($this->db->query('SELECT COUNT(Id) AS Sold, IFNULL((SUM(Rating)/COUNT(Id)), 0) AS Rating FROM DetailOrder WHERE ProductId='.$input['Id']))->row();
    return json_encode($result);
  }

  public function Account()
  {
    if ((!isset($this->session->userdata['isLogin'])) || ((!isset($this->session->userdata['isLogin'])) && (!$this->session->userdata['isLogin'])))
    {
      $user['status'] = 0;
       require_once 'vendor/autoload.php';
       $client = new Google_Client();
       $client->setAuthConfig('assets/client_credentials.json');
       $client->addScope("email");
       $client->addScope("profile");
       if (isset($_GET['code']))
       {
         $token = $client->fetchAccessTokenWithAuthCode($this->input->get('code'));
         $client->setAccessToken($token['access_token']);
         $validUser = (new Google_Service_Oauth2($client))->userinfo->get();
         $user = $this->db->query('CALL GetAccount("'.$validUser->email.'","'.$validUser->name.'","'.$validUser->picture.'")')->row();
        $userdata = array(
          'isLogin' => true,
          'Role' => $user->Role,
          'Id' => $user->Id,
          'Fullname' => $user->Fullname,
          'Image' => $user->Image,
          'Email' => $user->Email,
          'Phone' => $user->Phone,
          'Privilleges' => $user->Privilleges,
          'Customer' => substr(decbin($user->Privilleges),0,1),
          'AccountManagement' => substr(decbin($user->Privilleges),1,1),
          'StockManagement' => substr(decbin($user->Privilleges),2,1),
          'SalesManagement' => substr(decbin($user->Privilleges),3,1),
         );
         $this->session->set_userdata($userdata);
      }
      else
      {
        $this->session->set_flashdata('link', $client->createAuthUrl());
      }
    }
  }

  public function DeleteFromCart()
  {
    return json_encode($this->core_model->DeleteData('Cart', 'Id', $this->input->post('Id')));
  }

  public function GetCart(){
    $result = $this->db->query('CALL GetCart('.$this->session->userdata('Id').')');
    return json_encode($result->result());
    // return json_encode($this->core_model->GetSingleData('Cart', 'CustomerId', $this->session->userdata('Id')));
  }

  public function Checkout()
  {
    $webconf = $this->core_model->GetWebConf();
    $input = $this->input->post();
    $orders = "";
    $subtotal = 0;
    $result = ($this->db->query('CALL Checkout('.$this->session->userdata('Id').',"'.$input['CustomerName'].'","'.$input['CustomerPhone'].'","'.$input['DeliveryAddress'].'")'))->result();
    foreach($result as $item){
      $orders = $orders." ".$item->Product." - ".$item->Model." ".$item->Color."( ukuran".$item->Size." ) \n";
      $subtotal = $subtotal + $item->Total;
    }
    // $content = "
    // Bersamaan dengan email ini kami sampaikan bahwa pesanan kamu di keranjang sudah berhasil checkout, antara lain : \n
    // ".$orders." \n
    // selanjutnya, silahkan lakukan pembayaran sebanyak Rp. ".$subtotal." ke rekening ".$webconf->bank_name." ".$webconf->bank_account." A/N s".$webconf->bank_user;
    //$this->core_model->SentEmail($this->session->userdata('Email'),$this->session->userdata('Fullname'),"Pembayaran pembelian sepatu", $content, $webconf);
    $content = "Herewith i've shared to you list of car arrangement that request by us. please click link ".base_url('downloadRequest/'.$request->location_id.'/'.$request->date)." to access the file and confirm by reply this email"; 
    $this->core_model->sentEmail($this->session->userdata('Email'),$this->session->userdata('Fullname'), "PIC Car Arrangement".$request->location, "OCHA", $content, $account);
    return json_encode($subtotal);
    
  }

  public function AddToCart()
  {
    $input = $this->input->post();
    $input['CustomerId'] = $this->session->userdata('Id'); 
    try {
      $this->core_model->InsertData('Cart', $input);
      return http_response_code(200);
    } catch (Exception $error) {
      return http_response_code(500);
    }
  }

}

 ?>
