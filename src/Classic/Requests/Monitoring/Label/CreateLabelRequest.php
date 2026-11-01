<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Monitoring\Label;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create Label: POST /central/v1/labels.
 *
 * Body: category_id, label_name.
 */
class CreateLabelRequest extends WriteRequest
{
    protected ?string $dto = Label::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/labels';
    }
}
