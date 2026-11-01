<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APSettings;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get an existing ap settings.: GET /configuration/v2/ap_settings/{serial_number}.
 */
class GetApSettingsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/ap_settings/'.rawurlencode((string) $this->serialNumber);
    }
}
