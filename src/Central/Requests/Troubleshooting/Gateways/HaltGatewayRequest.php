<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Halt a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/halt.
 */
class HaltGatewayRequest extends ActionRequest
{
    protected ?string $dto = ActionInitiatedStatus::class;

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
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/halt';
    }
}
