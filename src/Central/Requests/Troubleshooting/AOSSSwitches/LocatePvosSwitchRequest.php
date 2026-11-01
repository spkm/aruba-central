<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Locate an AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/locate.
 */
class LocatePvosSwitchRequest extends ActionRequest
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
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/locate';
    }
}
