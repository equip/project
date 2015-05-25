<?php
namespace Spark\Project\Domain\Shift;

use Aura\Payload\Payload;
use Spark\Adr\DomainInterface;

class GetList implements DomainInterface
{

    protected $shifts = [
        [
            "id" => 10,
            "user_id" => 1,
            "start" => "9am",
            "end" => "12pm",
        ],
        [
            "id" => 12,
            "user_id" => 3,
            "start" => "8am",
            "end" => "11:30am",
        ],
        [
            "id" => 15,
            "user_id" => 3,
            "start" => "12pm",
            "end" => "3:30pm",
        ],
        [
            "id" => 21,
            "user_id" => 1,
            "start" => "12:30pm",
            "end" => "4pm",
        ],
        [
            "id" => 45,
            "user_id" => 2,
            "start" => "4pm",
            "end" => "10pm",
        ]
    ];

    public function __invoke(array $input)
    {
        $payload = new Payload();
        $payload->setStatus(Payload::FOUND);

        $output = [];

        if (!empty($input['user_id']) && ($user_id = $input['user_id'])) {
            $shifts = array_values(array_filter($this->shifts, function($shift) use ($user_id) {
                return $shift['user_id'] == $user_id;
            }));
            $output["meta"]["filters"]["user_id"] = (int)$user_id;
        } else {
            $shifts = $this->shifts;
        }

        $output["shifts"] = $shifts;

        $payload->setOutput($output);

        return $payload;
    }
}