<?php

require __DIR__ . '/../vendor/autoload.php';

define('APP_PATH',realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR);

$app = new Spark\Application();

$app->addRoutes(function(\Spark\Router $r) {

    $r->get('/shifts', '\Spark\Project\Domain\Shift\GetList');

});

$app->run();