<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\ReportRadio;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all reporting radio for a customer: GET /telemetry/v1/reporting_radio_all.
 *
 * Query parameters: tenant_id.
 */
class GetAllRepRadioRequest extends ListRequest
{
    protected ?string $dto = ReportRadio::class;

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
        return '/telemetry/v1/reporting_radio_all';
    }
}
