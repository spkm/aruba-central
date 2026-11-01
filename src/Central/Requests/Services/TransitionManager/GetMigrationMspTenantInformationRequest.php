<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use spkm\ArubaCentral\Central\Data\Services\MspIdInformationResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get MSP ID information by migration MSP ID: GET /network-services/v1/tms-migration-msp-id-record.
 */
class GetMigrationMspTenantInformationRequest extends ItemRequest
{
    protected ?string $dto = MspIdInformationResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $migrationMspId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/tms-migration-msp-id-record';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['migration-msp-id' => $this->migrationMspId, ...parent::defaultQuery()];
    }
}
