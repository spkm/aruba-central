<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Guest\GuestReprovision;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Provision cloud guest for current customer: POST /guest/v1/reprovision.
 */
class GetApiGuestReProvisionRequest extends ActionRequest
{
    protected ?string $dto = GuestReprovision::class;

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
        return '/guest/v1/reprovision';
    }
}
