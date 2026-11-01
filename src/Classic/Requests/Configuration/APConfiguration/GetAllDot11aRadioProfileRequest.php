<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use spkm\ArubaCentral\Classic\Data\Configuration\RadioProfile;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all Dot11a Radio Profiles.: GET /configuration/v1/dot11a_radio_profiles/{group_name_or_guid_or_serial_number}.
 */
class GetAllDot11aRadioProfileRequest extends ListRequest
{
    protected ?string $dto = RadioProfile::class;

    public string $resultKey = 'dot11g_list';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/dot11a_radio_profiles/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
