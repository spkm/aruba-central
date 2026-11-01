<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Neighbor;

use spkm\ArubaCentral\Classic\Data\Routing\NbrDetailsResp;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get BGP neighbor detailed information: GET /routing/v1/bgp/neighbor/detail.
 */
class GetRoutingV1BgpNeighborDetailRequest extends ItemRequest
{
    protected ?string $dto = NbrDetailsResp::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $device, protected string $address, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/routing/v1/bgp/neighbor/detail';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device' => $this->device, 'address' => $this->address, ...parent::defaultQuery()];
    }
}
