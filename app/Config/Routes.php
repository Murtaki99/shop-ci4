<?php

use App\Controllers\HomeController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\AdminUserController;
use App\Controllers\AdminProductController;
use App\Controllers\AdminCategoryController;
use App\Controllers\AuthController;
use App\Controllers\CartController;
use App\Controllers\CheckoutController;
use App\Controllers\UserController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [HomeController::class, 'index']);
$routes->get('/product/(:any)', [HomeController::class, 'show']);
$routes->group('carts', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [CartController::class, 'index']);
    $routes->post('add', [CartController::class, 'addcart']);
    $routes->post('update/(:num)', [CartController::class, 'upatecart']);
    $routes->delete('delete/(:num)', [CartController::class, 'destroy']);
});

$routes->group('checkout', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [CheckoutController::class, 'index']);
    $routes->post('store', [CheckoutController::class, 'store']);
    $routes->get('payment', [CheckoutController::class, 'payment']);
});
$routes->group('profile', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [UserController::class, 'index']);
    $routes->post('store', [UserController::class, 'store']);
    $routes->get('payment', [UserController::class, 'payment']);
});

$routes->group('myorders', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [UserController::class, 'myorders']);
    $routes->get('detail/(:num)', [UserController::class, 'detail']);
});

// $routes->get('/register', [RegisterController::class, 'showFormRegister'], ['filter' => 'auth']);
$routes->get('/register', [AuthController::class, 'showFormRegister'], ['filter' => 'guest']);
$routes->post('/register', [AuthController::class, 'register']);
$routes->get('/login', [AuthController::class, 'showFormLogin'], ['filter' => 'guest']);
$routes->post('/login', [AuthController::class, 'login']);
$routes->post('/logout', [AuthController::class, 'logout'], ['filter' => 'auth']);

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
