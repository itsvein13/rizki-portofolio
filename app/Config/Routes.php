<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('work/(:segment)', 'Pages::project/$1');
$routes->get('sitemap.xml', 'Pages::sitemap');
