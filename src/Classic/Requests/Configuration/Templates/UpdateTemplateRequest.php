<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Templates;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update existing template.: PATCH /configuration/v1/groups/{group}/templates.
 *
 * Query options: device_type, version, model.
 *
 * Body: template.
 */
class UpdateTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, protected string $name, array|JsonSerializable $body = [], array $options = [])
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
        return ['name' => $this->name, ...parent::defaultQuery()];
    }
}
