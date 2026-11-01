<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Central\Data\Monitoring\SwitchDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Switch details: GET /network-monitoring/v1/switches/{serial-number}.
 */
class GetSwitchRequest extends ItemRequest
{
    protected ?string $dto = SwitchDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/switches/'.rawurlencode((string) $this->serialNumber);
    }
}
