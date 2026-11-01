<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo;

use spkm\ArubaCentral\Classic\Data\Configuration\CaptivePortalLogoInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get Captive Portal Logos uploaded.: GET /configuration/v1/cplogo.
 */
class GetCpLogosRequest extends ListRequest
{
    protected ?string $dto = CaptivePortalLogoInfo::class;

    public string $resultKey = 'data';

    public ?int $maxLimit = 20;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/cplogo';
    }
}
