<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Clear Troubleshooting Session: DELETE /troubleshooting/v1/devices/{serial}.
 */
class ClearTroubleshootingSessionRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, protected int $sessionId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/devices/'.rawurlencode((string) $this->serial);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['session_id' => $this->sessionId, ...parent::defaultQuery()];
    }
}
