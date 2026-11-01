<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\NbrPathloss;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all nbr pathloss for a customer and radio MAC: GET /telemetry/v1/nbr_pathloss_radio/{radio_mac}/{band}.
 *
 * Query parameters: tenant_id.
 */
class GetRadioAllNbrPathlossRequest extends ListRequest
{
    protected ?string $dto = NbrPathloss::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $radioMac, protected string $band, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/nbr_pathloss_radio/'.rawurlencode((string) $this->radioMac).'/'.rawurlencode((string) $this->band);
    }
}
