<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\OperationResult;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Enable or disable migration ID existence check: POST /network-services/v1/tms-migration-id-check-updates.
 */
class SetMigrationIdCheckRequest extends ActionRequest
{
    protected ?string $dto = OperationResult::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $check, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/tms-migration-id-check-updates';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['check' => $this->check, ...parent::defaultQuery()];
    }
}
