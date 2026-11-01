<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update an existing ap settings.: POST /configuration/v2/ap_settings/{serial_number}.
 *
 * Body: hostname, ip_address, zonename, achannel, atxpower, gchannel, gtxpower, dot11a_radio_disable, dot11g_radio_disable, usb_port_disable.
 */
class UpdateApSettingsRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/ap_settings/'.rawurlencode((string) $this->serialNumber);
    }
}
