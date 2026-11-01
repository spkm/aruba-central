<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Central\Data\Services\ApRangingScanStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get scan resource: GET /network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}.
 */
class GetApRangingScanRequest extends ItemRequest
{
    protected ?string $dto = ApRangingScanStatus::class;

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
