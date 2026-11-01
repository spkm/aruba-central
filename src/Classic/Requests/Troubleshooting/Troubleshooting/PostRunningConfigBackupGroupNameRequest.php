<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfig;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Initiate Running Config Backup For All Devices In A Group: POST /troubleshooting/v1/running-config-backup/group_name/{group_name}/prefix/{prefix}.
 */
class PostRunningConfigBackupGroupNameRequest extends ActionRequest
{
    protected ?string $dto = RunningConfig::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, protected string $prefix, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/running-config-backup/group_name/'.rawurlencode((string) $this->groupName).'/prefix/'.rawurlencode((string) $this->prefix);
    }
}
