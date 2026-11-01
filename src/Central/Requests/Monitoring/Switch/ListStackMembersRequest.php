<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Central\Data\Monitoring\Stack;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of Stack Members: GET /network-monitoring/v1/stack/{serial-number}/members.
 */
class ListStackMembersRequest extends ListRequest
{
    protected ?string $dto = Stack::class;

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
        return '/network-monitoring/v1/stack/'.rawurlencode((string) $this->serialNumber).'/members';
    }
}
