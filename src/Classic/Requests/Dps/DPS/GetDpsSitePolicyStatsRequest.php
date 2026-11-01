<?php

namespace spkm\ArubaCentral\Classic\Requests\Dps\DPS;

use spkm\ArubaCentral\Classic\Data\Dps\DpsSitePolicyStatsInternalData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gets DPS Compliance stats for a given Site.: GET /datapoints/v1/sdwan_site/site_policy_stats/{site_name}.
 *
 * Query parameters: from_timestamp, to_timestamp.
 */
class GetDpsSitePolicyStatsRequest extends ListRequest
{
    protected ?string $dto = DpsSitePolicyStatsInternalData::class;

    public string $resultKey = 'dps_site_policy_stats_data';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $siteName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/datapoints/v1/sdwan_site/site_policy_stats/'.rawurlencode((string) $this->siteName);
    }
}
