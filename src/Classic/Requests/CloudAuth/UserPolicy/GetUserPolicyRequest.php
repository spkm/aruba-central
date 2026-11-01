<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy;

use spkm\ArubaCentral\Classic\Data\CloudAuth\UserPolicy;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Fetch policy that allows wireless network access for users.: GET /cloudAuth/api/v1/user_policy.
 */
class GetUserPolicyRequest extends ItemRequest
{
    protected ?string $dto = UserPolicy::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v1/user_policy';
    }
}
