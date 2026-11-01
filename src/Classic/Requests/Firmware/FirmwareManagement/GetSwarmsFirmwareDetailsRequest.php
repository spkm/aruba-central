<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareSwarmDetails;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Firmware Details of Swarms: GET /firmware/v1/swarms.
 *
 * Query parameters: group.
 */
class GetSwarmsFirmwareDetailsRequest extends ListRequest
{
    protected ?string $dto = FirmwareSwarmDetails::class;

    public string $resultKey = 'swarms';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/swarms';
    }
}
