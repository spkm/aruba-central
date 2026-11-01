<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\NbrPathloss;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get nbr pathloss of a neighbor MAC heard by a specific radio MAC: GET /telemetry/v1/nbr_pathloss/{radio_mac}/{nbr_mac}/{band}.
 *
 * Query options: tenant_id.
 */
class GetNbrPathlossByNbrBandRequest extends ItemRequest
{
    protected ?string $dto = NbrPathloss::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, protected string $nbrMac, protected string $band, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/nbr_pathloss/'.rawurlencode((string) $this->radioMac).'/'.rawurlencode((string) $this->nbrMac).'/'.rawurlencode((string) $this->band);
    }
}
