<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedStatRadio;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get information about radio: GET /telemetry/v1/adv_stat_radio.
 *
 * Query options: tenant_id.
 */
class GetAdvancedStatRadioRequest extends ItemRequest
{
    protected ?string $dto = AdvancedStatRadio::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/telemetry/v1/adv_stat_radio';
    }
}
