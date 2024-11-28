<?php

use App\Controllers\CategoryController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// $routes->get('/register', [RegisterController::class, 'showFormRegister'], ['filter' => 'auth']);
$routes->get('/register', [RegisterController::class, 'showFormRegister'], ['filter' => 'guest']);
$routes->get('/login', [LoginController::class, 'showFormLogin'], ['filter' => 'guest']);
$routes->post('/register', [RegisterController::class, 'register']);
$routes->post('/login', [LoginController::class, 'login']);

$routes->group('categories', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [CategoryController::class, 'index']);
    $routes->get('create', [CategoryController::class, 'create']);
    $routes->post('store', [CategoryController::class, 'store']);
    $routes->get('edit/(:segment)', [CategoryController::class, 'edit']);
    $routes->post('update/(:segment)', [CategoryController::class, 'update']);
    $routes->delete('delete/(:segment)', [CategoryController::class, 'destroy']);
});
