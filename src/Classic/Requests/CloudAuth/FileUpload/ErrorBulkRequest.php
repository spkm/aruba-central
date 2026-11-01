<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read errors in last file upload: GET /cloudauth/api/v3/bulk/{upload_type}/error.
 *
 * Query options: ssid.
 */
class ErrorBulkRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $uploadType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/bulk/'.rawurlencode((string) $this->uploadType).'/error';
    }
}
