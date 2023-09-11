<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

$routes->post('/myregister', 'Pengguna::daftar');
$routes->post('/myloginpengguna', 'Pengguna::process');

$routes->post('/loginadmin', 'Admin::loginadmin');
$routes->post('/myloginadmin', 'Admin::process');

$routes->get('/dashboard_admin', 'Dashboard::index');
$routes->get('logout', 'Logout::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/', 'Frontend::index');
$routes->get('/about', 'About::index');
$routes->get('/detail', 'Detail::index');
$routes->get('/all', 'All::index');
$routes->get('/rekom', 'Rekom::index');
$routes->get('/formpengguna', 'Formpengguna::index');
$routes->post('/updatePengguna', 'Formpengguna::updatePengguna');

$routes->get('/kulinerhome', 'KulinerHome::index');

$routes->get('/admin', 'Admin::index');
$routes->get('/adminCreate', 'Admin::create');
$routes->post('/adminSave', 'Admin::save');
$routes->post('/adminUpdate', 'Admin::update');

$routes->get('/pengguna', 'Pengguna::index');
$routes->get('/penggunaCreate', 'Pengguna::create');
$routes->post('/penggunaSave', 'Pengguna::save');
$routes->post('/penggunaUpdate', 'Pengguna::update');

$routes->get('/kuliner', 'Kuliner::index');
$routes->get('/kulinerCreate', 'Kuliner::create');
$routes->post('/kulinerSave', 'Kuliner::save');
$routes->post('/kulinerUpdate', 'Kuliner::update');

$routes->post('/cari', 'Kuliner::cari');
$routes->get('/kuliner', 'Kuliner::index');
$routes->get('/kulinerCreate', 'Kuliner::create');
$routes->post('/kulinerSave', 'Kuliner::save');
$routes->post('/kulinerUpdate', 'Kuliner::update');

$routes->get('/rekomendasi', 'Rekomendasi::index');
$routes->get('/rekomendasiCreate', 'Rekomendasi::create');
$routes->post('/rekomendasiSave', 'Rekomendasi::save');
$routes->post('/rekomendasiUpdate', 'Rekomendasi::update');

$routes->get('/komentar', 'Komentar::index');
$routes->get('/komentarCreate', 'Komentar::create');
$routes->post('/komentarSave', 'Komentar::save');
$routes->post('/komentarUpdate', 'Komentar::update');

$routes->get('/rating', 'Rating::index');
$routes->get('/ratingCreate', 'Rating::create');
$routes->post('/ratingSave', 'Rating::save');
$routes->post('/ratingUpdate', 'Rating::update');


$routes->post('/_komentarSave', 'Komentar::saveKomentar');
$routes->post('/_rekomendasiSave', 'Rekomendasi::saveRekom');
$routes->post('/save1', 'Rekomendasi::index');
/*
//$route['admin'] = "admin/index";
$routes->group('admin', function($routes){
	$routes->get('news', 'NewsAdmin::index');
	$routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->add('news/new', 'NewsAdmin::create');
	$routes->add('news/(:segment)/edit', 'NewsAdmin::edit/$1');
	$routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
});

$routes->get('/news', 'News::index');
$routes->get('/news/(:any)', 'News::viewNews/$1');

$routes->get('subjects/create', 'SubjectsController::create');
$routes->post('subjects/store', 'SubjectsController::store');

$routes->get('subjects/edit/(:num)', 'SubjectsController::edit/$1');
$routes->post('subjects/update/(:num)', 'SubjectsController::update/$1');

$routes->get('subjects/delete/(:num)', 'SubjectsController::delete/$1');
$route['admin/news/delete/(:any)'] = 'admin_news/delete/$1';
$route['admin/news/edit/(:any)'] = 'admin_news/edit/$1';
$route['admin/news/create'] = 'admin_news/create';
$route['admin/news/(:any)'] = 'admin_news/view/$1';
$route['admin/news'] = 'admin_news/index';

$routes->get('products', 'Product::feature');
$routes->post('products', 'Product::feature');
$routes->put('products/(:num)', 'Product::feature');
$routes->delete('products/(:num)', 'Product::feature');

$route['adminEdit/(:any)'] = "admin/edit/$1";
$route['adminUpdate/(:any)']['put'] = "admin/update/$1";
$route['adminDelete/(:any)']['delete'] = "admin/delete/$1";
//$routes->get('/admin', 'Admin::index');
$route['admin'] = "admin/index";
$route['adminCreate']['post'] = "admin/store";
$route['adminEdit/(:any)'] = "admin/edit/$1";
$route['adminUpdate/(:any)']['put'] = "admin/update/$1";
$route['adminDelete/(:any)']['delete'] = "admin/delete/$1";

$routes->get('/admin', 'Admin::index');
$routes->get('/pengguna', 'Admin::index');
$routes->get('/kuliner', 'Admin::index');
*/
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
