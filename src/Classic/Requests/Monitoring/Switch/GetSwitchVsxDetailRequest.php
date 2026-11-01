<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\VSXInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get switch vsx info for CX switch: GET /monitoring/v1/cx_switches/{serial}/vsx.
 */
class GetSwitchVsxDetailRequest extends ItemRequest
{
    protected ?string $dto = VSXInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/cx_switches/'.rawurlencode((string) $this->serial).'/vsx';
    }
}
