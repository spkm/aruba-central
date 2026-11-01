<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\FullWlanListData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get WLAN list of an UI group.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}.
 */
class GetWlanListRequest extends ItemRequest
{
    protected ?string $dto = FullWlanListData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
