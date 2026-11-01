<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\IotGateways;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\ResponseMsg;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Group move: POST /v1/iot_gateways/groups/move.
 *
 * Body: connectorList, groupId.
 */
class MoveRequest extends WriteRequest
{
    protected ?string $dto = ResponseMsg::class;

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
        return '/v1/iot_gateways/groups/move';
    }
}
