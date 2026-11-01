<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TaskListEntry;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List active async tasks for a Gateway: GET /network-troubleshooting/v1/gateways/{serial-number}/list-tasks.
 */
class ListGwTasksRequest extends ListRequest
{
    protected ?string $dto = TaskListEntry::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/list-tasks';
    }
}
