<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

class ExampleSettingUpdateRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example-setting';
    }
}
