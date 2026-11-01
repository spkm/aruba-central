<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\CreateUploadRequestResponseDTO;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Upload Image: POST /v1/adp/images.
 *
 * Body: img_name, img_type, md5, version.
 */
class CreateUploadRequestRequest extends WriteRequest
{
    protected ?string $dto = CreateUploadRequestResponseDTO::class;

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
        return '/v1/adp/images';
    }
}
