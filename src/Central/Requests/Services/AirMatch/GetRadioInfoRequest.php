<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\RadioInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get reporting radio information of a specific radio MAC: GET /network-services/v1/airmatch-radios/{radio-mac}.
 *
 * Query options: serial-number.
 */
class GetRadioInfoRequest extends ItemRequest
{
    protected ?string $dto = RadioInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-radios/'.rawurlencode((string) $this->radioMac);
    }
}
