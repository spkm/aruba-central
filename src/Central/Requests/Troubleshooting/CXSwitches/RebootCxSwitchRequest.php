<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Reboot a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/reboot.
 */
class RebootCxSwitchRequest extends ActionRequest
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
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/reboot';
    }
}
