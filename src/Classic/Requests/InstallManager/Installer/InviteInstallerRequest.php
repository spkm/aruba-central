<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Invite a new installer: POST /v1/invite_installer.
 *
 * Body: first_name, last_name, country_code, mobile_number, expire_at, allow_config, sites.
 */
class InviteInstallerRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/invite_installer';
    }
}
