<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\LocationObj;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get location of a specific rogue access point: GET /visualrf_api/v1/rogue_location/{macaddr}.
 *
 * Query options: units.
 */
class GetVisualrfApiV1RogueLocationMacaddrRequest extends ItemRequest
{
    protected ?string $dto = LocationObj::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macaddr, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/rogue_location/'.rawurlencode((string) $this->macaddr);
    }
}
