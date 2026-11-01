<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get QR code list: GET /v1/vendor.
 *
 * Query options: id.
 */
class GetAllQrCodesRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/vendor';
    }
}
