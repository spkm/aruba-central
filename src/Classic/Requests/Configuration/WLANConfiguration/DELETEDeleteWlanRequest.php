<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete an existing WLAN.: DELETE /configuration/v1/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
 */
class DELETEDeleteWlanRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $wlanName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->wlanName);
    }
}
