<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the information of an existing hotspot.: GET /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}.
 */
class GetHotspotRequest extends ItemRequest
{
    protected ?string $dto = FullHotspotData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $hotspotName, protected string $modeName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_hotspot/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->hotspotName).'/'.rawurlencode((string) $this->modeName);
    }
}
