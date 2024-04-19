<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/vinyls', 'VinylsController::index');
$routes->post('/vinyls', 'VinylsController::index');
$routes->get('/cart', 'CartController::index');
$routes->post('/cart/addItem', 'CartController::addItem'); 
$routes->post('/cart/update', 'CartController::updateItem'); 
$routes->post('/cart/remove', 'CartController::removeItem');
$routes->get('/cart/checkout', 'CartController::checkout');
$routes->get('/admin', 'AdminController::addNew'); 
$routes->post('/admin/saveNew', 'AdminController::saveNew'); 
$routes->get('/vinyls/vinylDetails/(:num)', 'VinylsController::vinylDetails/$1');
$routes->post('/search', 'SearchController::index');
$routes->get('/search/suggest', 'SearchController::suggest');


service('auth')->routes($routes);
