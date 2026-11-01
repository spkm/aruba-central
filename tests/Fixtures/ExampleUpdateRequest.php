<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

class ExampleUpdateRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ExampleData::class;

    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}";
    }
}
