<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchStackVlanItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get vlan info of the switch stack: GET /monitoring/v1/switch_stacks/{stack_id}/vlan.
 *
 * Query parameters: name, id, tagged_port, untagged_port, is_jumbo_enabled, is_voice_enabled, is_igmp_enabled, type, primary_vlan_id, status, sort, calculate_total.
 */
class GetSwitchStackVlanRequest extends ListRequest
{
    protected ?string $dto = SwitchStackVlanItem::class;

    public string $resultKey = 'vlans';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $stackId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/switch_stacks/'.rawurlencode((string) $this->stackId).'/vlan';
    }
}
