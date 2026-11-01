<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Requests\ItemRequest;

class ExampleSettingRequest extends ItemRequest
{
    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example-setting';
    }
}
