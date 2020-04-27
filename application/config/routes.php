<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['admin'] = 'admins/login';


$route['home/(:any)'] = 'cars/carinfo/$1';
$route['home'] = 'cars/home';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
