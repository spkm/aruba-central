<?php

namespace spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Syslog\Flowlist;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Enable Syslog App on a list of given device SerialIDs.: POST /ofcapi/v1/syslog/flows/{enable}.
 *
 * Body: serial_id_metadata.
 */
class EnableWildcardFlowListRequest extends WriteRequest
{
    protected ?string $dto = Flowlist::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $enable, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/ofcapi/v1/syslog/flows/'.rawurlencode((string) $this->enable);
    }
}
