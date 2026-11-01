<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\ApiGroupsGetGroupsPropertiesItem;
use spkm\ArubaCentral\Classic\Data\Configuration\ApiGroupsGetGroupsTemplateDataItem;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\CloneGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\CreateGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\CreateGroupV3Request;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\DeleteGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\GetGroupsPropertiesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\GetGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\GetGroupsTemplateDataRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\PreProvisionGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\UpdateGroupPropertiesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Groups API, from Aruba::configuration()->groups().
 *
 * @extends Builder<Data>
 */
class GroupsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGroupsRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateGroupV3Request($body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteGroupRequest((string) $id, $options);
    }

    /**
     * Clone and create new group.: POST /configuration/v2/groups/clone.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function cloneGroup(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CloneGroupRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Create new group.: POST /configuration/v2/groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createWithoutProperties(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateGroupRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get properties set for groups.: GET /configuration/v1/groups/properties.
     *
     * @return ListResource<ApiGroupsGetGroupsPropertiesItem>
     */
    public function properties(): ListResource
    {
        return new ListResource($this->connector, ApiGroupsGetGroupsPropertiesItem::class, fn (Query $query) => new GetGroupsPropertiesRequest($query));
    }

    /**
     * Get configuration mode set per device type for groups.: GET /configuration/v2/groups/template_info.
     *
     * @return ListResource<ApiGroupsGetGroupsTemplateDataItem>
     */
    public function templateInfo(): ListResource
    {
        return new ListResource($this->connector, ApiGroupsGetGroupsTemplateDataItem::class, fn (Query $query) => new GetGroupsTemplateDataRequest($query));
    }

    /**
     * Pre Provision a group to the device: POST /configuration/v1/preassign.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function preProvision(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PreProvisionGroupRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update properties for the given group.: PATCH /configuration/v2/groups/{group}/properties.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateProperties(string $group, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateGroupPropertiesRequest($group, $this->payloadOf($attributes), $options));
    }
}
