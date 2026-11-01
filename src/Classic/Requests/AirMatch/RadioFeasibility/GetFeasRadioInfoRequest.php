<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get feasibility radio info of a specific radio MAC: GET /feasibility/v1/radio_info/{radioMac}.
 *
 * Query options: tenant_id.
 */
class GetFeasRadioInfoRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/feasibility/v1/radio_info/'.rawurlencode((string) $this->radioMac);
    }
}
