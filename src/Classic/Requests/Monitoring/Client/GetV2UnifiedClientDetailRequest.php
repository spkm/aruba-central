<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\UnifiedClient;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Client Details: GET /monitoring/v2/clients/{macaddr}.
 */
class GetV2UnifiedClientDetailRequest extends ItemRequest
{
    protected ?string $dto = UnifiedClient::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macaddr, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/clients/'.rawurlencode((string) $this->macaddr);
    }
}
