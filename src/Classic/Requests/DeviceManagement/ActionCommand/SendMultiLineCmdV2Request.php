<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\ActionCommand;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Generic Action Command for bouncing interface or POE (power-over-ethernet) port: POST /device_management/v2/device/{serial}/action/{command}.
 *
 * Body: port.
 */
class SendMultiLineCmdV2Request extends WriteRequest
{
    protected ?string $dto = ActionCommand::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, protected string $command, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/device_management/v2/device/'.rawurlencode((string) $this->serial).'/action/'.rawurlencode((string) $this->command);
    }
}
