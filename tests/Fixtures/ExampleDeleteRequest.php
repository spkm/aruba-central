<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Requests\DeleteRequest;

class ExampleDeleteRequest extends DeleteRequest
{
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}";
    }
}
