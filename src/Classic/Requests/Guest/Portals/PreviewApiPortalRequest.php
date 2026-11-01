<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use spkm\ArubaCentral\Classic\Data\Guest\PreviewUrl;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get preview url of guest portal profile: GET /guest/v1/portals/preview/{portal_id}.
 */
class PreviewApiPortalRequest extends ItemRequest
{
    protected ?string $dto = PreviewUrl::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $portalId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/preview/'.rawurlencode((string) $this->portalId);
    }
}
