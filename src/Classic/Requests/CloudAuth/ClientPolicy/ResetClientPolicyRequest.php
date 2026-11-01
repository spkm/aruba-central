<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Reset Client Policy.: PUT /cloudauth/api/v3/client_policy/reset.
 */
class ResetClientPolicyRequest extends ActionRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deleteMAC, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/client_policy/reset';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['deleteMAC' => $this->deleteMAC, ...parent::defaultQuery()];
    }
}
