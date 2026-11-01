<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete variable from Variables Firewall whitelist.: DELETE /configuration/v1/variables_firewall/variables/{variable}.
 */
class DeleteVfwVariableRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $variable, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/variables_firewall/variables/'.rawurlencode((string) $this->variable);
    }
}
