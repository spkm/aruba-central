<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Remove Asset Tag metadata: DELETE /network-services/v1/asset-tags/{asset-tag-id}/metadata.
 */
class DeleteAssetTagDataByAssetTagIdRequest extends DeleteRequest
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
        return '/network-services/v1/asset-tags/'.rawurlencode((string) $this->assetTagId).'/metadata';
    }
}
