<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Site;

use spkm\ArubaCentral\Classic\Data\Monitoring\Site;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Site details: GET /central/v2/sites/{site_id}.
 */
class GetSiteRequest extends ItemRequest
{
    protected ?string $dto = Site::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v2/sites/'.rawurlencode((string) $this->siteId);
    }
}
