<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Classic\Data\Monitoring\ChassisInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Switch Chassis Details: GET /monitoring/v1/switches/{serial}/chassis_info.
 */
class GetChassisInfoRequest extends ItemRequest
{
    protected ?string $dto = ChassisInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/switches/'.rawurlencode((string) $this->serial).'/chassis_info';
    }
}
