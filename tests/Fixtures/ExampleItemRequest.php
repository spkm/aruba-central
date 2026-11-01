<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Requests\ItemRequest;

class ExampleItemRequest extends ItemRequest
{
    protected ?string $dto = ExampleData::class;

    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}";
    }
}
