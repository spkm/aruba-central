<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\StaticRadio;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all static radios for a customer: GET /telemetry/v1/static_radio_all.
 *
 * Query parameters: tenant_id.
 */
class GetAllStaticRadiosRequest extends ListRequest
{
    protected ?string $dto = StaticRadio::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/static_radio_all';
    }
}
