<?php

// Include Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Configure the dependency injection container
$injector = new \Auryn\Injector;
$configuration = new \Spark\Configuration\DefaultConfigurationSet;
$configuration->apply($injector);

// Configure middleware
$injector->alias(
    '\Spark\Middleware\Collection',
    '\Spark\Middleware\DefaultCollection'
);

// Configure the router
$injector->prepare(
    '\Spark\Router',
    function(\Spark\Router $router) {
        $router->get('/hello[/{name}]', 'Spark\Project\Domain\Hello');
        $router->post('/hello[/{name}]', 'Spark\Project\Domain\Hello');
    }
);

// Bootstrap the application
$dispatcher = $injector->make('\Relay\Relay');
$dispatcher(
    $injector->make('Psr\Http\Message\ServerRequestInterface'),
    $injector->make('Psr\Http\Message\ResponseInterface')
);
