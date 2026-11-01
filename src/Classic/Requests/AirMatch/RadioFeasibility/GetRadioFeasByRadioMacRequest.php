<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility;

use spkm\ArubaCentral\Classic\Data\AirMatch\RadioFeas;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get radio_feasibility of a specific radio MAC: GET /feasibility/v1/radio_feasibility/{radioMac}.
 *
 * Query options: tenant_id.
 */
class GetRadioFeasByRadioMacRequest extends ItemRequest
{
    protected ?string $dto = RadioFeas::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/feasibility/v1/radio_feasibility/'.rawurlencode((string) $this->radioMac);
    }
}
