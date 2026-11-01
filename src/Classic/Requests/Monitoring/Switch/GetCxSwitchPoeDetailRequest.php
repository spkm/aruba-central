<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\CXPortPoeInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get switch port poe info for CX switch: GET /monitoring/v1/cx_switches/{serial}/poe_detail.
 */
class GetCxSwitchPoeDetailRequest extends ItemRequest
{
    protected ?string $dto = CXPortPoeInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, protected string $port, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/cx_switches/'.rawurlencode((string) $this->serial).'/poe_detail';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['port' => $this->port, ...parent::defaultQuery()];
    }
}
