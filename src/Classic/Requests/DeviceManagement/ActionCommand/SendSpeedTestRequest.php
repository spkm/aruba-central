<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\ActionCommand;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Speed Test: POST /device_management/v1/device/{serial}/action/speedtest.
 *
 * Body: host, options.
 */
class SendSpeedTestRequest extends WriteRequest
{
    protected ?string $dto = ActionCommand::class;

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
        return '/device_management/v1/device/'.rawurlencode((string) $this->serial).'/action/speedtest';
    }
}
