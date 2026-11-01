<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create new configuration backup for multiple groups.: POST /configuration/v1/groups/snapshot/backups.
 *
 * Body: backup_name, do_not_delete, include_groups, exclude_groups.
 */
class CreateSnapshotsForMultipleGroupsRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/snapshot/backups';
    }
}
