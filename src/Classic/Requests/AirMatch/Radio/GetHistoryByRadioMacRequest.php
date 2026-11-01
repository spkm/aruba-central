<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\RadioHistoryList;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get history of a specific radio MAC: GET /telemetry/v1/history/{radio_mac}/{band}.
 *
 * Query options: tenant_id.
 */
class GetHistoryByRadioMacRequest extends ItemRequest
{
    protected ?string $dto = RadioHistoryList::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, protected string $band, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/history/'.rawurlencode((string) $this->radioMac).'/'.rawurlencode((string) $this->band);
    }
}
