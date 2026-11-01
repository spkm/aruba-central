<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\OperationResult;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create customer transition actions: POST /network-services/v1/tms-transition-actions.
 *
 * Body: customerIds, excluded, action.
 */
class SetCustomerActionRequest extends WriteRequest
{
    protected ?string $dto = OperationResult::class;

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
        return '/network-services/v1/tms-transition-actions';
    }
}
