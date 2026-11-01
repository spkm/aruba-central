<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\TagDataUpdate;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Asset Tag metadata: PUT /network-services/v1/asset-tags/{asset-tag-id}/metadata.
 *
 * Body: name, customId, notes, labels.
 */
class UpdateAssetTagDataByAssetTagIdRequest extends WriteRequest
{
    protected ?string $dto = TagDataUpdate::class;

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
        return '/network-services/v1/asset-tags/'.rawurlencode((string) $this->assetTagId).'/metadata';
    }
}
