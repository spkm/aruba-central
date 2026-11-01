<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PolicyGroup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create policy-groups: POST /network-config/v1alpha1/policy-groups.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: policy-group.
 */
class CreatePolicyGroupsRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

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
        return '/network-config/v1alpha1/policy-groups';
    }
}
