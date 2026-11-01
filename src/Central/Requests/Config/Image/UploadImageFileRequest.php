<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Image;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\ImageUploadResource;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Upload image file: POST /network-config/v1alpha1/cnac-image/upload.
 *
 * Body: file.
 */
class UploadImageFileRequest extends WriteRequest
{
    protected ?string $dto = ImageUploadResource::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-image/upload';
    }
}
