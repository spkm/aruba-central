<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Classic\Data\CloudConnect\VlanIpListItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get configured vlan list for each cloud connect endpoint.: GET /cloud-connect/vlan-cfg.
 *
 * Query parameters (* required): group*.
 */
class GetArubaCloudVpnConnectVlanCfgRequest extends ListRequest
{
    protected ?string $dto = VlanIpListItem::class;

    public string $resultKey = 'vlan_ip_list';

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
        return '/cloud-connect/vlan-cfg';
    }
}
