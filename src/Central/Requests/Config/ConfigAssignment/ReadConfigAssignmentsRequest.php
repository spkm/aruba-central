<?php

namespace spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment;

use spkm\ArubaCentral\Central\Data\Config\ArubaConfigAssignmentConfigAssignmentsSchemaGETItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Read config-assignments: GET /network-config/v1alpha1/config-assignments.
 *
 * Query parameters: scope-id, device-function, profile-type.
 */
class ReadConfigAssignmentsRequest extends ListRequest
{
    protected ?string $dto = ArubaConfigAssignmentConfigAssignmentsSchemaGETItem::class;

    public string $resultKey = 'config-assignment';

    public ?string $totalKey = null;

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
        return '/network-config/v1alpha1/config-assignments';
    }
}
