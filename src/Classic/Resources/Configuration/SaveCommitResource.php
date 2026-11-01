<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\GetDeviceAutoCommitState;
use spkm\ArubaCentral\Classic\Data\Configuration\GetGroupAutoCommitState;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\CommitDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\CommitGroupConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\GetDeviceSerialsAutoCommitStateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\GetGroupsAutoCommitStateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\SetDeviceSerialsAutoCommitStateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\SetGroupsAutoCommitStateRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Save Commit API, from Aruba::configuration()->saveCommit().
 *
 * @extends BaseResource<Data>
 */
class SaveCommitResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Commit configurations for given devices.: POST /configuration/v1/commit/devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function commitDeviceConfig(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CommitDeviceConfigRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Commit configurations for given groups.: POST /configuration/v1/commit/groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function commitGroupConfig(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CommitGroupConfigRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get auto commit state as either On or Off for device serials.: GET /configuration/v1/auto_commit_state/devices.
     *
     * @return ListResource<GetDeviceAutoCommitState>
     */
    public function getDeviceSerialsAutoCommitState(): ListResource
    {
        return new ListResource($this->connector, GetDeviceAutoCommitState::class, fn (Query $query) => new GetDeviceSerialsAutoCommitStateRequest($query));
    }

    /**
     * Get auto commit state as either On or Off at group level.: GET /configuration/v1/auto_commit_state/groups.
     *
     * @return ListResource<GetGroupAutoCommitState>
     */
    public function getGroupsAutoCommitState(): ListResource
    {
        return new ListResource($this->connector, GetGroupAutoCommitState::class, fn (Query $query) => new GetGroupsAutoCommitStateRequest($query));
    }

    /**
     * Set auto commit state as either On or Off for given devices.: POST /configuration/v1/auto_commit_state/devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceSerialsAutoCommitState(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetDeviceSerialsAutoCommitStateRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Set auto commit state as either On or Off at group level.: POST /configuration/v1/auto_commit_state/groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setGroupsAutoCommitState(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetGroupsAutoCommitStateRequest($this->payloadOf($attributes), $options));
    }
}
