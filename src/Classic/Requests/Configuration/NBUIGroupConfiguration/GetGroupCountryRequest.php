<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\NBUIGroupConfiguration;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get country code set for group (For UI groups only, not supported for template groups).: GET /configuration/v1/{group}/country.
 */
class GetGroupCountryRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/'.rawurlencode((string) $this->group).'/country';
    }
}
