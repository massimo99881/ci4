<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('classifica/index', 'Classifica::index');
$routes->get('Negozio/index', 'Negozio::index');
$routes->post('Negozio/buy', 'Negozio::buy');
$routes->get('Acquisti/index', 'Acquisti::index');
$routes->post('Acquisti/delete/(:num)', 'Acquisti::delete/$1');
$routes->get('dashboard', 'Dashboard::index');

// Aggiunta delle rotte per le news
$routes->get('News/index', 'News::index');
$routes->post('News/index', 'News::index');
$routes->get('News/detail/(:num)', 'News::detail/$1');

// Rotte per i giocatori
$routes->get('Giocatori/index', 'Giocatori::index');
$routes->post('Giocatori/index', 'Giocatori::index');
$routes->get('Giocatori/detail/(:num)', 'Giocatori::detail/$1');
$routes->post('Giocatori/detail', 'Giocatori::detail');

// Rotte per il confronto
$routes->get('Giocatori/confronta/(:num)', 'Giocatori::confronta/$1');
$routes->post('Giocatori/confronta', 'Giocatori::confronta');


