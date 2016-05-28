<?php

namespace Equip\Project\Domain;

use Equip\Adr\DomainInterface;
use Equip\Adr\PayloadInterface;

class Welcome implements DomainInterface
{
    /**
     * @var PayloadInterface
     */
    private $payload;

    /**
     * @param PayloadInterface $payload
     */
    public function __construct(PayloadInterface $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(array $input)
    {
        $composer = __DIR__ . '/../../composer.json';
        $composer = json_decode(file_get_contents($composer), true);

        return $this->payload
            ->withStatus(PayloadInterface::STATUS_OK)
            ->withOutput([
                'appName' => $composer['name'],
                'equipVersion' => $composer['require']['equip/framework'],
                'hello' => '/hello/:name',
            ]);
    }
}
