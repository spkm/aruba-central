<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ApInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP information of a specific AP Ethernet MAC: GET /network-services/v1/airmatch-aps/{serial-number}.
 */
class GetApInfoRequest extends ItemRequest
{
    protected ?string $dto = ApInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-aps/'.rawurlencode((string) $this->serialNumber);
    }
}
