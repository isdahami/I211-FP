<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/vinyls', 'VinylsController::index');
$routes->get('/cart', 'CartController::index');
$routes->get('/admin', 'AdminController::addNew'); 
$routes->post('/admin/saveNew', 'AdminController::saveNew'); 
$routes->get('/vinyls/vinylDetails/(:num)', 'VinylsController::vinylDetails/$1');
$routes->post('/search', 'SearchController::index');

service('auth')->routes($routes);
