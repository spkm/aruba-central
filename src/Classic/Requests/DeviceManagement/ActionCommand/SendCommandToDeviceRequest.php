<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\ActionCommand;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Generic commands for device: POST /device_management/v1/device/{serial}/action/{command}.
 */
class SendCommandToDeviceRequest extends ActionRequest
{
    protected ?string $dto = ActionCommand::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, protected string $command, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device_management/v1/device/'.rawurlencode((string) $this->serial).'/action/'.rawurlencode((string) $this->command);
    }
}
