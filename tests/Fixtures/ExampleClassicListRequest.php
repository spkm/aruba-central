<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Requests\ListRequest;

class ExampleClassicListRequest extends ListRequest
{
    protected ?string $dto = ExampleClassicData::class;

    public string $resultKey = 'aps';

    public ?int $maxLimit = 1000;

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/aps';
    }
}
