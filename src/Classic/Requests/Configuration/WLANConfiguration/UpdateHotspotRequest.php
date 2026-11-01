<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update an existing hotspot.: PUT /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}.
 *
 * Body: value.
 */
class UpdateHotspotRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $hotspotName, protected string $modeName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_hotspot/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->hotspotName).'/'.rawurlencode((string) $this->modeName);
    }
}
