<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\FcoRespInfo;
use spkm\ArubaCentral\Central\Requests\Services\FCOResponseInformation\GetAfcRespInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\FCOResponseInformation\ListAfcRespInfoRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The FCO Response Information API, from Aruba::afc().
 *
 * @extends Builder<FcoRespInfo>
 */
class AfcResource extends Builder
{
    protected string $idField = 'serialNumber';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, FcoRespInfo::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ListAfcRespInfoRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetAfcRespInfoRequest((string) $id);
    }
}
