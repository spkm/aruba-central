<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update system config.: POST /configuration/v1/system_config/{group_name_or_guid_or_serial_number}.
 *
 * Body: dns_server, ntp_server, username, password.
 */
class UpdateSystemConfigRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/system_config/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
