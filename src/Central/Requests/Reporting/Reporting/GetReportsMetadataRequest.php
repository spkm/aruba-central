<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use spkm\ArubaCentral\Central\Data\Reporting\ReportsMetadata;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Reports Metadata: GET /network-reporting/v1/reports-meta.
 *
 * Query options: type, kpi-widget.
 */
class GetReportsMetadataRequest extends ItemRequest
{
    protected ?string $dto = ReportsMetadata::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports-meta';
    }
}
