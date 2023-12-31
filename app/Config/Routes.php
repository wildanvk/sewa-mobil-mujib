<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'User\Rent::index');

$routes->group('rent', function ($routes) {
    $routes->get('/', 'User\Rent::index');
    $routes->get('detail/(:num)', 'User\Rent::detail/$1');
});

$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin\Auth::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->group('auth', function ($routes) {
        $routes->get('login', 'Admin\Auth::index');
        $routes->post('verification', 'Admin\Auth::auth');
        $routes->get('logout', 'Admin\Auth::logout');
    });

    $routes->group('master', function ($routes) {
        // Merek
        $routes->get('merek', 'Admin\Merek::index');
        $routes->get('merek/tambah', 'Admin\Merek::tambah');
        $routes->post('merek/insert', 'Admin\Merek::insert');
        $routes->get('merek/edit/(:num)', 'Admin\Merek::edit/$1');
        $routes->post('merek/update', 'Admin\Merek::update');
        $routes->get('merek/hapus/(:num)', 'Admin\Merek::hapus/$1');

        // Warna
        $routes->get('warna', 'Admin\Warna::index');
        $routes->get('warna/tambah', 'Admin\Warna::tambah');
        $routes->post('warna/insert', 'Admin\Warna::insert');
        $routes->get('warna/edit/(:num)', 'Admin\Warna::edit/$1');
        $routes->post('warna/update', 'Admin\Warna::update');
        $routes->get('warna/hapus/(:num)', 'Admin\Warna::hapus/$1');

        // Mobil
        $routes->get('mobil', 'Admin\Mobil::index');
        $routes->get('mobil/tambah', 'Admin\Mobil::tambah');
        $routes->post('mobil/insert', 'Admin\Mobil::insert');
        $routes->get('mobil/edit/(:num)', 'Admin\Mobil::edit/$1');
        $routes->post('mobil/update', 'Admin\Mobil::update');
        $routes->get('mobil/hapus/(:num)', 'Admin\Mobil::hapus/$1');
    });
});

$routes->group('user', function ($routes) {
    $routes->get('login', 'User\Auth::index');
    $routes->post('verification', 'User\Auth::auth');
    $routes->get('logout', 'User\Auth::logout');
    $routes->get('register', 'User\Auth::Register');
    $routes->post('create', 'User\Auth::createAccount');
});