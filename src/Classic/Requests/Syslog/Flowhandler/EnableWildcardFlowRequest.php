<?php

namespace spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Enable/Disable the Syslog App.: POST /ofcapi/v1/syslog/flow.
 *
 * Body: enable, serial_id.
 */
class EnableWildcardFlowRequest extends WriteRequest
{
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
        return '/ofcapi/v1/syslog/flow';
    }
}
