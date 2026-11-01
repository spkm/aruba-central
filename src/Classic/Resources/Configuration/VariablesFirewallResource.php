<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\DeleteVfwGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\DeleteVfwVariableRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\GetVfwGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\GetVfwVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\UpdateVfwGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\UpdateVfwVariablesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Variables firewall API, from Aruba::configuration()->variablesFirewall().
 *
 * @extends Builder<Data>
 */
class VariablesFirewallResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVfwGroupsRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new UpdateVfwGroupsRequest($body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteVfwGroupRequest((string) $id, $options);
    }

    /**
     * Delete variable from Variables Firewall whitelist.: DELETE /configuration/v1/variables_firewall/variables/{variable}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteVfwVariable(string $variable, array $options = []): mixed
    {
        return $this->fetch(new DeleteVfwVariableRequest($variable, $options));
    }

    /**
     * Get whitelisted variables in Variables Firewall.: GET /configuration/v1/variables_firewall/variables.
     *
     * @return ListResource<Data>
     */
    public function getVfwVariables(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetVfwVariablesRequest($query));
    }

    /**
     * Add variables to Variables Firewall whitelist.: POST /configuration/v1/variables_firewall/variables.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateVfwVariables(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateVfwVariablesRequest($this->payloadOf($attributes), $options));
    }
}
