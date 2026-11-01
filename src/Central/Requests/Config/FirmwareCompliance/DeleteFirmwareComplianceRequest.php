<?php

namespace spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete firmware policy configuration.: DELETE /network-config/v1alpha1/firmware-compliance.
 *
 * Query options: object-type, scope-id, device-function.
 */
class DeleteFirmwareComplianceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/firmware-compliance';
    }
}
