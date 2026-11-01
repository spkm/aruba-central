<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update MSP customer level template.: PUT /configuration/v2/msp/templates.
 *
 * Body: template.
 */
class SetMspCustomerTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
        return '/configuration/v2/msp/templates';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, 'version' => $this->version, 'model' => $this->model, ...parent::defaultQuery()];
    }
}
