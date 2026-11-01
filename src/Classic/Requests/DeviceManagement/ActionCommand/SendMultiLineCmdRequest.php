<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\ActionCommand;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Generic Action Command for bouncing interface or POE (power-over-ethernet) port: POST /device_management/v1/device/{serial}/action/{command}/port/{port}.
 */
class SendMultiLineCmdRequest extends ActionRequest
{
    protected ?string $dto = ActionCommand::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, protected string $command, protected string $port, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device_management/v1/device/'.rawurlencode((string) $this->serial).'/action/'.rawurlencode((string) $this->command).'/port/'.rawurlencode((string) $this->port);
    }
}
