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

}

 ?>
