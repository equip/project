<?php

// Include Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

use Equip\Project\Domain;

Equip\Application::build()
->setConfiguration([
    Equip\Configuration\AurynConfiguration::class,
    Equip\Configuration\DiactorosConfiguration::class,
    Equip\Configuration\EnvConfiguration::class,
    Equip\Configuration\MonologConfiguration::class,
    Equip\Configuration\PayloadConfiguration::class,
    // Equip\Configuration\PlatesConfiguration::class,
    // Equip\Configuration\PlatesResponderConfiguration::class,
    // Equip\Configuration\RedisConfiguration::class,
    Equip\Configuration\RelayConfiguration::class,
    Equip\Configuration\WhoopsConfiguration::class,
])
->setMiddleware([
    Relay\Middleware\ResponseSender::class,
    Equip\Handler\ExceptionHandler::class,
    Equip\Handler\DispatchHandler::class,
    Relay\Middleware\JsonContentHandler::class,
    Relay\Middleware\FormContentHandler::class,
    Equip\Handler\ActionHandler::class,
])
->setRouting(function (Equip\Directory $directory) {
    return $directory
        ->get('/', Domain\Welcome::class)
        ->get('/hello[/{name}]', Domain\Hello::class)
        ->post('/hello[/{name}]', Domain\Hello::class)
        ; // End of routing
})
->run();
