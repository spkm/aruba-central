<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\ActionCommand;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Generic commands for swarm: POST /device_management/v1/swarm/{swarm_id}/action/{command}.
 */
class SendCommandToSwarmRequest extends ActionRequest
{
    protected ?string $dto = ActionCommand::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $swarmId, protected string $command, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device_management/v1/swarm/'.rawurlencode((string) $this->swarmId).'/action/'.rawurlencode((string) $this->command);
    }
}
