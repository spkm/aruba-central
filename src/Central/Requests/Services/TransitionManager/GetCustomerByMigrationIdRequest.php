<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use spkm\ArubaCentral\Central\Data\Services\MigrationIdMappingResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a customer ID by migration ID: GET /network-services/v1/tms-migration-id-mappings/{migration-id}.
 */
class GetCustomerByMigrationIdRequest extends ItemRequest
{
    protected ?string $dto = MigrationIdMappingResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $migrationId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/tms-migration-id-mappings/'.rawurlencode((string) $this->migrationId);
    }
}
