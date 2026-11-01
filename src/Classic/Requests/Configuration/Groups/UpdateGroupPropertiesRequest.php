<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update properties for the given group.: PATCH /configuration/v2/groups/{group}/properties.
 *
 * Body: group_properties, template_info.
 */
class UpdateGroupPropertiesRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/groups/'.rawurlencode((string) $this->group).'/properties';
    }
}
