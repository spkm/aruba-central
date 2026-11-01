<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\CXSwitchPortsPoeList;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get switch poe info for CX switch: GET /monitoring/v1/cx_switches/{serial}/poe_details.
 *
 * Query options: port.
 */
class GetCxSwitchPoeDetailsForAllPortsRequest extends ItemRequest
{
    protected ?string $dto = CXSwitchPortsPoeList::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/cx_switches/'.rawurlencode((string) $this->serial).'/poe_details';
    }
}
