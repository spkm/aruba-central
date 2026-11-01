<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\APCredential;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get ssh credential in device level.: GET /configuration/v1/device/ssh_credential/{serial_number_or_guid}.
 */
class GetDeviceSshCredentialRequest extends ItemRequest
{
    protected ?string $dto = APCredential::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumberOrGuid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/device/ssh_credential/'.rawurlencode((string) $this->serialNumberOrGuid);
    }
}
