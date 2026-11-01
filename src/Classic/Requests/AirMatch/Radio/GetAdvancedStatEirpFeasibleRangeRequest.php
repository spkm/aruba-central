<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get EIRP reasons: GET /receiver/v1/adv_eirp_range.
 *
 * Query options: tenant_id.
 */
class GetAdvancedStatEirpFeasibleRangeRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/receiver/v1/adv_eirp_range';
    }
}
