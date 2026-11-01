<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\ComplianceCheck;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * To check compliance: POST /v1/check_compliance.
 *
 * Body: device_type, faulty_device_serial, new_device_serial.
 */
class HandleCheckComplianceRequest extends WriteRequest
{
    protected ?string $dto = ComplianceCheck::class;

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
        return '/v1/check_compliance';
    }
}
