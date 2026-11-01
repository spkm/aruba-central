<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload;

use spkm\ArubaCentral\Classic\Data\CloudAuth\UploadStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read upload status of last file upload: GET /cloudauth/api/v3/bulk/{upload_type}/status.
 *
 * Query options: ssid.
 */
class StatusBulkRequest extends ItemRequest
{
    protected ?string $dto = UploadStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $uploadType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/bulk/'.rawurlencode((string) $this->uploadType).'/status';
    }
}
