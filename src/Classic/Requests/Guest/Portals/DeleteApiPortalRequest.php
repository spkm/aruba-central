<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete guest portal profile: DELETE /guest/v1/portals/{portal_id}.
 */
class DeleteApiPortalRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $portalId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId);
    }
}
