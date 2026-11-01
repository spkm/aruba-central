<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\WlanData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the information of an existing WLAN.: GET /configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
 */
class GetWlanV2Request extends ItemRequest
{
    protected ?string $dto = WlanData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $wlanName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->wlanName);
    }
}
