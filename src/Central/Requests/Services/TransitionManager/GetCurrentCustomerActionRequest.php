<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use spkm\ArubaCentral\Central\Data\Services\CurrentCustomerAction;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the current customer transition action: GET /network-services/v1/tms-current-customer-action.
 */
class GetCurrentCustomerActionRequest extends ItemRequest
{
    protected ?string $dto = CurrentCustomerAction::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/tms-current-customer-action';
    }
}
