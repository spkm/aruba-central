<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceassignmentPost;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Assign/Unassign devices to the FloorPlan: POST /network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned.
 *
 * Body: deviceAssignment.
 */
class ChangeDeviceAssignmentRequest extends WriteRequest
{
    protected ?string $dto = DeviceassignmentPost::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/network-devices-assigned';
    }
}
