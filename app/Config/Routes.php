<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/dashboard', 'Dashboard::index');

//admin
// $routes->get('/admin', 'AdminController::index');
// $routes->post('/admin/login', 'AdminController::login');
// $routes->get('/admin/logout', 'AdminController::logout');
// $routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

//login role
// $routes->get('/login', 'AuthController::login');
// $routes->post('/login', 'AuthController::login');
// $routes->get('/logout', 'AuthController::logout');
// $routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// $routes->get('/admin', 'AdminController::index', ['filter' => 'role:admin']);
// $routes->get('/pegawai', 'PegawaiController::index', ['filter' => 'role:pegawai']);
// $routes->get('/mahasiswa', 'MahasiswaController::index', ['filter' => 'role:mahasiswa']);

$routes->get('/auth/login', 'AuthController::login');
$routes->post('/auth/loginProcess', 'AuthController::loginProcess');
$routes->get('/auth/logout', 'AuthController::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

//data user
$routes->get('/users', 'UserController::index');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');

//pelaporan
$routes->get('/reports', 'ReportController::index', ['filter' => 'auth']);
$routes->get('/reports/create', 'ReportController::create');
$routes->post('/reports/store', 'ReportController::store');
$routes->get('/report/delete/(:num)', 'ReportController::delete/$1');
$routes->get('/report/confirm/(:num)', 'ReportController::confirmReport/$1');

//penilaian
$routes->get('/assessments', 'AssessmentController::index', ['filter' => 'auth']);
$routes->get('/assessments/create', 'AssessmentController::create');
$routes->post('/assessments/store', 'AssessmentController::store');

//topsis
$routes->get('/topsis', 'TopsisController::index', ['filter' => 'auth']);
// $routes->get('topsis/edit/(:num)', 'TopsisController::editWeight/$1');
// $routes->post('topsis/edit/(:num)', 'TopsisController::editWeight/$1');

$routes->get('/topsis/edit/(:num)', 'TopsisController::editWeight/$1');
$routes->post('/topsis/update_weight', 'TopsisController::updateWeight');

//pengaduan
$routes->get('/page/pengaduan', 'PengaduanController::index');
$routes->post('/reports/create', 'ReportController::create');
$routes->get('/page/pengaduan/success', 'PengaduanController::success');







