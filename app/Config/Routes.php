<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('api/pregunta/(:num)', 'Pregunta::siguiente/$1');
$routes->get('api/pregunta', 'Pregunta::siguiente'); // sin ID (primera pregunta)

