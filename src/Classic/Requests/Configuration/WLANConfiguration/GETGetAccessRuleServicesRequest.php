<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\AccessRuleServices;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get WLAN access rule services.: GET /configuration/v1/wlan/{group_name_or_guid_or_serial_number}/access_rule_services.
 */
class GETGetAccessRuleServicesRequest extends ItemRequest
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
        return '/configuration/v1/wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/access_rule_services';
    }
}
