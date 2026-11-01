<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get System Config.: GET /configuration/v1/system_config/{group_name_or_guid_or_serial_number}.
 */
class GetSystemConfigRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/system_config/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
