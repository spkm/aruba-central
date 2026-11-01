<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\AP;

use spkm\ArubaCentral\Classic\Data\Monitoring\AP;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Access Points: GET /monitoring/v2/aps.
 *
 * Query parameters: group, swarm_id, label, site, status, serial, macaddr, model, cluster_id, fields, calculate_total, calculate_client_count, calculate_ssid_count, show_resource_details, sort.
 */
class GetApsRequest extends ListRequest
{
    protected ?string $dto = AP::class;

    public string $resultKey = 'aps';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/aps';
    }
}
