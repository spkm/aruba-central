<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotListData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get hotspot list of an UI group or swarm or device with mode name: GET /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{mode_name}.
 */
class GetHotspotListByModeNameRequest extends ItemRequest
{
    protected ?string $dto = FullHotspotListData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $modeName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_hotspot/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->modeName);
    }
}
