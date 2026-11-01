<?php

namespace spkm\ArubaCentral\Central\Requests\Services\FCOResponseInformation;

use spkm\ArubaCentral\Central\Data\Services\FcoRespInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AFC channel data of a specific AP.: GET /network-services/v1/fco-resp-info/{serial-number}.
 */
class GetAfcRespInfoRequest extends ItemRequest
{
    protected ?string $dto = FcoRespInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/fco-resp-info/'.rawurlencode((string) $this->serialNumber);
    }
}
