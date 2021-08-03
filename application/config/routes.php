<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'IndexController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController/loginAuth';
$route['logout'] = 'LoginController/logout';
$route['signup'] = 'LoginController/createUserAccount';
$route['catalog'] = 'CatalogController/index';
$route['checkout'] = 'CheckoutController/index';
$route['checkout/add/(:any)'] = 'CheckoutController/addBasketItemQuantity/$1';
$route['checkout/remove/(:any)'] = 'CheckoutController/removeBasketItemQuantity/$1';
$route['checkout/order'] = 'CheckoutController/checkoutBasket';
$route['profile'] = 'ProfileController/index';
$route['profile/(:any)'] = 'ProfileController/index/$1';
$route['profile/update/submit'] = 'ProfileController/setProfileUpdate';
$route['table'] = 'BookTableController/index';
$route['table/book/(:num)'] = 'BookTableController/setTableBooking/$1';

$route['vendor/(:any)'] = 'VendorController/index/$1';
$route['vendor/orders/ready/(:any)'] = 'VendorController/setOrderReady/$1';
$route['vendor/orders/delete/(:any)'] = 'VendorController/setOrderDelete/$1';
$route['vendor/catalogs/add'] = 'VendorController/setNewMenu';
$route['vendor/catalogs/update/(:any)'] = 'VendorController/index/update/$1';
$route['vendor/catalogs/update'] = 'VendorController/setCatalogUpdate';
$route['vendor/catalogs/delete/(:any)'] = 'VendorController/setCatalogDelete/$1';
