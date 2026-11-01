<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwitch;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Top N Switches: GET /monitoring/v1/switches/bandwidth_usage/topn.
 *
 * Query parameters: group, label, stack_id, count, from_timestamp, to_timestamp.
 */
class GetBandwidthUsageTopnRequest extends ListRequest
{
    protected ?string $dto = TopNSwitch::class;

    public string $resultKey = 'switches';

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
        return '/monitoring/v1/switches/bandwidth_usage/topn';
    }
}
