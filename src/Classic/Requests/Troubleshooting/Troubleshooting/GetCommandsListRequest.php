<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use spkm\ArubaCentral\Classic\Data\Troubleshooting\Command;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Troubleshooting Commands: GET /troubleshooting/v1/commands.
 *
 * Query parameters (* required): device_type*.
 */
class GetCommandsListRequest extends ListRequest
{
    protected ?string $dto = Command::class;

    public string $resultKey = 'commands';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/commands';
    }
}
