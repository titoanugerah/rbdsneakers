<?php

/**
 * General Model are open for all
 */
class General_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  //CORE


  //APPLICATION
  public function ContentHome()
  {
    $data['account'] = $this->account();
    $data['webConf'] = $this->db->query('CALL GetWebConf()')->row();
    return $data;
  }

  public function Account()
  {
    if ((!isset($this->session->userdata['login'])) || ((!isset($this->session->userdata['login'])) && (!$this->session->userdata['login'])))
    {
      require_once 'vendor/autoload.php';
      $client = new Google_Client();
      $client->setAuthConfig('assets/client_credentials.json');
      $client->addScope("email");
      $client->addScope("profile");
      if (isset($_GET['code']))
      {
        $token = $client->fetchAccessTokenWithAuthCode($this->input->get('code'));
        $client->setAccessToken($token['access_token']);
        $user = (new Google_Service_Oauth2($client))->userinfo->get();
        
      }
      else
      {
        $this->session->set_userdata('link', $client->createAuthUrl());
      }
    }
  }

}

 ?>
