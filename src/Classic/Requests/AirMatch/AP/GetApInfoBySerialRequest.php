<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Classic\Data\AirMatch\FeasApInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get feasibility ap info of a specific AP ethernet MAC: GET /feasibility/v1/ap_info/{ap_serial}.
 *
 * Query options: tenant_id.
 */
class GetApInfoBySerialRequest extends ItemRequest
{
    protected ?string $dto = FeasApInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $apSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/feasibility/v1/ap_info/'.rawurlencode((string) $this->apSerial);
    }
}
