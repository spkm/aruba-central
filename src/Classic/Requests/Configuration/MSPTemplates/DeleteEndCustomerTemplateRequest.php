<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete end customer template.: DELETE /configuration/v1/msp/templates/customer/{cid}/{device_type}/{version}/{model}.
 */
class DeleteEndCustomerTemplateRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $cid, protected string $deviceType, protected string $version, protected string $model, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/msp/templates/customer/'.rawurlencode((string) $this->cid).'/'.rawurlencode((string) $this->deviceType).'/'.rawurlencode((string) $this->version).'/'.rawurlencode((string) $this->model);
    }
}
