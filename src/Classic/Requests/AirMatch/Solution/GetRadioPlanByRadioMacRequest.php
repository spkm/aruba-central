<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Solution;

use spkm\ArubaCentral\Classic\Data\AirMatch\RadioPlan;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get solution of a specific radio MAC: GET /solver/v1/radio_plan/{radio_mac}.
 *
 * Query options: tenant_id, debug.
 */
class GetRadioPlanByRadioMacRequest extends ItemRequest
{
    protected ?string $dto = RadioPlan::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/solver/v1/radio_plan/'.rawurlencode((string) $this->radioMac);
    }
}
