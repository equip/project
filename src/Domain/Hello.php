<?php

namespace Spark\Project\Domain;

use Spark\Adr\DomainInterface;
use Spark\Payload;

class Hello implements DomainInterface
{
    public function __invoke(array $input)
    {
        $name = 'world';

        if (!empty($input['name'])) {
            $name = $input['name'];
        }

        return (new Payload)
            ->setStatus(Payload::OK)
            ->setOutput([
                'hello' => $name,
            ]);
    }
}
