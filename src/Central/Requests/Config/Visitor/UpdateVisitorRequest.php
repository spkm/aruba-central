<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Visitor;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaUser;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update visitor account: PUT /network-config/v1alpha1/cnac-visitor.
 *
 * Body: input.
 */
class UpdateVisitorRequest extends WriteRequest
{
    protected ?string $dto = CdaUser::class;

    protected Method $method = Method::PUT;

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
