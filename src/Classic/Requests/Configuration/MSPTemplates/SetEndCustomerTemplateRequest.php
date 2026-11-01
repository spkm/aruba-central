<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update end customer level template.: PUT /configuration/v2/msp/templates/customer/{cid}.
 *
 * Body: template.
 */
class SetEndCustomerTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $cid, protected string $deviceType, protected string $version, protected string $model, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/msp/templates/customer/'.rawurlencode((string) $this->cid);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, 'version' => $this->version, 'model' => $this->model, ...parent::defaultQuery()];
    }
}
