<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

class ExampleRebootRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}/reboot";
    }
}
