<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode;

use spkm\ArubaCentral\Classic\Data\Configuration\DeviceConfigMode;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get configuration mode as either Monitor or Managed mode for device serials.: GET /configuration/v1/mode/devices.
 *
 * Query parameters (* required): device_serials*.
 */
class GetDeviceSerialsConfigModeRequest extends ListRequest
{
    protected ?string $dto = DeviceConfigMode::class;

    public string $resultKey = 'data';

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/mode/devices';
    }
}
