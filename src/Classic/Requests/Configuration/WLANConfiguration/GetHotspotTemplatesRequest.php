<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotTemplatetData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get hotspot default configuration.: GET /configuration/full_hotspot/{group_name_or_guid_or_serial_number}/template.
 */
class GetHotspotTemplatesRequest extends ItemRequest
{
    protected ?string $dto = FullHotspotTemplatetData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_hotspot/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/template';
    }
}
