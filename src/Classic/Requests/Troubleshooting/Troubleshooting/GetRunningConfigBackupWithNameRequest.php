<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfigBackupOutput;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Fetch the backup stored against the given name: GET /troubleshooting/v1/running-config-backup/name/{name}.
 */
class GetRunningConfigBackupWithNameRequest extends ItemRequest
{
    protected ?string $dto = RunningConfigBackupOutput::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/running-config-backup/name/'.rawurlencode((string) $this->name);
    }
}
