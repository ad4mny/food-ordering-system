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
$route['profile/update'] = 'ProfileController/index/$1';
$route['profile/submit'] = 'ProfileController/setProfileUpdate';
$route['table'] = 'BookTableController/index';
$route['table/book'] = 'BookTableController/setTableBooking';

$route['vendor/(:any)'] = 'vendor/VendorController/index/$1';
$route['vendor/orders/ready/(:any)'] = 'vendor/VendorController/setOrderReady/$1';
$route['vendor/orders/delete/(:any)'] = 'vendor/VendorController/setOrderDelete/$1';
$route['vendor/catalogs/add'] = 'vendor/VendorController/setNewMenu';
$route['vendor/catalogs/update/(:any)'] = 'vendor/VendorController/index/update/$1';
$route['vendor/catalogs/update'] = 'vendor/VendorController/setCatalogUpdate';
$route['vendor/catalogs/delete/(:any)'] = 'vendor/VendorController/setCatalogDelete/$1';
