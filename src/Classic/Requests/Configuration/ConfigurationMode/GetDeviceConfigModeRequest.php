<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode;

use spkm\ArubaCentral\Classic\Data\Configuration\DeviceConfigMode;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get configuration mode as either Monitor or Managed mode at device level.: GET /configuration/v1/mode/device.
 *
 * Query parameters (* required): group*.
 */
class GetDeviceConfigModeRequest extends ListRequest
{
    protected ?string $dto = DeviceConfigMode::class;

    public string $resultKey = 'data';

    public ?int $maxLimit = 20;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/mode/device';
    }
}
