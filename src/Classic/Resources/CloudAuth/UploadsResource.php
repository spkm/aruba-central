<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\UploadStatus;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\ErrorBulkRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\StatusBulkRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\TerminateBulkRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\Uploadv3Request;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The File Upload API, from Aruba::cloudAuth()->uploads().
 *
 * @extends BaseResource<Data>
 */
class UploadsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Upload file: POST /cloudauth/api/v3/bulk/{upload_type}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function upload(string $uploadType, array|Data $attributes = [], array $options = []): ?UploadStatus
    {
        return $this->fetch(new Uploadv3Request($uploadType, $this->payloadOf($attributes), $options));
    }

    /**
     * Read errors in last file upload: GET /cloudauth/api/v3/bulk/{upload_type}/error.
     *
     * @param  array<string, mixed>  $options
     */
    public function errors(string $uploadType, array $options = []): mixed
    {
        return $this->fetch(new ErrorBulkRequest($uploadType, $options));
    }

    /**
     * Read upload status of last file upload: GET /cloudauth/api/v3/bulk/{upload_type}/status.
     *
     * @param  array<string, mixed>  $options
     */
    public function status(string $uploadType, array $options = []): ?UploadStatus
    {
        return $this->fetch(new StatusBulkRequest($uploadType, $options));
    }

    /**
     * Terminate Upload: PUT /cloudauth/api/v3/bulk/{upload_type}/terminate.
     *
     * @param  array<string, mixed>  $options
     */
    public function terminate(string $uploadType, array $options = []): ?UploadStatus
    {
        return $this->fetch(new TerminateBulkRequest($uploadType, $options));
    }
}
