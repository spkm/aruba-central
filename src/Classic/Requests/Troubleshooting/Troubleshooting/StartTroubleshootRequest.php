<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootResp;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Start Troubleshooting Session: POST /troubleshooting/v1/devices/{serial}.
 *
 * Body: device_type, commands.
 */
class StartTroubleshootRequest extends WriteRequest
{
    protected ?string $dto = TroubleshootResp::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/devices/'.rawurlencode((string) $this->serial);
    }
}
