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

  public function index(){
    $this->load->view('general/home');
  }
}


 ?>
