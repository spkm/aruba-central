<?php

namespace spkm\ArubaCentral\Central\Requests\Config\VlanRange;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add or Update range of VLAN profiles: POST /network-config/v1alpha1/layer2-vlan-range.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: description-alias, vlan-range, voice-enable-alias.
 */
class CreateLayer2VlanRangeRequest extends WriteRequest
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
        return '/network-config/v1alpha1/layer2-vlan-range';
    }
}
