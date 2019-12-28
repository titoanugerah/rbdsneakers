<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'general/Index';
$route['profile'] = 'management/Profile';
$route['logout'] = 'general/Logout';
$route['dashboard'] = 'management/Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
