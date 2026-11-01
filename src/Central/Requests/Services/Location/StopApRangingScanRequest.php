<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Stop a scan: DELETE /network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}.
 */
class StopApRangingScanRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $floorId, protected string $scanId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors/'.rawurlencode((string) $this->floorId).'/ap-ranging-scans/'.rawurlencode((string) $this->scanId);
    }
}
