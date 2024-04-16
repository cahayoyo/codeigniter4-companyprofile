<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// route admin dashboard
$routes->get('/dashboard', 'Admin\DashboardController::index');

// route admin product
$routes->get('/daftar-product', 'Admin\ProductController::index');
