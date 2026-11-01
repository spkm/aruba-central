<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\FullWlanData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the information of an existing WLAN.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
 */
class GetWlanRequest extends ItemRequest
{
    protected ?string $dto = FullWlanData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $wlanName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->wlanName);
    }
}
