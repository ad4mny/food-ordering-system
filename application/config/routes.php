<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['table/remove/(:num)'] = 'BookTableController/removeTableBooking/$1';

$route['vendor/(:any)'] = 'VendorController/index/$1';
$route['vendor/orders/ready/(:any)'] = 'VendorController/setOrderReady/$1';
$route['vendor/orders/delete/(:any)'] = 'VendorController/setOrderDelete/$1';
$route['vendor/catalogs/add'] = 'VendorController/setNewMenu';
$route['vendor/catalogs/update/(:any)'] = 'VendorController/index/update/$1';
$route['vendor/catalogs/update'] = 'VendorController/setCatalogUpdate';
$route['vendor/catalogs/delete/(:any)'] = 'VendorController/setCatalogDelete/$1';

$route['admin/(:any)'] = 'AdminController/index/$1';
$route['admin/vendor/approve/(:num)'] = 'AdminController/setVendorApprove/$1';
$route['admin/vendor/delete/(:num)'] = 'AdminController/setVendorDelete/$1';
$route['admin/table/add/submit'] = 'AdminController/setTableAdd';
$route['admin/table/delete/(:num)'] = 'AdminController/setTableDelete/$1';

// API Module 
$route['api/get_catalog'] = 'CatalogController/getAllMenuAPI';
$route['api/get_login'] = 'LoginController/loginAuthAPI';
$route['api/get_signup'] = 'LoginController/createUserAccountAPI';
$route['api/get_profile'] = 'ProfileController/getProfileAPI';
$route['api/get_order_history'] = 'ProfileController/getOrderHistoryAPI';
$route['api/get_order'] = 'CheckoutController/getAllActiveOrdersAPI';
$route['api/get_order_basket'] = 'CheckoutController/getAllBasketItemDetailsAPI';
$route['api/set_checkout_order'] = 'CheckoutController/checkoutBasketAPI';
$route['api/set_pay'] = 'CheckoutController/setPayAPI';
