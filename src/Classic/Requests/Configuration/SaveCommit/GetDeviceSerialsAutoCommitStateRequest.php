<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit;

use spkm\ArubaCentral\Classic\Data\Configuration\GetDeviceAutoCommitState;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get auto commit state as either On or Off for device serials.: GET /configuration/v1/auto_commit_state/devices.
 *
 * Query parameters (* required): device_serials*.
 */
class GetDeviceSerialsAutoCommitStateRequest extends ListRequest
{
    protected ?string $dto = GetDeviceAutoCommitState::class;

    public string $resultKey = 'data';

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/auto_commit_state/devices';
    }
}
