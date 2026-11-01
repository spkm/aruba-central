<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Neighbor;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Reset/clear BGP neighbor session: PUT /routing/v1/bgp/neighbor/reset.
 */
class PutRoutingV1BgpNeighborResetRequest extends ActionRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $device, protected string $address, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/routing/v1/bgp/neighbor/reset';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device' => $this->device, 'address' => $this->address, ...parent::defaultQuery()];
    }
}
