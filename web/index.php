<?php

define('APP_PATH', realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR);

require APP_PATH . 'vendor/autoload.php';

$app = Spark\Application::boot();

$app->addRoutes(function(Spark\Router $r) {
    $r->get('/shifts', 'Spark\Project\Domain\Shift\GetList');
});

$app->run();
