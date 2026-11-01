<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\Solution;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get solution of a specific Radio MAC: GET /network-services/v1/airmatch-solutions/{radio-mac}.
 *
 * Query options: count, start-at, end-at, runmode, id.
 */
class GetRadioSolutionRequest extends ItemRequest
{
    protected ?string $dto = Solution::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-solutions/'.rawurlencode((string) $this->radioMac);
    }
}
