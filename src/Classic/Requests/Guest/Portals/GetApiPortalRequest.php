<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use spkm\ArubaCentral\Classic\Data\Guest\Portal;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get guest portal profile: GET /guest/v1/portals/{portal_id}.
 */
class GetApiPortalRequest extends ItemRequest
{
    protected ?string $dto = Portal::class;

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
