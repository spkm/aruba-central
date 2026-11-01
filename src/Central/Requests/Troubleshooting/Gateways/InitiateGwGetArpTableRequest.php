<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Initiate a Get Arp Table test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/getArpTable.
 */
class InitiateGwGetArpTableRequest extends ActionRequest
{
    protected ?string $dto = AsyncOperationStatus::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/getArpTable';
    }
}
