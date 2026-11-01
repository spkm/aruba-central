<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Initiate a Get Arp Table test on a AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/getArpTable.
 */
class InitiatePvosGetArpTableRequest extends ActionRequest
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
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/getArpTable';
    }
}
