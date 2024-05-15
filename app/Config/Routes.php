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
$routes->get('/', 'Customer::home/$1');
$routes->get('/pendaftaran/(:num)', 'Customer::pendaftaran/$1');
$routes->post('/created', 'Customer::created');
$routes->get('/presensi/(:num)', 'Customer::presensi/$1');
$routes->post('/input', 'Customer::storepresensi');
$routes->get('/download/materi/(:num)', 'Customer::downloadmateri/$1');
$routes->post('/daftar', 'Customer::storependaftaran');

$routes->get('/detail/(:any)', 'Customer::detailwebinar/$1');

$routes->get('/sertifikat', 'Customer::sertifikat/$1');
$routes->get('/lihat', 'Customer::lihat/$1');

// Route Admin
$routes->get('/datapendaftar', 'Admin::index/$1');
$routes->get('/dashboard', 'Admin::dashboard');
$routes->get('/login', 'Admin::login');
$routes->get('/logout', 'Admin::logout');
$routes->get('/table', 'Admin::table');
$routes->post('/inputlogin', 'Admin::actlogin');
$routes->get('/datawebinar', 'Admin::datawebinar/$1');
$routes->get('/datapeserta/(:num)', 'Admin::datapeserta/$1');
$routes->get('/datapresensi/(:num)', 'Admin::datapresensi/$1');
$routes->get('/tambahdatawebinar', 'Admin::tambahdatawebinar');
$routes->post('/tambahdatawebinar', 'Admin::storetambahdatawebinar');

$routes->get('/ubahdata/(:num)', 'Admin::ubahdata/$1');
$routes->post('/ubahdata', 'Admin::ubahdatastore');
$routes->get('/hapusdata/(:num)', 'Admin::hapusdatawebinar/$1');
$routes->get('/datanotifikasi', 'Admin::datanotifikasi');
$routes->post('/datanotifikasi', 'Admin::storetdatanotifikasi');


$routes->get('/ubahdatawebinar/(:num)', 'Admin::ubahdatawebinar/$1');
$routes->post('/ubahdatawebinar', 'Admin::ubahdatastorewebinar');
$routes->get('/hapusdatawebinar/(:num)', 'Admin::hapusdatawebinar/$1');
$routes->get('/datanotifikasi/(:num)', 'Admin::datanotifikasi/$1');
$routes->get('/tambahdatanotifikasi', 'Admin::tambahdatanotifikasi');
$routes->post('/tambahdatanotifikasi', 'Admin::storetambahdatanotifikasi');
$routes->get('/hapusdatanotifikasi/(:num)', 'Admin::hapusdatanotifikasi/$1');

$routes->get('/email', 'Email::send');
$routes->get('/wa', 'whatsapp::send');
$routes->get('/exportpeserta/(:num)', 'Admin::exportpeserta/$1');
$routes->get('/exportpresensi/(:num)', 'Admin::exportpresensi/$1');

$routes->get('/ubahdatanotifikasi/(:num)', 'Admin::ubahdatanotifikasi/$1');
$routes->post('/ubahdatanotifikasi', 'Admin::ubahdatastorenotifikasi');

$routes->get('/loginuser', 'Customer::loginuser');
$routes->post('/inputloginuser', 'Customer::actloginuser');
$routes->get('/logoutuser', 'Customer::logout');
$routes->get('/registrasi', 'Customer::registrasi');
$routes->post('/tambahuser', 'Customer::storetambahuser');
$routes->get('/exportmateri/(:num)', 'Admin::exportmateri/$1');

// $routes->get('get-data', 'grafik::grafikData');
// $routes->get('data', 'grafik::index');


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
