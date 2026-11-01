<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\CloudAuth\UploadStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Upload file: POST /cloudauth/api/v3/bulk/{upload_type}.
 *
 * Query options: ssid.
 *
 * Body: file.
 */
class Uploadv3Request extends WriteRequest
{
    protected ?string $dto = UploadStatus::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $uploadType, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/bulk/'.rawurlencode((string) $this->uploadType);
    }
}
