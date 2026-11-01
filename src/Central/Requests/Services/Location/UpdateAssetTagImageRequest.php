<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\AssetTagImage;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Upload or replace Asset Tag image: PUT /network-services/v1/asset-tags/{asset-tag-id}/image.
 *
 * Body: file.
 */
class UpdateAssetTagImageRequest extends WriteRequest
{
    protected ?string $dto = AssetTagImage::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $assetTagId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/asset-tags/'.rawurlencode((string) $this->assetTagId).'/image';
    }
}
