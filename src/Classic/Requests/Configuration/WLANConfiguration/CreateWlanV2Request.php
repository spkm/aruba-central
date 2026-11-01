<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a new WLAN.: POST /configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}.
 *
 * Body: wlan.
 */
class CreateWlanV2Request extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $wlanName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/wlan/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->wlanName);
    }
}
