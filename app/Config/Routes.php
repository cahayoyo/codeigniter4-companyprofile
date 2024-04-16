<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\DashboardController::index');

// route admin dashboard
$routes->get('/dashboard', 'Admin\DashboardController::index');

// route admin product
$routes->get('/daftar-product', 'Admin\ProductController::index');

// route admin kategori product
$routes->get('/daftar-kategori', 'Admin\ProductController::kategori');
$routes->post('/daftar-kategori/tambah', 'Admin\ProductController::store');
$routes->post('/daftar-kategori/ubah/(:num)', 'Admin\ProductController::update/$1');
$routes->post('/daftar-kategori/hapus/(:num)', 'Admin\ProductController::destroy/$1');
