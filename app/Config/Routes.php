<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::test');
$routes->get('/index', 'MusicController::index');
$routes->get('/playlist', 'MusicController::playlist');
$routes->get('/search', 'MusicController::search');