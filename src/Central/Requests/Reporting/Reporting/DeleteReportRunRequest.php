<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Report Run: DELETE /network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}.
 */
class DeleteReportRunRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $reportId, protected string $reportRunId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports/'.rawurlencode((string) $this->reportId).'/report-runs/'.rawurlencode((string) $this->reportRunId);
    }
}
