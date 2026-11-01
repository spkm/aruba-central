<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Visitor;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaUser;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add visitor account: POST /network-config/v1alpha1/cnac-visitor.
 *
 * Body: input.
 */
class CreateVisitorRequest extends WriteRequest
{
    protected ?string $dto = CdaUser::class;

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
        return '/network-config/v1alpha1/cnac-visitor';
    }
}
