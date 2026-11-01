<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Switch Details: GET /monitoring/v1/switches/{serial}.
 */
class GetSwitchRequest extends ItemRequest
{
    protected ?string $dto = SwitchDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/switches/'.rawurlencode((string) $this->serial);
    }
}
