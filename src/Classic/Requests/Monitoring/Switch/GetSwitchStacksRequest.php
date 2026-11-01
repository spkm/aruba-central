<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\StackDetail;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Switch Stacks: GET /monitoring/v1/switch_stacks.
 *
 * Query parameters: hostname, group.
 */
class GetSwitchStacksRequest extends ListRequest
{
    protected ?string $dto = StackDetail::class;

    public string $resultKey = 'stacks';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/switch_stacks';
    }
}
