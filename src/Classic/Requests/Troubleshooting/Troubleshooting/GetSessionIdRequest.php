<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootSessionId;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Troubleshooting Session ID: GET /troubleshooting/v1/devices/{serial}/session.
 */
class GetSessionIdRequest extends ItemRequest
{
    protected ?string $dto = TroubleshootSessionId::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/devices/'.rawurlencode((string) $this->serial).'/session';
    }
}
