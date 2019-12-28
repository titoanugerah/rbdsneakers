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
    error_reporting(1);
  }

  public function dashboard()
  {
    $this->load->view('management/template');
  }
}

 ?>
