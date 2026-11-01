<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Classic\Data\AirMatch\DeviceCfg;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns device (AP) running configuration: GET /receiver/v1/device_config/{ap_serial}.
 *
 * Query options: tenant_id.
 */
class GETGetDeviceConfigRequest extends ItemRequest
{
    protected ?string $dto = DeviceCfg::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $apSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/receiver/v1/device_config/'.rawurlencode((string) $this->apSerial);
    }
}
