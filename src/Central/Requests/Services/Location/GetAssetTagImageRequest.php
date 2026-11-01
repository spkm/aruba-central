<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Asset Tag image: GET /network-services/v1/asset-tags/{asset-tag-id}/image.
 */
class GetAssetTagImageRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $assetTagId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/asset-tags/'.rawurlencode((string) $this->assetTagId).'/image';
    }
}
