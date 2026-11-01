<?php

namespace spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create firmware policy configuration.: POST /network-config/v1alpha1/firmware-compliance.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: active-partition, allow-unsafe-upgrades, description, enable, enforcement-schedule, local-image-server-url, name, upgrade-mode, version-chart.
 */
class CreateFirmwareComplianceRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

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
        return '/network-config/v1alpha1/firmware-compliance';
    }
}
