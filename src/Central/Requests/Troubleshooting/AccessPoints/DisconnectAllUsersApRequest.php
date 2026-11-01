<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Disconnect all users from an Access Point: POST /network-troubleshooting/v1/aps/{serial-number}/disconnectUserAll.
 */
class DisconnectAllUsersApRequest extends ActionRequest
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
        return '/network-troubleshooting/v1/aps/'.rawurlencode((string) $this->serialNumber).'/disconnectUserAll';
    }
}
