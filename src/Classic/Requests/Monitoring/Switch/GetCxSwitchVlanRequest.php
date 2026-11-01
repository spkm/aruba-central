<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\CXSwitchStackVlanItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get vlan info for CX switch: GET /monitoring/v1/cx_switches/{serial}/vlan.
 *
 * Query parameters: name, id, tagged_port, untagged_port, is_jumbo_enabled, is_voice_enabled, is_igmp_enabled, type, primary_vlan_id, status, sort, calculate_total.
 */
class GetCxSwitchVlanRequest extends ListRequest
{
    protected ?string $dto = CXSwitchStackVlanItem::class;

    public string $resultKey = 'vlans';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/cx_switches/'.rawurlencode((string) $this->serial).'/vlan';
    }
}
