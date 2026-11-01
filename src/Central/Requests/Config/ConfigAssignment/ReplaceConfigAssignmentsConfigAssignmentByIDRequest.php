<?php

namespace spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Replace config-assignment by scope-id, device-function, profile-type, profile-instance: PUT /network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: device-function, profile-instance, profile-type, scope-id.
 */
class ReplaceConfigAssignmentsConfigAssignmentByIDRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $scopeId, protected string $deviceFunction, protected string $profileType, protected string $profileInstance, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/config-assignments/'.rawurlencode((string) $this->scopeId).'/'.rawurlencode((string) $this->deviceFunction).'/'.rawurlencode((string) $this->profileType).'/'.rawurlencode((string) $this->profileInstance);
    }
}
