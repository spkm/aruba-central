<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Gateway: DELETE /monitoring/v1/gateways/{serial}.
 */
class DeleteGatewayRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial);
    }
}
