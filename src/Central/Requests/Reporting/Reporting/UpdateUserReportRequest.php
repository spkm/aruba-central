<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Report: PUT /network-reporting/v1/reports/{report-id}.
 *
 * Body: name, email.
 */
class UpdateUserReportRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $reportId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports/'.rawurlencode((string) $this->reportId);
    }
}
