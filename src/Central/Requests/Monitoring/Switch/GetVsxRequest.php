<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Central\Data\Monitoring\Vsx;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns VSX details for a specified switch serial number.: GET /network-monitoring/v1/switches/{serial-number}/vsx.
 */
class GetVsxRequest extends ItemRequest
{
    protected ?string $dto = Vsx::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/switches/'.rawurlencode((string) $this->serialNumber).'/vsx';
    }
}
