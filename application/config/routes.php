<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'IndexController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController/loginAuth';
$route['logout'] = 'LoginController/logout';
$route['catalog'] = 'CatalogController/index';
$route['checkout'] = 'CheckoutController/index';
$route['checkout/add/(:any)'] = 'CheckoutController/addBasketItemQuantity/$1';
$route['checkout/remove/(:any)'] = 'CheckoutController/removeBasketItemQuantity/$1';
$route['checkout/order'] = 'CheckoutController/checkoutBasket';
$route['profile'] = 'ProfileController/index';
$route['profile/update'] = 'ProfileController/index/$1';
$route['profile/submit'] = 'ProfileController/setProfileUpdate';
