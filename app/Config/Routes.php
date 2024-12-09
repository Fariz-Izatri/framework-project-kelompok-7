<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pegawai', 'PegawaiController::index');
$routes->get('/pegawai/create', 'PegawaiController::create');
$routes->post('/pegawai/store', 'PegawaiController::store');
$routes->get('/pegawai/edit/(:num)', 'PegawaiController::edit/$1');
$routes->put('/pegawai/update/(:num)', 'PegawaiController::update/$1');
$routes->get('/pegawai/delete/(:num)', 'PegawaiController::delete/$1');

