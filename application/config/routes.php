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
$route['productManagement'] = 'management/ProductManagement';

#Ajax
$route['getAll'] = 'management/GetAll';
$route['getAll2'] = 'management/GetAll2';
$route['delete'] = 'management/Delete';
$route['recover'] = 'management/Recover';

$route['getAccount'] = 'management/GetAccount';
$route['getDetailCustomer'] = 'management/GetDetailCustomer';
$route['getDetailManagement'] = 'management/GetDetailManagement';
$route['addAccountManagement'] = 'management/AddAccountManagement';
$route['updateAccountManagement'] = 'management/UpdateAccountManagement';


//category
$route['getDetailCategory'] = 'management/GetDetailCategory';
#DEPRECATED $route['getCategory'] = 'management/GetCategory';
$route['updateCategory'] = 'management/UpdateCategory';
$route['deleteCategory'] = 'management/DeleteCategory';
$route['recoverCategory'] = 'management/RecoverCategory';

//product
$route['getProduct'] = 'management/GetProduct';

#SYSTEM
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
