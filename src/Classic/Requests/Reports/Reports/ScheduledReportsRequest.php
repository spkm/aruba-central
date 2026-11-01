<?php

namespace spkm\ArubaCentral\Classic\Requests\Reports\Reports;

use spkm\ArubaCentral\Classic\Data\Reports\ApiExternalApiScheduledReportsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Scheduled Reports: GET /reports/api/v1/{cid}/scheduled.
 *
 * Query parameters: start_time, end_time.
 */
class ScheduledReportsRequest extends ListRequest
{
    protected ?string $dto = ApiExternalApiScheduledReportsItem::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $cid, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/reports/api/v1/'.rawurlencode((string) $this->cid).'/scheduled';
    }
}
