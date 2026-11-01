<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedApStats;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get number of AP's and AP models: GET /telemetry/v1/adv_ap_stats.
 *
 * Query options: tenant_id.
 */
class GetAdvancedStatApRequest extends ItemRequest
{
    protected ?string $dto = AdvancedApStats::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/adv_ap_stats';
    }
}
