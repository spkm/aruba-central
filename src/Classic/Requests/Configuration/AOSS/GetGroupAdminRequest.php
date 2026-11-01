<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use spkm\ArubaCentral\Classic\Data\Configuration\AdminDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get admin SSH details of a group.: GET /configuration/v1/aos_switch/system/groups/{group_name}.
 */
class GetGroupAdminRequest extends ItemRequest
{
    protected ?string $dto = AdminDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/aos_switch/system/groups/'.rawurlencode((string) $this->groupName);
    }
}
