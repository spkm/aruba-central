<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\RadioProfile;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Dot11a radio profile.: GET /configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
 */
class GetDot11aRadioConfigByNameRequest extends ItemRequest
{
    protected ?string $dto = RadioProfile::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/dot11a_radio_profile/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->name);
    }
}
