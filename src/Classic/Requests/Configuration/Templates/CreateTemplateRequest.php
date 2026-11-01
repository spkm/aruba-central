<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Templates;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create new template.: POST /configuration/v1/groups/{group}/templates.
 *
 * Body: template.
 */
class CreateTemplateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, protected string $name, protected string $deviceType, protected string $version, protected string $model, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group).'/templates';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['name' => $this->name, 'device_type' => $this->deviceType, 'version' => $this->version, 'model' => $this->model, ...parent::defaultQuery()];
    }
}
