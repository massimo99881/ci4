<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('classifica/index', 'Classifica::index');
$routes->get('Negozio/index', 'Negozio::index');
$routes->post('Negozio/buy', 'Negozio::buy');

?>