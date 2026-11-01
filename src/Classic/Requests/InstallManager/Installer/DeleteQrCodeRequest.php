<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a QR code: DELETE /v1/vendor.
 */
class DeleteQrCodeRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/vendor';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['id' => $this->id, ...parent::defaultQuery()];
    }
}
