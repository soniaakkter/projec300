<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home/post';
$route['dashboard'] = 'Admin/dashboard';
$route['login'] = 'Admin/login';
$route['post/(:num)'] ='Home/post/$1';
$route['post-details/(:num)'] ='Home/post_details/$1';
$route['category/(:num)'] ='Home/category/$1';
$route['search_news'] = 'Home/search_news';
$route['author/(:num)']  = 'Home/author/$1';
$route['contact'] = 'Home/contact';
$route['about'] = 'Home/about';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
