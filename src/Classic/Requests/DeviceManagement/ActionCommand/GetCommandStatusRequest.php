<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use spkm\ArubaCentral\Classic\Data\DeviceManagement\CommandStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Status: GET /device_management/v1/status/{task_id}.
 */
class GetCommandStatusRequest extends ItemRequest
{
    protected ?string $dto = CommandStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device_management/v1/status/'.rawurlencode((string) $this->taskId);
    }
}
