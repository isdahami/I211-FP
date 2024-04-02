<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profile', 'ProfileController::index');
$routes->get('/vinyls', 'VinylsController::index');
$routes->get('/home/vinylDetails/(:num)', 'VinylsController::vinylDetails/$1');


service('auth')->routes($routes);
