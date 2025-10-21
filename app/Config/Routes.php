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

$routes->get('dashboard', 'PortalController::index');
// $routes->get('quiz', 'QuizController::index');
//         delete_cookie('access_token');
//         delete_cookie('refresh_token');
//         return redirect()->to('/login');    

