<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PolicyGroup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create policy-group-list by name: POST /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: description, name, position.
 */
class CreatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/'.rawurlencode((string) $this->name);
    }
}
