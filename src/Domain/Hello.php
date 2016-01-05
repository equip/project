<?php

namespace Equip\Project\Domain;

use Equip\Adr\DomainInterface;
use Equip\Adr\PayloadInterface;

class Hello implements DomainInterface
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
        $name = 'world';

        if (!empty($input['name'])) {
            $name = $input['name'];
        }

        return $this->payload
            ->withStatus(PayloadInterface::OK)
            ->withOutput([
                'hello' => $name,
            ]);
    }
}
