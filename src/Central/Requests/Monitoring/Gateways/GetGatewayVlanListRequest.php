<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayVlanItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Gateway VLANs: GET /network-monitoring/v1/gateways/{serial-number}/vlans.
 *
 * Query parameters: filter, sort.
 */
class GetGatewayVlanListRequest extends ListRequest
{
    protected ?string $dto = GatewayVlanItem::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/vlans';
    }
}
