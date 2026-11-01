<?php

namespace spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Syslog\FlowStatusList;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Check Status of Syslog App for given SerialIDs.: POST /ofcapi/v1/syslog/flows/status/device_list.
 *
 * Body: serial_ids.
 */
class CheckStatusListRequest extends WriteRequest
{
    protected ?string $dto = FlowStatusList::class;

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
        return '/ofcapi/v1/syslog/flows/status/device_list';
    }
}
