<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Statically assign Mobility Master to Mobility Device.: POST /device_management/v1/mobility_master/{device_serial}/{mm_name}.
 */
class StaticMdMmAssignRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, protected string $mmName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device_management/v1/mobility_master/'.rawurlencode((string) $this->deviceSerial).'/'.rawurlencode((string) $this->mmName);
    }
}
