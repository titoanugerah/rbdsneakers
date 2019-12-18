<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Controller are open for any users
 */
class General extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    error_reporting(1);
  }

  public function index()
  {
//    $this->load->view('general/home');
    $this->login();
  }

  public function login()
  {
    require_once 'vendor/autoload.php';
  //  $redirect_uri = 'https://google.com';
    $client = new Google_Client();
    $client->setAuthConfig('assets/client_credentials.json');
    //$client->setRedirectUri($redirect_uri);
    $client->addScope("email");
    $client->addScope("profile");

    if (isset($_GET['code']))
    {
//      var_dump(isset($_GET['code']));die;
      $token = $client->fetchAccessTokenWithAuthCode($this->input->get('code'));
      $client->setAccessToken($token['access_token']);

      $google_oauth = new Google_Service_Oauth2($client);
      $google_account_info = $google_oauth->userinfo->get();
      $email = $google_account_info->email;
      $name = $google_account_info->name;
      echo $name.' -- '.$email;
    }
    else
    {
      echo '<a href="'.$client->createAuthUrl().'">Google Login </a>';
    }
  }
}


 ?>
