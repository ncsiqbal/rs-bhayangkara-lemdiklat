<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/jadwal-dokter', 'Doctors::index');
$routes->get('/unit-poli', 'Polyclinics::index');
$routes->get('/unit-poli/(:num)', 'Polyclinics::show/$1');
$routes->get('/galeri', 'Galleries::index');
$routes->get('/galeri/(:num)', 'Galleries::show/$1');
$routes->get('/admin/login', 'AdminAuth::login');
$routes->post('/admin/login', 'AdminAuth::authenticate');
$routes->get('/admin/logout', 'AdminAuth::logout');
$routes->get('/admin/dashboard', 'AdminDashboard::index');
$routes->get('/admin/doctors', 'AdminDoctors::index');
$routes->get('/admin/doctors/create', 'AdminDoctors::create');
$routes->post('/admin/doctors/store', 'AdminDoctors::store');
$routes->get('/admin/doctors/edit/(:num)', 'AdminDoctors::edit/$1');
$routes->post('/admin/doctors/update/(:num)', 'AdminDoctors::update/$1');
$routes->post('/admin/doctors/delete/(:num)', 'AdminDoctors::delete/$1');
$routes->get('/admin/schedules', 'AdminDoctorSchedules::index');
$routes->get('/admin/schedules/create', 'AdminDoctorSchedules::create');
$routes->post('/admin/schedules/store', 'AdminDoctorSchedules::store');
$routes->get('/admin/schedules/edit/(:num)', 'AdminDoctorSchedules::edit/$1');
$routes->post('/admin/schedules/update/(:num)', 'AdminDoctorSchedules::update/$1');
$routes->post('/admin/schedules/delete/(:num)', 'AdminDoctorSchedules::delete/$1');
$routes->get('/admin/polyclinics', 'AdminPolyclinics::index');
$routes->get('/admin/polyclinics/create', 'AdminPolyclinics::create');
$routes->post('/admin/polyclinics/store', 'AdminPolyclinics::store');
$routes->get('/admin/polyclinics/edit/(:num)', 'AdminPolyclinics::edit/$1');
$routes->post('/admin/polyclinics/update/(:num)', 'AdminPolyclinics::update/$1');
$routes->post('/admin/polyclinics/delete/(:num)', 'AdminPolyclinics::delete/$1');
$routes->get('/admin/galleries', 'AdminGalleries::index');
$routes->get('/admin/galleries/create', 'AdminGalleries::create');
$routes->post('/admin/galleries/store', 'AdminGalleries::store');

$routes->get('/admin/galleries/edit/(:num)', 'AdminGalleries::edit/$1');
$routes->post('/admin/galleries/update/(:num)', 'AdminGalleries::update/$1');

$routes->post('/admin/galleries/delete/(:num)', 'AdminGalleries::delete/$1');