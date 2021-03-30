<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['venues/rating'] = 'venues/rating';
$route['venues/updateRating'] = 'venues/updateRating';

$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/forget'] = 'users/forget';
$route['users/profile'] = 'users/profile';

$route['admins/login'] = 'admins/login';
$route['admins/users'] = 'admins/users';
$route['admins/venues'] = 'admins/venues';
$route['admins/bookings'] = 'admins/bookings';

$route['lobbies/create/(:any)'] = 'lobbies/create/$1';
$route['lobbies/index'] = 'lobbies/index';
$route['lobbies'] = 'lobbies/index';

$route['bookings/uploadBuktiPembayaran/(:any)'] = 'bookings/uploadBuktiPembayaran/$1';
$route['bookings/index'] = 'bookings/index';
$route['bookings'] = 'bookings/index';

$route['venues/confirmBook/(:any)'] = 'venues/confirmBook/$1';
$route['venues/jadwal/(:any)'] = 'venues/jadwal/$1';
$route['venues/index'] = 'venues/index';
$route['venues/(:any)'] = 'venues/view/$1';
$route['venues'] = 'venues/index';

$route['users/register'] = 'users/register';

$route['default_controller'] = 'pages/view';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
