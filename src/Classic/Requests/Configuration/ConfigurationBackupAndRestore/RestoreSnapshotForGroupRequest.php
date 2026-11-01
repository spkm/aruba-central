<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Restore configuration backup of a group.: POST /configuration/v1/groups/{group}/snapshots/{snapshot}/restore.
 */
class RestoreSnapshotForGroupRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, protected string $snapshot, protected string $deviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group).'/snapshots/'.rawurlencode((string) $this->snapshot).'/restore';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, ...parent::defaultQuery()];
    }
}
