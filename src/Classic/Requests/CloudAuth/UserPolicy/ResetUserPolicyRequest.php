<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Reset User Policy.: PUT /cloudauth/api/v3/user_policy/reset.
 */
class ResetUserPolicyRequest extends ActionRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deleteMPSK, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/user_policy/reset';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['deleteMPSK' => $this->deleteMPSK, ...parent::defaultQuery()];
    }
}
