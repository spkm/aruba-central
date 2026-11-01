<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Visitors;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete guest visitor account: DELETE /guest/v1/portals/{portal_id}/visitors/{visitor_id}.
 */
class DeleteApiVisitorRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $portalId, protected string $visitorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId).'/visitors/'.rawurlencode((string) $this->visitorId);
    }
}
