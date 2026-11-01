<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile;

use spkm\ArubaCentral\Classic\Data\Iot\ProfileCount;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Count transport profiles: GET /v1/transport_profiles/count.
 *
 * Query parameters: collectorIds, groupId.
 */
class CountTransportProfilesRequest extends ListRequest
{
    protected ?string $dto = ProfileCount::class;

    public string $resultKey = '';

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
        return '/v1/transport_profiles/count';
    }
}
