<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Alerts;

use spkm\ArubaCentral\Central\Data\Notifications\AlertActionStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get async operation status: GET /network-notifications/v1/alerts/async-operations/{task-id}.
 */
class AlertActionStatusRequest extends ItemRequest
{
    protected ?string $dto = AlertActionStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $taskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/alerts/async-operations/'.rawurlencode((string) $this->taskId);
    }
}
