<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::index');
$routes->get('login', 'AuthController::login');
$routes->get('signup', 'AuthController::signup');
$routes->get('forgot-password', 'AuthController::forgotpassword');
$routes->get('reset-password', 'AuthController::resetpassword');
$routes->post('attemptLogin', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');
