<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\APThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get throughput trend of an Access Point.: GET /network-monitoring/v1/aps/{serial-number}/throughput-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointThroughputRequest extends ItemRequest
{
    protected ?string $dto = APThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $interfaceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/throughput-trends';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['interface-type' => $this->interfaceType, ...parent::defaultQuery()];
    }
}
