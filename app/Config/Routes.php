<?php

use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\AdminUserController;
use App\Controllers\AdminProductController;
use App\Controllers\AdminCategoryController;

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
    $routes->get('/', [AdminCategoryController::class, 'index']);
    $routes->get('create', [AdminCategoryController::class, 'create']);
    $routes->post('store', [AdminCategoryController::class, 'store']);
    $routes->get('edit/(:segment)', [AdminCategoryController::class, 'edit']);
    $routes->post('update/(:segment)', [AdminCategoryController::class, 'update']);
    $routes->delete('delete/(:segment)', [AdminCategoryController::class, 'destroy']);
});

$routes->group('products', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [AdminProductController::class, 'index']);
    $routes->get('create', [AdminProductController::class, 'create']);
    $routes->post('store', [AdminProductController::class, 'store']);
    $routes->get('edit/(:segment)', [AdminProductController::class, 'edit']);
    $routes->post('update/(:segment)', [AdminProductController::class, 'update']);
    $routes->delete('delete/(:segment)', [AdminProductController::class, 'destroy']);
});

$routes->group('users', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [AdminUserController::class, 'index']);
    $routes->get('create', [AdminUserController::class, 'create']);
    $routes->post('store', [AdminUserController::class, 'store']);
    $routes->get('edit/(:segment)', [AdminUserController::class, 'edit']);
    $routes->post('update/(:segment)', [AdminUserController::class, 'update']);
    $routes->delete('delete/(:segment)', [AdminUserController::class, 'destroy']);
});
