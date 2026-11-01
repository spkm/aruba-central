<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\ArmData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get ARM configuration.: GET /configuration/v1/arm/{group_name_or_guid_or_serial_number}.
 */
class GetArmConfigRequest extends ItemRequest
{
    protected ?string $dto = ArmData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/arm/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
