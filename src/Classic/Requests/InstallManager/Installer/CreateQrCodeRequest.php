<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a QR code: POST /v1/vendor.
 *
 * Body: name, email_id, company, expire_at, allow_config, sites.
 */
class CreateQrCodeRequest extends WriteRequest
{
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
        return '/v1/vendor';
    }
}
