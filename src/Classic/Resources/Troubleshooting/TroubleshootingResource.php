<?php

namespace spkm\ArubaCentral\Classic\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\ActionCommand;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\Command;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfig;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfigBackupOutput;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfigListItem;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootOutput;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootResp;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootSessionId;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\ClearTroubleshootingSessionRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetCommandsListRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetCxcommandsListRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetNamedBackupsForSerialPrefixRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetNamedBackupsForSerialRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetRunningConfigBackupWithNameRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetSessionIdRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetTroubleshootOutputRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\PostRunningConfigBackupGroupNameRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\PostRunningConfigBackupSerialRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\SendEnrollPkiCertificateSwitchRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\StartCxTroubleshootRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\StartTroubleshootRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Troubleshooting API, from Aruba::troubleshooting().
 *
 * @extends BaseResource<Data>
 */
class TroubleshootingResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Action command for enroll est certificate: POST /tools/action_cmd/device/{serial}/enroll_est_cert.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function sendEnrollPkiCertificateSwitch(string $serial, array|Data $attributes = [], array $options = []): ?ActionCommand
    {
        return $this->fetch(new SendEnrollPkiCertificateSwitchRequest($serial, $this->payloadOf($attributes), $options));
    }

    /**
     * Clear Troubleshooting Session: DELETE /troubleshooting/v1/devices/{serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function clearTroubleshootingSession(string $serial, int $sessionId, array $options = []): mixed
    {
        return $this->fetch(new ClearTroubleshootingSessionRequest($serial, $sessionId, $options));
    }

    /**
     * List Troubleshooting Commands: GET /troubleshooting/v1/commands.
     *
     * @return ListResource<Command>
     */
    public function getCommandsList(): ListResource
    {
        return new ListResource($this->connector, Command::class, fn (Query $query) => new GetCommandsListRequest($query));
    }

    /**
     * List Troubleshooting CX Commands: GET /troubleshooting/v1/cxcommands.
     *
     * @return ListResource<Data>
     */
    public function getCxcommandsList(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetCxcommandsListRequest($query));
    }

    /**
     * Get list of backups associated with the device serial: GET /troubleshooting/v1/running-config-backup/serial/{serial}.
     *
     * @return ListResource<RunningConfigListItem>
     */
    public function getNamedBackupsForSerial(string $serial): ListResource
    {
        return new ListResource($this->connector, RunningConfigListItem::class, fn (Query $query) => new GetNamedBackupsForSerialRequest($serial, $query));
    }

    /**
     * Get list of backups associated with the device serial with the given prefix: GET /troubleshooting/v1/running-config-backup/serial/{serial}/prefix/{prefix}.
     *
     * @return ListResource<RunningConfigListItem>
     */
    public function getNamedBackupsForSerialPrefix(string $serial, string $prefix): ListResource
    {
        return new ListResource($this->connector, RunningConfigListItem::class, fn (Query $query) => new GetNamedBackupsForSerialPrefixRequest($serial, $prefix, $query));
    }

    /**
     * Fetch the backup stored against the given name: GET /troubleshooting/v1/running-config-backup/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRunningConfigBackupWithName(string $name, array $options = []): ?RunningConfigBackupOutput
    {
        return $this->fetch(new GetRunningConfigBackupWithNameRequest($name, $options));
    }

    /**
     * Get Troubleshooting Session ID: GET /troubleshooting/v1/devices/{serial}/session.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSessionId(string $serial, array $options = []): ?TroubleshootSessionId
    {
        return $this->fetch(new GetSessionIdRequest($serial, $options));
    }

    /**
     * Get Troubleshooting Output: GET /troubleshooting/v1/devices/{serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getTroubleshootOutput(string $serial, int $sessionId, array $options = []): ?TroubleshootOutput
    {
        return $this->fetch(new GetTroubleshootOutputRequest($serial, $sessionId, $options));
    }

    /**
     * Initiate Running Config Backup For All Devices In A Group: POST /troubleshooting/v1/running-config-backup/group_name/{group_name}/prefix/{prefix}.
     *
     * @param  array<string, mixed>  $options
     */
    public function postRunningConfigBackupGroupName(string $groupName, string $prefix, array $options = []): ?RunningConfig
    {
        return $this->fetch(new PostRunningConfigBackupGroupNameRequest($groupName, $prefix, $options));
    }

    /**
     * Initiate Running Config Backup For A Single Device: POST /troubleshooting/v1/running-config-backup/serial/{serial}/prefix/{prefix}.
     *
     * @param  array<string, mixed>  $options
     */
    public function postRunningConfigBackupSerial(string $serial, string $prefix, array $options = []): ?RunningConfig
    {
        return $this->fetch(new PostRunningConfigBackupSerialRequest($serial, $prefix, $options));
    }

    /**
     * Start Troubleshooting Session For CX Device: POST /troubleshooting/v1/cxdevices/{serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function startCxTroubleshoot(string $serial, array|Data $attributes = [], array $options = []): ?TroubleshootResp
    {
        return $this->fetch(new StartCxTroubleshootRequest($serial, $this->payloadOf($attributes), $options));
    }

    /**
     * Start Troubleshooting Session: POST /troubleshooting/v1/devices/{serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function startTroubleshoot(string $serial, array|Data $attributes = [], array $options = []): ?TroubleshootResp
    {
        return $this->fetch(new StartTroubleshootRequest($serial, $this->payloadOf($attributes), $options));
    }
}
