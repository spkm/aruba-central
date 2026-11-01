<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Clients;

use spkm\ArubaCentral\Central\Data\Monitoring\ClientDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Client Details: GET /network-monitoring/v1/clients/{mac-address}.
 */
class GetClientDetailsRequest extends ItemRequest
{
    protected ?string $dto = ClientDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macAddress, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clients/'.rawurlencode((string) $this->macAddress);
    }
}
