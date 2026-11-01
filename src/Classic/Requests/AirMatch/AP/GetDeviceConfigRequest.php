<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Classic\Data\AirMatch\DeviceCfg;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns device (AP) running configuration: GET /feasibility/v1/device_config/{ap_serial}.
 *
 * Query options: tenant_id.
 */
class GetDeviceConfigRequest extends ItemRequest
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
        return '/feasibility/v1/device_config/'.rawurlencode((string) $this->apSerial);
    }
}
