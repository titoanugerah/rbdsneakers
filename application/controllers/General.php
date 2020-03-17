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
    $this->load->model('general_model');
    error_reporting(1);
  }

  public function Index()
  {
    $this->load->view('General/Template', $this->general_model->ContentHome());
  }

  public function About()
  {
    $this->load->view('General/Template', $this->general_model->ContentAbout());
  }

  public function Contact()
  {
    $this->load->view('General/Template', $this->general_model->ContentContact());
  }

  public function Logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}

 ?>
