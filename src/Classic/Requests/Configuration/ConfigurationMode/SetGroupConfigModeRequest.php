<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set configuration mode as either Monitor or Manage at group level.: POST /configuration/v1/mode/group.
 *
 * Body: groups, config_mode.
 */
class SetGroupConfigModeRequest extends WriteRequest
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
        return '/configuration/v1/mode/group';
    }
}
