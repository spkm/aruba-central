<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use spkm\ArubaCentral\Central\Data\Reporting\Report;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Report: GET /network-reporting/v1/reports/{report-id}.
 */
class GetUserReportRequest extends ItemRequest
{
    protected ?string $dto = Report::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $reportId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports/'.rawurlencode((string) $this->reportId);
    }
}
