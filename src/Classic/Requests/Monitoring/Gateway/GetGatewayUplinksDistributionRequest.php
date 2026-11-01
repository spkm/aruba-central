<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\UplinksDistribution;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway Uplink distribution: GET /monitoring/v1/gateways/{serial}/uplinks/distribution.
 */
class GetGatewayUplinksDistributionRequest extends ListRequest
{
    protected ?string $dto = UplinksDistribution::class;

    public string $resultKey = 'result';

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
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/uplinks/distribution';
    }
}
