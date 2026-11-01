<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get MSP customer level template text.: GET /configuration/v1/msp/templates/{device_type}/{version}/{model}.
 */
class GetMspCustomerTemplateTextRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceType, protected string $version, protected string $model, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/msp/templates/'.rawurlencode((string) $this->deviceType).'/'.rawurlencode((string) $this->version).'/'.rawurlencode((string) $this->model);
    }
}
