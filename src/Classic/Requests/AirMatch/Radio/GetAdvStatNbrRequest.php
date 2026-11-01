<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedStatNbr;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get neighbor stats information: GET /telemetry/v1/adv_stat_nbr.
 *
 * Query options: tenant_id.
 */
class GetAdvStatNbrRequest extends ItemRequest
{
    protected ?string $dto = AdvancedStatNbr::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/adv_stat_nbr';
    }
}
