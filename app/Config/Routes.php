<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::test');
$routes->get('/index', 'MusicPlayerController::index');
$routes->get('/search', 'MusicPlayerController::index');