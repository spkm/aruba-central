<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\APCredential;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get ssh credential in group level.: GET /configuration/v1/group/ssh_credential/{group_name}.
 */
class GetGroupSshCredentialRequest extends ItemRequest
{
    protected ?string $dto = APCredential::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/group/ssh_credential/'.rawurlencode((string) $this->groupName);
    }
}
