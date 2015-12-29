<?php

// Include Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

use Spark\Project\Domain;

Spark\Application::build()
->setConfiguration([
    Spark\Configuration\AurynConfiguration::class,
    Spark\Configuration\DiactorosConfiguration::class,
    Spark\Configuration\NegotiationConfiguration::class,
    Spark\Configuration\PayloadConfiguration::class,
    Spark\Configuration\RelayConfiguration::class,
    Spark\Configuration\WhoopsConfiguration::class,
])
->setMiddleware([
    Relay\Middleware\ResponseSender::class,
    Spark\Handler\ExceptionHandler::class,
    Spark\Handler\DispatchHandler::class,
    Spark\Handler\JsonContentHandler::class,
    Spark\Handler\FormContentHandler::class,
    Spark\Handler\ActionHandler::class,
])
->setRouting(function (Spark\Directory $directory) {
    return $directory
    ->get('/hello[/{name}]', Domain\Hello::class)
    ->post('/hello[/{name}]', Domain\Hello::class)
    ; // End of routing
})
->run();
