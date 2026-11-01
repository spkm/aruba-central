<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\WiredClientDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Connected Wired Client Details: GET /monitoring/v1/clients/wired/{macaddr}.
 */
class GetWiredClientRequest extends ItemRequest
{
    protected ?string $dto = WiredClientDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macaddr, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/clients/wired/'.rawurlencode((string) $this->macaddr);
    }
}
