<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/product', 'Home::produk');
$routes->post('/product', 'Home::produk');
$routes->get('/promotion', 'Home::promosi');
$routes->get('/rating', 'Home::penilaian');
$routes->get('/profile', 'Home::profil');
$routes->get('/product/(:num)', 'Home::show/$1');
$routes->post('/komen/(:num)', 'Home::comment/$1');

$routes->get('/login', 'User::index');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');
$routes->delete('/produk/foto/(:num)', 'Produk::deleteFoto/$1');
$routes->delete('/produk/c/(:num)', 'Produk::deleteComment/$1');
$routes->delete('/kategori/(:num)', 'Kategori::delete/$1');
$routes->get('/produk/(:num)', 'Produk::show/$1');
$routes->get('/produk/e/(:num)', 'Produk::edit/$1');
$routes->get('/produk/c/(:num)', 'Produk::comments/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
