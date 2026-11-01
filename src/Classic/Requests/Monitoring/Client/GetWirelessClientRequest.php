<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\ClientDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Connected Wireless Client Details: GET /monitoring/v1/clients/wireless/{macaddr}.
 */
class GetWirelessClientRequest extends ItemRequest
{
    protected ?string $dto = ClientDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macaddr, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/clients/wireless/'.rawurlencode((string) $this->macaddr);
    }
}
