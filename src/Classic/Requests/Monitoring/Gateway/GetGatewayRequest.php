<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\MCDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gateway Details: GET /monitoring/v1/gateways/{serial}.
 *
 * Query options: stats_metric.
 */
class GetGatewayRequest extends ItemRequest
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
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial);
    }
}
