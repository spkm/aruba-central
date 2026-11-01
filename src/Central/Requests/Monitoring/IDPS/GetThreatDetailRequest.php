<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\IDPS;

use spkm\ArubaCentral\Central\Data\Monitoring\ThreatDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get an IDPS threat's details: GET /network-monitoring/v1/threats/{id}.
 */
class GetThreatDetailRequest extends ItemRequest
{
    protected ?string $dto = ThreatDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, protected string $siteId, protected string $timeAt, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/threats/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['site-id' => $this->siteId, 'time-at' => $this->timeAt, ...parent::defaultQuery()];
    }
}
