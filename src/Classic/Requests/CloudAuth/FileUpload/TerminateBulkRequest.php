<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\CloudAuth\UploadStatus;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Terminate Upload: PUT /cloudauth/api/v3/bulk/{upload_type}/terminate.
 *
 * Query options: ssid.
 */
class TerminateBulkRequest extends ActionRequest
{
    protected ?string $dto = UploadStatus::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $uploadType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/bulk/'.rawurlencode((string) $this->uploadType).'/terminate';
    }
}
