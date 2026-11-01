<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile;

use spkm\ArubaCentral\Classic\Data\Iot\Profile;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Find transport profiles: GET /v1/transport_profiles.
 *
 * Query parameters: collectorId, groupId, page, size, sort.
 */
class FindTransportProfilesRequest extends ListRequest
{
    protected ?string $dto = Profile::class;

    public string $resultKey = 'content';

    public ?string $totalKey = 'totalElements';

    public string $paging = self::PAGE;

    public string $limitParameter = 'size';

    public int $firstPage = 0;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/transport_profiles';
    }
}
