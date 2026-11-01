<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaPolicyGroupPolicyGroupsSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\CreatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\CreatePolicyGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\DeletePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\DeletePolicyGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\ReadPolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\ReadPolicyGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\ReplacePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\UpdatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\UpdatePolicyGroupsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Policy Group API, from Aruba::configuration()->policyGroups().
 *
 * @extends BaseResource<Data>
 */
class PolicyGroupsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create policy-groups: POST /network-config/v1alpha1/policy-groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createPolicyGroups(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreatePolicyGroupsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Create policy-group-list by name: POST /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createPolicyGroupsPolicyGroupPolicyGroupListByID(string $name, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete policy-groups: DELETE /network-config/v1alpha1/policy-groups.
     *
     * @param  array<string, mixed>  $options
     */
    public function deletePolicyGroups(array $options = []): mixed
    {
        return $this->fetch(new DeletePolicyGroupsRequest($options));
    }

    /**
     * Delete policy-group-list by name: DELETE /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deletePolicyGroupsPolicyGroupPolicyGroupListByID(string $name, array $options = []): mixed
    {
        return $this->fetch(new DeletePolicyGroupsPolicyGroupPolicyGroupListByIDRequest($name, $options));
    }

    /**
     * Read policy-groups: GET /network-config/v1alpha1/policy-groups.
     *
     * @param  array<string, mixed>  $options
     */
    public function readPolicyGroups(array $options = []): ?ArubaPolicyGroupPolicyGroupsSchemaGet
    {
        return $this->fetch(new ReadPolicyGroupsRequest($options));
    }

    /**
     * Read policy-group-list by name: GET /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function readPolicyGroupsPolicyGroupPolicyGroupListByID(string $name, array $options = []): ?ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet
    {
        return $this->fetch(new ReadPolicyGroupsPolicyGroupPolicyGroupListByIDRequest($name, $options));
    }

    /**
     * Replace policy-group-list by name: PUT /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replacePolicyGroupsPolicyGroupPolicyGroupListByID(string $name, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new ReplacePolicyGroupsPolicyGroupPolicyGroupListByIDRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Update policy-groups: PATCH /network-config/v1alpha1/policy-groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updatePolicyGroups(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new UpdatePolicyGroupsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update policy-group-list by name: PATCH /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updatePolicyGroupsPolicyGroupPolicyGroupListByID(string $name, array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new UpdatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest($name, $this->payloadOf($attributes), $options));
    }
}
