<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\BoardLimit;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get board limits of a specific radio MAC for a given tenant: GET /network-services/v1/airmatch-board-limits/{serial-number}/radios/{radio-mac}.
 */
class GetRadioBoardLimitsRequest extends ItemRequest
{
    protected ?string $dto = BoardLimit::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-board-limits/'.rawurlencode((string) $this->serialNumber).'/radios/'.rawurlencode((string) $this->radioMac);
    }
}
