<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Disconnect all users from a specific network (SSID) on an Access Point: POST /network-troubleshooting/v1/aps/{serial-number}/disconnectUserByNetwork.
 *
 * Body: networkName.
 */
class DisconnectUserByNetworkApRequest extends WriteRequest
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
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/disconnectUserByNetwork';
    }
}
