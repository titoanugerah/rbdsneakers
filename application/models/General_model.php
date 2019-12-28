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
    $data['account'] = $this->account();
    return $data;
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
          'AccountManagement' => substr(decbin($user->Privilleges),1,1)
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
