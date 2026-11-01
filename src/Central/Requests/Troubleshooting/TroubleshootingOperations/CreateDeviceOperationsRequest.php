<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\TroubleshootingOperations;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\OperationPostResp;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Operate a device to start, stop, clear the troubleshooting data.: POST /network-troubleshooting/v1/device-operations.
 *
 * Body: operationPostReq.
 */
class CreateDeviceOperationsRequest extends WriteRequest
{
    protected ?string $dto = OperationPostResp::class;

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
        return '/network-troubleshooting/v1/device-operations';
    }
}
