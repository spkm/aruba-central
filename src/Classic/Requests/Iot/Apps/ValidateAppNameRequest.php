<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use spkm\ArubaCentral\Classic\Data\Iot\ValidateAppNameDTO;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Validate App Name: GET /v1/adp/apps/name.
 *
 * Query options: app_id.
 */
class ValidateAppNameRequest extends ItemRequest
{
    protected ?string $dto = ValidateAppNameDTO::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adp/apps/name';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['name' => $this->name, ...parent::defaultQuery()];
    }
}
