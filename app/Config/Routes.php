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
$routes->get('/daftar-product/tambah', 'Admin\ProductController::form_create');
$routes->post('/daftar-product/create-product', 'Admin\ProductController::create_product');

// route admin kategori product
$routes->get('/daftar-kategori', 'Admin\ProductController::kategori');
$routes->post('/daftar-kategori/tambah', 'Admin\ProductController::store');
$routes->put('/daftar-kategori/ubah/(:num)', 'Admin\ProductController::update/$1');
$routes->delete('/daftar-kategori/hapus/(:num)', 'Admin\ProductController::destroy/$1');
