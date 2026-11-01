<?php

namespace spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Un-claim domain: DELETE /platform/aaa_config/v2/authentication/idp/source/{domain}.
 */
class DeleteDomainRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $domain, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/aaa_config/v2/authentication/idp/source/'.rawurlencode((string) $this->domain);
    }
}
