<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about'] = 'welcome/about';
$route['contact'] = 'welcome/contact';

$route['index'] = 'index';