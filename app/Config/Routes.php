<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
//<<<<<<<! HEAD
$routes->get('/', 'PagesController::index');
$routes->post('page/submitContactUs', 'PagesController::submitContactUs');
//=======
$routes->get('/users', 'Users');
$routes->match(['get', 'post'], '/users/create', 'Users::create');
$routes->match(['get', 'post', 'put'], '/users/(:segment)/update', 'Users::update/$1');
$routes->match(['post', 'delete'], '/users/(:segment)/delete', 'Users::delete/$1');
$routes->get('/users/(:segment)/verification', 'Users::verification/$1');
$routes->match(['get', 'post'], '/login', 'Users::login');
$routes->get('/logout', 'Users::logout');
$routes->get('/api/users', 'Users::list');

$routes->get('/programstudi', 'ProgramStudi');
$routes->match(['get', 'post'], '/programstudi/create', 'ProgramStudi::create');
$routes->match(['get', 'post', 'put'], '/programstudi/(:segment)/update', 'ProgramStudi::update/$1');
$routes->match(['post', 'delete'], '/programstudi/(:segment)/delete', 'ProgramStudi::delete/$1');
$routes->get('/api/programstudi', 'ProgramStudi::list');
$routes->get('/api/programstudi/lookup', 'ProgramStudi::listIdNama');

$routes->post('/transkrip/delete/(:num)', 'TranskripNilaiController::delete/$1');

$routes->get('/api/nilai', 'NilaiController::index');

$routes->match(['get', 'post'], '/transkrip/create', 'Transkrip::create');
$routes->match(['get', 'post', 'put'], '/transkrip/(:segment)/update', 'Transkrip::update/$1');

$routes->get('/kota', 'Kota');
$routes->match(['get', 'post'], '/kota/create', 'Kota::create');
$routes->match(['get', 'post', 'put'], '/kota/(:segment)/update', 'Kota::update/$1');
$routes->match(['post', 'delete'], '/kota/(:segment)/delete', 'Kota::delete/$1');
$routes->get('/api/kota', 'Kota::list');
$routes->get('/api/kota/lookup', 'Kota::lookup');

//>>>>>>> 7306e6abfd699eca2fc570277e1bacea6af3f1e5

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
