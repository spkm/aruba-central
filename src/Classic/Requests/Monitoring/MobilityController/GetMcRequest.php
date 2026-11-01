<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController;

use spkm\ArubaCentral\Classic\Data\Monitoring\MCDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Mobility Controller Details: GET /monitoring/v2/mobility_controllers/{serial}.
 *
 * Query options: stats_metric.
 */
class GetMcRequest extends ItemRequest
{
    protected ?string $dto = MCDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/mobility_controllers/'.rawurlencode((string) $this->serial);
    }
}
