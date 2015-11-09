<?php

namespace Spark\Project\Domain;

use Spark\Adr\DomainInterface;
use Spark\Adr\PayloadInterface;

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
