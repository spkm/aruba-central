<?php

namespace spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Resync device configurations: POST /network-config/v1alpha1/config-health/devices-resync.
 *
 * Body: serials.
 */
class ResyncCfgDevicesRequest extends WriteRequest
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
        return '/network-config/v1alpha1/config-health/devices-resync';
    }
}
