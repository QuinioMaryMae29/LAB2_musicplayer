<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::test');
$routes->get('/index', 'MusicPlayerController::index');
$routes->post('/upload', 'MusicPlayerController::upload');
$routes->post('/createPlaylist', 'MusicPlayerController::createPlaylist');
$routes->post('/addToPlaylist', 'MusicPlayerController::addToPlaylist');
$routes->post('/removeFromPlaylist', 'MusicPlayerController::removeFromPlaylist');
$routes->post('/search', 'MusicPlayerController::search');