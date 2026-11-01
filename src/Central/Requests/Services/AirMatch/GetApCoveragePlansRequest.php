<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ApCoveragePlan;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get ap coverage plan for a given AP serial number: GET /network-services/v1/airmatch-ap-coverage-plans/{serial-number}.
 *
 * Query options: id.
 */
class GetApCoveragePlansRequest extends ItemRequest
{
    protected ?string $dto = ApCoveragePlan::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-ap-coverage-plans/'.rawurlencode((string) $this->serialNumber);
    }
}
