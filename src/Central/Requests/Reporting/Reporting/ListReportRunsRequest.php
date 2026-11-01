<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use spkm\ArubaCentral\Central\Data\Reporting\ReportRun;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Report Runs: GET /network-reporting/v1/reports/{report-id}/report-runs.
 *
 * Query parameters: sort.
 */
class ListReportRunsRequest extends ListRequest
{
    protected ?string $dto = ReportRun::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $reportId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports/'.rawurlencode((string) $this->reportId).'/report-runs';
    }
}
