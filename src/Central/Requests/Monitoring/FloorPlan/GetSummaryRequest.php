<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Central\Data\Monitoring\SiteSummary;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Site devices summary: GET /network-monitoring/v1/sitemaps-summary/{site-id}.
 */
class GetSummaryRequest extends ItemRequest
{
    protected ?string $dto = SiteSummary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps-summary/'.rawurlencode((string) $this->siteId);
    }
}
