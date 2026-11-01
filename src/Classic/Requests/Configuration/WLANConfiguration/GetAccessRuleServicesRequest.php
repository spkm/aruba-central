<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\AccessRuleServices;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get WLAN access rule services.: GET /configuration/full_wlan/{group_name_or_guid_or_serial_number}/access_rule_services.
 */
class GetAccessRuleServicesRequest extends ItemRequest
{
    protected ?string $dto = AccessRuleServices::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/full_wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/access_rule_services';
    }
}
