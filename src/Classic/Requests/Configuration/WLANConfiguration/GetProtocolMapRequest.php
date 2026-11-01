<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\ProtocolMap;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get WLAN access rule protocol map.: GET /configuration/full_wlan/{group_name_or_guid}/protocol_map.
 */
class GetProtocolMapRequest extends ItemRequest
{
    protected ?string $dto = ProtocolMap::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_wlan/'.rawurlencode((string) $this->groupNameOrGuid).'/protocol_map';
    }
}
