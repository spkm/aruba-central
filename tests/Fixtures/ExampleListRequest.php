<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Requests\ListRequest;

class ExampleListRequest extends ListRequest
{
    protected ?string $dto = ExampleData::class;

    public string $paging = self::CURSOR;

    public function resolveEndpoint(): string
    {
        return '/example';
    }
}
