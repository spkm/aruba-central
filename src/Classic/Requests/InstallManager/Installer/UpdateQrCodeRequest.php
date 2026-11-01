<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update a QR code: PATCH /v1/vendor.
 *
 * Body: allow_config, sites.
 */
class UpdateQrCodeRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
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
