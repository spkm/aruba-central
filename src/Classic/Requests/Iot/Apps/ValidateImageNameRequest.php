<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use spkm\ArubaCentral\Classic\Data\Iot\ValidateImageNameDTO;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Validate Image Name: GET /v1/adp/images/validate.
 */
class ValidateImageNameRequest extends ItemRequest
{
    protected ?string $dto = ValidateImageNameDTO::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adp/images/validate';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['name' => $this->name, ...parent::defaultQuery()];
    }
}
