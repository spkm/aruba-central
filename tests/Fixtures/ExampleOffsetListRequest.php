<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Requests\ListRequest;

class ExampleOffsetListRequest extends ListRequest
{
    protected ?string $dto = ExampleData::class;

    public ?int $maxLimit = 50;

    public function resolveEndpoint(): string
    {
        return '/example';
    }
}
