<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\Gateway;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gateway Details: GET /network-monitoring/v1/gateways/{serial-number}.
 */
class GetGatewayDetailRequest extends ItemRequest
{
    protected ?string $dto = Gateway::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber);
    }
}
