<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Disconnect a specific client by MAC address from a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/disconnectClientByMacAddress.
 *
 * Body: clientMacAddress.
 */
class DisconnectClientByMacGwRequest extends WriteRequest
{
    protected ?string $dto = ActionInitiatedStatus::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/disconnectClientByMacAddress';
    }
}
