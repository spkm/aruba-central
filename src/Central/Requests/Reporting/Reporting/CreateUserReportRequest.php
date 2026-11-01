<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create Report: POST /network-reporting/v1/reports.
 *
 * Body: report.
 */
class CreateUserReportRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports';
    }
}
