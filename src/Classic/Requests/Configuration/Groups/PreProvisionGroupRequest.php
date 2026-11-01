<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Pre Provision a group to the device: POST /configuration/v1/preassign.
 *
 * Body: device_id, group_name, tenant_id.
 */
class PreProvisionGroupRequest extends WriteRequest
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
        return '/configuration/v1/preassign';
    }
}
