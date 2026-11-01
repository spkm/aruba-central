<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Replace per AP setting.: POST /configuration/v1/ap_settings_cli/{serial_number}.
 *
 * Body: clis.
 */
class UpdateApSettingsClisRequest extends WriteRequest
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
        return '/configuration/v1/ap_settings_cli/'.rawurlencode((string) $this->serialNumber);
    }
}
