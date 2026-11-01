<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\OperationResult;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Flush cache: POST /network-services/v1/tms-cache-flushes.
 */
class FlushTransitionCacheRequest extends ActionRequest
{
    protected ?string $dto = OperationResult::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/tms-cache-flushes';
    }
}
