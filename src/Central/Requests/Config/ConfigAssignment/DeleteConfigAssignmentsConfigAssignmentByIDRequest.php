<?php

namespace spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete config-assignment by scope-id, device-function, profile-type, profile-instance: DELETE /network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}.
 */
class DeleteConfigAssignmentsConfigAssignmentByIDRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $scopeId, protected string $deviceFunction, protected string $profileType, protected string $profileInstance, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/config-assignments/'.rawurlencode((string) $this->scopeId).'/'.rawurlencode((string) $this->deviceFunction).'/'.rawurlencode((string) $this->profileType).'/'.rawurlencode((string) $this->profileInstance);
    }
}
