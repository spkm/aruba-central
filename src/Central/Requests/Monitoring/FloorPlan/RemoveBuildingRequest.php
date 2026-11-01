<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Remove Building: DELETE /network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}.
 */
class RemoveBuildingRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $buildingId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/buildings/'.rawurlencode((string) $this->buildingId);
    }
}
