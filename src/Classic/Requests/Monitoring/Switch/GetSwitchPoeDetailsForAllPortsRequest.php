<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchPortsPoeList;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get switch poe info: GET /monitoring/v1/switches/{serial}/poe_details.
 *
 * Query options: port.
 */
class GetSwitchPoeDetailsForAllPortsRequest extends ItemRequest
{
    protected ?string $dto = SwitchPortsPoeList::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/switches/'.rawurlencode((string) $this->serial).'/poe_details';
    }
}
