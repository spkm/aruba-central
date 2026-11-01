<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Get Download Report Link: POST /network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}/download-link.
 *
 * Body: exportType.
 */
class DownloadReportLinkRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $reportId, protected string $reportRunId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports/'.rawurlencode((string) $this->reportId).'/report-runs/'.rawurlencode((string) $this->reportRunId).'/download-link';
    }
}
