<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedApEirpDistribution;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get EIRP distribution: GET /telemetry/v1/adv_eirp_distrubution.
 *
 * Query options: tenant_id.
 */
class GetAdvancedStatEirpRequest extends ItemRequest
{
    protected ?string $dto = AdvancedApEirpDistribution::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/adv_eirp_distrubution';
    }
}
