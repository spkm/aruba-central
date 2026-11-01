<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PersonaAssignment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Assign device function to a list of devices.: POST /network-config/v1alpha1/persona-assignment/{device-function}.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: device-function, device-id, device-id-list-v2.
 */
class CreatePersonaAssignmentPersonaDeviceListByIDRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceFunction, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/persona-assignment/'.rawurlencode((string) $this->deviceFunction);
    }
}
