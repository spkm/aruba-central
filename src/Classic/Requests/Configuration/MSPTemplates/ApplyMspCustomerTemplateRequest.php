<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Apply MSP customer level template to end customers. This would not apply template to template groups at end customer.: POST /configuration/v2/msp/templates/end_customers/{device_type}/{version}/{model}.
 *
 * Body: include_customers, exclude_customers.
 */
class ApplyMspCustomerTemplateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceType, protected string $version, protected string $model, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/msp/templates/end_customers/'.rawurlencode((string) $this->deviceType).'/'.rawurlencode((string) $this->version).'/'.rawurlencode((string) $this->model);
    }
}
