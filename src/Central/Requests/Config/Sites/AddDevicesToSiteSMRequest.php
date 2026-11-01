<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Sites;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\DeviceMoveSiteSMSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add devices to site: POST /network-config/v1/site-add-devices.
 *
 * Body: desScopeId, devices.
 */
class AddDevicesToSiteSMRequest extends WriteRequest
{
    protected ?string $dto = DeviceMoveSiteSMSchema::class;

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
        return '/network-config/v1/site-add-devices';
    }
}
