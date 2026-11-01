<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Classic\Data\AirMatch\ApInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP info of a specific AP ethernet MAC: GET /telemetry/v1/ap_info/{ap_eth_mac}.
 *
 * Query options: tenant_id.
 */
class GetApInfoByEthMacRequest extends ItemRequest
{
    protected ?string $dto = ApInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $apEthMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/ap_info/'.rawurlencode((string) $this->apEthMac);
    }
}
