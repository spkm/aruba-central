<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\WlanInfoWithClientCount;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a specific WLAN by name: GET /network-monitoring/v1/wlans/{wlan-name}.
 *
 * Query options: site-id, serial-number.
 */
class GetWlanRequest extends ItemRequest
{
    protected ?string $dto = WlanInfoWithClientCount::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $wlanName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/wlans/'.rawurlencode((string) $this->wlanName);
    }
}
