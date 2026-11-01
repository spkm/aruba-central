<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\ReportRadio;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get reporting radio of a specific radio MAC: GET /telemetry/v1/reporting_radio/{radio_mac}.
 *
 * Query options: tenant_id.
 */
class GetRepRadioByRadioMacRequest extends ItemRequest
{
    protected ?string $dto = ReportRadio::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/reporting_radio/'.rawurlencode((string) $this->radioMac);
    }
}
