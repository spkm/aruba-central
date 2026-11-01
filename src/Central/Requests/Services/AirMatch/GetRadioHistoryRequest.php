<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\History;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get radio history of a specific Radio MAC: GET /network-services/v1/airmatch-history/{radio-mac}.
 *
 * Query options: start-at, end-at.
 */
class GetRadioHistoryRequest extends ItemRequest
{
    protected ?string $dto = History::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-history/'.rawurlencode((string) $this->radioMac);
    }
}
