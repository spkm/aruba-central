<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchListSingle;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Switches: GET /monitoring/v1/switches.
 *
 * Query parameters: group, label, stack_id, status, fields, calculate_total, show_resource_details, calculate_client_count, public_ip_address, site, sort.
 */
class GetSwitchesRequest extends ListRequest
{
    protected ?string $dto = SwitchListSingle::class;

    public string $resultKey = 'switches';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/switches';
    }
}
