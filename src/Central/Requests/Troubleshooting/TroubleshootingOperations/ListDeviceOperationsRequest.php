<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\TroubleshootingOperations;

use spkm\ArubaCentral\Central\Data\Troubleshooting\OperationGetRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get single device's operation status by serialNumber.: GET /network-troubleshooting/v1/device-operations.
 *
 * Query parameters: serial-number, operation, summary.
 */
class ListDeviceOperationsRequest extends ListRequest
{
    protected ?string $dto = OperationGetRespItem::class;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/device-operations';
    }
}
