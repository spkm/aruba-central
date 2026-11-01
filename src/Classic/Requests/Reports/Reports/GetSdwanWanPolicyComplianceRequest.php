<?php

namespace spkm\ArubaCentral\Classic\Requests\Reports\Reports;

use spkm\ArubaCentral\Classic\Data\Reports\ResponseFramework;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * SDWAN DPS policy compliance report: GET /sdwan-mon-api/external/noc/reports/wan/policy-compliance.
 */
class GetSdwanWanPolicyComplianceRequest extends ItemRequest
{
    protected ?string $dto = ResponseFramework::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $period, protected string $resultOrder, protected int $count, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/sdwan-mon-api/external/noc/reports/wan/policy-compliance';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['period' => $this->period, 'result_order' => $this->resultOrder, 'count' => $this->count, ...parent::defaultQuery()];
    }
}
