<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['signin'] = 'main/signin_page';
$route['reg_page'] = 'main/reg_page';
$route['dashboard'] = 'users/dashboard';
$route['new_user'] = 'users/new_user';
$route['users/edit'] = 'users/edit_profile';
$route['users/edit/(:any)'] = 'users/edit_user/$1';
$route['edit_user_info/(:any)'] = 'users/edit_user_info/$1';
$route['users/remove/(:any)'] = 'users/remove_conf/$1';
$route['destroy/(:any)'] = 'users/destroy_user/$1';
$route['show/(:any)'] = 'messages/show/$1';
$route['message/add/(:any)/(:any)'] = 'messages/add/$1/$2';
$route['comment/add/(:any)/(:any)/(:any)'] = 'messages/add_comment/$1/$2/$3';
