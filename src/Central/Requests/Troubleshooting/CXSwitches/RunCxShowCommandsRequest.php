<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Run 'show' commands (CX): POST /network-troubleshooting/v1/cx/{serial-number}/showCommands.
 *
 * Body: commands.
 */
class RunCxShowCommandsRequest extends WriteRequest
{
    protected ?string $dto = AsyncOperationStatus::class;

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
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/showCommands';
    }
}
