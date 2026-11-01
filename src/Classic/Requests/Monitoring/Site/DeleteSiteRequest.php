<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Site;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Site: DELETE /central/v2/sites/{site_id}.
 */
class DeleteSiteRequest extends DeleteRequest
{
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
