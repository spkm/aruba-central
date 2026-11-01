<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootOutput;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Troubleshooting Output: GET /troubleshooting/v1/devices/{serial}.
 */
class GetTroubleshootOutputRequest extends ItemRequest
{
    protected ?string $dto = TroubleshootOutput::class;

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
