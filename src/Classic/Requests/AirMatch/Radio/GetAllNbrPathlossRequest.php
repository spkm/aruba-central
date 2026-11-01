<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\NbrPathloss;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all nbr pathloss for a customer and band: GET /telemetry/v1/nbr_pathloss_all/{band}.
 *
 * Query parameters: tenant_id.
 */
class GetAllNbrPathlossRequest extends ListRequest
{
    protected ?string $dto = NbrPathloss::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $band, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/nbr_pathloss_all/'.rawurlencode((string) $this->band);
    }
}
