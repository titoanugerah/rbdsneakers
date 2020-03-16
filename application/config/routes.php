<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'general/Index';
$route['home'] = 'general/Index';
$route['logout'] = 'general/Logout';
$route['about'] = 'general/About';
$route['contact'] = 'general/Contact';


#MANAGEMENT
$route['profile'] = 'management/Profile';
$route['dashboard'] = 'management/Dashboard';
$route['accountManagement/(:any)'] = 'management/AccountManagement/$1';
$route['accountManagement'] = 'management/AccountManagement/0';
$route['categoryManagement'] = 'management/CategoryManagement';
$route['productManagement'] = 'management/ProductManagement';
$route['webManagement'] = 'management/WebManagement';


#Ajax
$route['(:any)/getAll'] = 'management/GetAll';
$route['getAll'] = 'management/GetAll';
$route['(:any)/getAll2'] = 'management/GetAll2';
$route['getAll2'] = 'management/GetAll2';
$route['(:any)/delete'] = 'management/Delete';
$route['delete'] = 'management/Delete';
$route['(:any)/recover'] = 'management/Recover';
$route['recover'] = 'management/Recover';
$route['(:any)/getDetail'] = 'management/GetDetail';
$route['getDetail'] = 'management/GetDetail';

//account
$route['getAccount'] = 'management/GetAccount';
$route['getDetailCustomer'] = 'management/GetDetailCustomer';
$route['getDetailManagement'] = 'management/GetDetailManagement';
$route['addAccountManagement'] = 'management/AddAccountManagement';
$route['updateAccountManagement'] = 'management/UpdateAccountManagement';


//category
$route['addCategory'] = 'management/AddCategory';
$route['getDetailCategory'] = 'management/GetDetailCategory';
$route['updateCategory'] = 'management/UpdateCategory';

//product
$route['addProduct'] = 'management/AddProduct';
$route['addVariant'] = 'management/AddVariant';
$route['addSize'] = 'management/AddSize';
$route['addStock'] = 'management/AddStock';
$route['updateVariant'] = 'management/UpdateVariant';
$route['uploadFile/(:any)/(:any)'] = 'management/UploadFile/$1/$2';
$route['detailProduct/addVariant'] = 'management/AddVariant';
$route['detailProduct/addSize'] = 'management/AddSize';
$route['detailProduct/addStock'] = 'management/AddStock';
$route['detailProduct/updateVariant'] = 'management/UpdateVariant';
$route['(:any)/detailProduct/addVariant'] = 'management/AddVariant';
$route['(:any)/detailProduct/addSize'] = 'management/AddSize';
$route['(:any)/detailProduct/addStock'] = 'management/AddStock';
$route['(:any)/detailProduct/updateVariant'] = 'management/UpdateVariant';
$route['detailProduct/(:any)'] =  'management/DetailProduct/$1';
$route['(:any)/uploadFile/(:any)/(:any)'] = 'management/UploadFile/$2/$3';
$route['(:any)/(:any)/detailProduct/addVariant'] = 'management/AddVariant';
$route['(:any)/(:any)/detailProduct/addStock'] = 'management/AddStock';
$route['(:any)/(:any)/detailProduct/updateVariant'] = 'management/UpdateVariant';


//WEBCONF
$route['updateWebConf'] = 'management/UpdateWebConf';
$route['addAbout'] = 'management/AddAbout';
$route['updateAbout'] = 'management/UpdateAbout';
#SYSTEM
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
