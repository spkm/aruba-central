<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfig;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Initiate Running Config Backup For A Single Device: POST /troubleshooting/v1/running-config-backup/serial/{serial}/prefix/{prefix}.
 */
class PostRunningConfigBackupSerialRequest extends ActionRequest
{
    protected ?string $dto = RunningConfig::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, protected string $prefix, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/running-config-backup/serial/'.rawurlencode((string) $this->serial).'/prefix/'.rawurlencode((string) $this->prefix);
    }
}
