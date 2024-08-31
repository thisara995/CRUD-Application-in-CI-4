<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Product routes
$routes->get('/products', 'ProductController::index'); // List all products
$routes->get('/products/create', 'ProductController::create'); // Show form to create a new product
$routes->post('/products', 'ProductController::store'); // Store a new product
$routes->get('/products/(:num)', 'ProductController::show/$1'); // Show details of a product
$routes->get('/products/edit/(:num)', 'ProductController::edit/$1'); // Show form to edit an existing product
$routes->post('/products/update/(:num)', 'ProductController::update/$1'); // Update an existing product
$routes->delete('/products/(:num)', 'ProductController::delete/$1'); // Delete a product

