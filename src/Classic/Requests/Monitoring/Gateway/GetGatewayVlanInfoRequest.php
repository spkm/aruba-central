<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\GatewayVLANInfoItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway VLAN details: GET /monitoring/v1/gateways/{serial}/vlan.
 */
class GetGatewayVlanInfoRequest extends ListRequest
{
    protected ?string $dto = GatewayVLANInfoItem::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/vlan';
    }
}
