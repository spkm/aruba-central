<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\FullWlanData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get WLAN default configuration.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}/template.
 */
class GetWlanTemplateRequest extends ItemRequest
{
    protected ?string $dto = FullWlanData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/template';
    }
}
