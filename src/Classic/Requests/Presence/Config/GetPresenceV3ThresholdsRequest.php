<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\V2Thresholds;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * It retrieves RSSI threshold for passerby conversion, RSSI threshold for visitor conversion & dwelltime threshold for passerby to visitor conversion.: GET /presence/v3/config/thresholds.
 *
 * Query options: site_id.
 */
class GetPresenceV3ThresholdsRequest extends ItemRequest
{
    protected ?string $dto = V2Thresholds::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/presence/v3/config/thresholds';
    }
}
