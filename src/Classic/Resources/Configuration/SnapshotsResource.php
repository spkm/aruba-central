<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\SnapshotInfo;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\CreateSnapshotForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\CreateSnapshotsForMultipleGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetBackupLogForSnapshotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetBackupStatusForSnapshotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetLastRestoreLogsForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetRestoreStatusForSnapshotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetSnapshotsForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\RestoreSnapshotForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\UpdateDoNotDeleteRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Configuration backup and restore API, from Aruba::configuration()->snapshots().
 *
 * @extends BaseResource<Data>
 */
class SnapshotsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create new configuration backup for group.: POST /configuration/v1/groups/snapshot/{group}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createSnapshotForGroup(string $group, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateSnapshotForGroupRequest($group, $this->payloadOf($attributes), $options));
    }

    /**
     * Create new configuration backup for multiple groups.: POST /configuration/v1/groups/snapshot/backups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createSnapshotsForMultipleGroups(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateSnapshotsForMultipleGroupsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get backup-log for the given configuration backup for the given group.: GET /configuration/v1/groups/{group}/snapshots/{snapshot}/backup_log.
     *
     * @param  array<string, mixed>  $options
     */
    public function getBackupLogForSnapshot(string $group, string $snapshot, array $options = []): mixed
    {
        return $this->fetch(new GetBackupLogForSnapshotRequest($group, $snapshot, $options));
    }

    /**
     * Get status of configuration backup for the given group.: GET /configuration/v1/groups/{group}/snapshots/{snapshot}/backup_status.
     *
     * @param  array<string, mixed>  $options
     */
    public function getBackupStatusForSnapshot(string $group, string $snapshot, array $options = []): mixed
    {
        return $this->fetch(new GetBackupStatusForSnapshotRequest($group, $snapshot, $options));
    }

    /**
     * Get last restore logs for the given group.: GET /configuration/v1/groups/{group}/last_restore_log.
     *
     * @param  array<string, mixed>  $options
     */
    public function getLastRestoreLogsForGroup(string $group, array $options = []): mixed
    {
        return $this->fetch(new GetLastRestoreLogsForGroupRequest($group, $options));
    }

    /**
     * Get status of configuration restore for the given group.: GET /configuration/v1/groups/{group}/snapshots/{snapshot}/restore_status.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRestoreStatusForSnapshot(string $group, string $snapshot, array $options = []): mixed
    {
        return $this->fetch(new GetRestoreStatusForSnapshotRequest($group, $snapshot, $options));
    }

    /**
     * Get all configuration backups for the given group.: GET /configuration/v1/groups/{group}/snapshots.
     *
     * @return ListResource<SnapshotInfo>
     */
    public function getSnapshotsForGroup(string $group): ListResource
    {
        return new ListResource($this->connector, SnapshotInfo::class, fn (Query $query) => new GetSnapshotsForGroupRequest($group, $query));
    }

    /**
     * Restore configuration backup of a group.: POST /configuration/v1/groups/{group}/snapshots/{snapshot}/restore.
     *
     * @param  array<string, mixed>  $options
     */
    public function restoreSnapshotForGroup(string $group, string $snapshot, string $deviceType, array $options = []): mixed
    {
        return $this->fetch(new RestoreSnapshotForGroupRequest($group, $snapshot, $deviceType, $options));
    }

    /**
     * Update do-not-delete flag for list of configuration backups for the given group.: PATCH /configuration/v1/groups/{group}/snapshots.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDoNotDelete(string $group, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateDoNotDeleteRequest($group, $this->payloadOf($attributes), $options));
    }
}
