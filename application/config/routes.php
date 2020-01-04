<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'general/Index';
$route['home'] = 'general/Index';
$route['logout'] = 'general/Logout';

#MANAGEMENT
$route['profile'] = 'management/Profile';
$route['dashboard'] = 'management/Dashboard';
$route['accountManagement/(:any)'] = 'management/AccountManagement/$1';
$route['accountManagement'] = 'management/AccountManagement/0';
$route['categoryManagement'] = 'management/CategoryManagement';

#Ajax
$route['getDetailCustomer'] = 'management/GetDetailCustomer';
$route['getDetailManagement'] = 'management/GetDetailManagement';
$route['updateAccountManagement'] = 'management/UpdateAccountManagement';
$route['addAccountManagement'] = 'management/AddAccountManagement';
$route['getDetailCategory'] = 'management/GetDetailCategory';
$route['updateCategory'] = 'management/UpdateCategory';

#SYSTEM
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
