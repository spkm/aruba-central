<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\AccessPoint;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get an Access Point details: GET /network-monitoring/v1/aps/{serial-number}.
 */
class GetAccessPointDetailsRequest extends ItemRequest
{
    protected ?string $dto = AccessPoint::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber);
    }
}
