<?php

namespace spkm\ArubaCentral\Central\Requests\Config\StaticTags;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaStaticTagsUsage;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Get static tags usage information: POST /network-config/v1alpha1/cnac-static-tags/usage.
 *
 * Body: input.
 */
class GetStaticTagsUsageRequest extends WriteRequest
{
    protected ?string $dto = CdaStaticTagsUsage::class;

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
        return '/network-config/v1alpha1/cnac-static-tags/usage';
    }
}
