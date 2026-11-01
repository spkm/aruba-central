<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility;

use spkm\ArubaCentral\Classic\Data\AirMatch\RadioFeas;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get radio feasibility of a specific radio MAC: GET /receiver/v1/radio_feasibility/{radioMac}.
 *
 * Query options: tenant_id.
 */
class GETGetRadioFeasByRadioMacRequest extends ItemRequest
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
        return '/receiver/v1/radio_feasibility/'.rawurlencode((string) $this->radioMac);
    }
}
