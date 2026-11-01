<?php

namespace spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo;

use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNStats;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gets Top N Apprf Statistics (V2 Version): GET /apprf/datapoints/v2/topn_stats.
 *
 * Query options: count, group, group_id, cluster_id, label_id, site, metrics, swarm_id, serial, macaddr, metric_id, from_timestamp, to_timestamp.
 */
class GetTopNStatsRequest extends ItemRequest
{
    protected ?string $dto = ApprfTopNStats::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/apprf/datapoints/v2/topn_stats';
    }
}
