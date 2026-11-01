<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKNetworkConfig;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Read all configured MPSK networks.: GET /cloudAuth/api/v2/mpsk.
 */
class GetMpskRequest extends ListRequest
{
    protected ?string $dto = MPSKNetworkConfig::class;

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
        return '/cloudAuth/api/v2/mpsk';
    }
}
