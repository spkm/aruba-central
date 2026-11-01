<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy;

use spkm\ArubaCentral\Classic\Data\CloudAuth\ClientPolicy;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Fetch network access policy for registered clients.: GET /cloudAuth/api/v1/client_policy.
 */
class GetClientPolicyRequest extends ItemRequest
{
    protected ?string $dto = ClientPolicy::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v1/client_policy';
    }
}
