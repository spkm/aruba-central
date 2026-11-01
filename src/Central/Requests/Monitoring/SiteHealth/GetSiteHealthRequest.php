<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth;

use spkm\ArubaCentral\Central\Data\Monitoring\SiteHealth;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Site information: GET /network-monitoring/v1/site-health/{site-id}.
 */
class GetSiteHealthRequest extends ItemRequest
{
    protected ?string $dto = SiteHealth::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/site-health/'.rawurlencode((string) $this->siteId);
    }
}
