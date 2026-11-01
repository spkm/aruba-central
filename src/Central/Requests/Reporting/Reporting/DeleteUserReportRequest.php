<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Report: DELETE /network-reporting/v1/reports/{report-id}.
 */
class DeleteUserReportRequest extends DeleteRequest
{
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
