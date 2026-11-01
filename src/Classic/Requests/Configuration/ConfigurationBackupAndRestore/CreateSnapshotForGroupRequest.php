<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create new configuration backup for group.: POST /configuration/v1/groups/snapshot/{group}.
 *
 * Body: name, do_not_delete.
 */
class CreateSnapshotForGroupRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/snapshot/'.rawurlencode((string) $this->group);
    }
}
