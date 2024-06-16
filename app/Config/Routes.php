<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/dashboard', 'Dashboard::index');

//admin
$routes->get('/admin', 'AdminController::index');
$routes->post('/admin/login', 'AdminController::login');
$routes->get('/admin/logout', 'AdminController::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

//data user
$routes->get('/users', 'UserController::index', ['filter' => 'auth']);
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');

//pelaporan
$routes->get('/reports', 'ReportController::index', ['filter' => 'auth']);
$routes->get('/reports/create', 'ReportController::create');
$routes->post('/reports/store', 'ReportController::store');

//penilaian
$routes->get('/assessments', 'AssessmentController::index', ['filter' => 'auth']);
$routes->get('/assessments/create', 'AssessmentController::create');
$routes->post('/assessments/store', 'AssessmentController::store');






