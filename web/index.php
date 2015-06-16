<?php

define('APP_PATH', realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR);

require APP_PATH . 'vendor/autoload.php';

$app = Spark\Application::boot();

$app->setMiddleware([
    'Relay\Middleware\ResponseSender',
    'Spark\Handler\ExceptionHandler',
    'Spark\Handler\RouteHandler',
    'Spark\Handler\ActionHandler',
]);

$app->addRoutes(function(Spark\Router $r) {
    $r->get('/shifts', 'Spark\Project\Domain\Shift\GetList');
});

$app->run();
