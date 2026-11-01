<?php

namespace spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler;

use spkm\ArubaCentral\Classic\Data\Syslog\OFCFlowStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Check Status of Enabled Flow SerialID: GET /ofcapi/v1/syslog/flow/status/{serial_id}.
 */
class CheckStatusRequest extends ItemRequest
{
    protected ?string $dto = OFCFlowStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/ofcapi/v1/syslog/flow/status/'.rawurlencode((string) $this->serialId);
    }
}
