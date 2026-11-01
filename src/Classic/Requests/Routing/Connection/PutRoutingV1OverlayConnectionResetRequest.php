<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Connection;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Reset overlay control connection: PUT /routing/v1/overlay/connection/reset.
 */
class PutRoutingV1OverlayConnectionResetRequest extends ActionRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $device, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/routing/v1/overlay/connection/reset';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device' => $this->device, ...parent::defaultQuery()];
    }
}
