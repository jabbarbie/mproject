<?php namespace Config;

/**
 * --------------------------------------------------------------------
 * URI Routing
 * --------------------------------------------------------------------
 * This file lets you re-map URI requests to specific controller functions.
 *
 * Typically there is a one-to-one relationship between a URL string
 * and its corresponding controller class/method. The segments in a
 * URL normally follow this pattern:
 *
 *    example.com/class/method/id
 *
 * In some instances, however, you may want to remap this relationship
 * so that a different class/function is called than the one
 * corresponding to the URL.
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 * The RouteCollection object allows you to modify the way that the
 * Router works, by acting as a holder for it's configuration settings.
 * The following methods can be called on the object to modify
 * the default operations.
 *
 *    $routes->defaultNamespace()
 *
 * Modifies the namespace that is added to a controller if it doesn't
 * already have one. By default this is the global namespace (\).
 *
 *    $routes->defaultController()
 *
 * Changes the name of the class used as a controller when the route
 * points to a folder instead of a class.
 *
 *    $routes->defaultMethod()
 *
 * Assigns the method inside the controller that is ran when the
 * Router is unable to determine the appropriate method to run.
 *
 *    $routes->setAutoRoute()
 *
 * Determines whether the Router will attempt to match URIs to
 * Controllers when no specific route has been defined. If false,
 * only routes that have been defined here will be available.
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->resource('photos');

// // Equivalent to the following:
// $routes->get('photos/new',             'Photos::new');
// $routes->post('photos',                'Photos::create');
// $routes->get('photos',                 'Photos::index');
// $routes->get('photos/(:segment)',      'Photos::show/$1');
// $routes->get('photos/(:segment)/edit', 'Photos::edit/$1');
// $routes->put('photos/(:segment)',      'Photos::update/$1');
// $routes->patch('photos/(:segment)',    'Photos::update/$1');
// $routes->delete('photos/(:segment)',   'Photos::delete/$1');
// $routes->resource('cabang');


/**
 * role adalah nama alias yg ada di app/config/filter.php
 */
$routes->group('/', ['filter' => 'role:admin,superadmin,cluster,cabang,srbb,atf'], function($routes) {
	$routes->get('/', 'Home::index');
	$routes->get('informasi', 'Info::index');
	

	// agen
	$routes->resource('agen',[
			'filter'	=> 'permission:tambahagen',
			'except'	=> 'index,show'
			]);

    $routes->get('agen', 'Agen::index');
    $routes->get('agen/show/(:id)', 'Agen::show/$1');
	
	// khusus admin
	$routes->resource('pegawai', ['filter'	=> 'permission:fullaccess']);
	$routes->resource('cabang',['filter'	=> 'permission:fullaccess']);
	$routes->resource('kota', ['filter'	=> 'permission:fullaccess']);

	$routes->get('/apiinfo', 'Apiinfo::index');
	// $routes->resource('api/informasi');
	$routes->group('/api', ['namespace' => 'App\Controllers\API'], function($routes) {
		$routes->get('status', 'Status::index');
		$routes->post('status', 'Status::ubahstatus');

		$routes->get('statusterkini', 'Statusterkini::index');
	});

	$routes->get('lpegawai', 'LPegawai::index');
	$routes->get('lpegawai/show', 'LPegawai::show');

});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
