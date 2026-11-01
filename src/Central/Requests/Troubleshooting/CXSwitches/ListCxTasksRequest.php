<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\TaskListEntry;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List active async tasks for a CX Switch: GET /network-troubleshooting/v1/cx/{serial-number}/list-tasks.
 */
class ListCxTasksRequest extends ListRequest
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
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/list-tasks';
    }
}
