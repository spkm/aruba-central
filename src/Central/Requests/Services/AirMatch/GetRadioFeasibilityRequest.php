<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\RadioFeasibility;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get radio feasibility of a specific radio MAC: GET /network-services/v1/airmatch-radio-feasibility/{radio-mac}.
 */
class GetRadioFeasibilityRequest extends ItemRequest
{
    protected ?string $dto = RadioFeasibility::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-radio-feasibility/'.rawurlencode((string) $this->radioMac);
    }
}
