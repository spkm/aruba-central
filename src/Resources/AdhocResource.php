<?php

namespace spkm\ArubaCentral\Resources;

use Saloon\Enums\Method;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\AdhocBodyRequest;
use spkm\ArubaCentral\Requests\AdhocListRequest;
use spkm\ArubaCentral\Requests\AdhocRequest;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * A builder over a collection the package has no resource for, from Aruba::from('/path', 'items'); its records
 * are arrays, found, created, updated, replaced and deleted at /path/{id}.
 *
 * @extends Builder<Data>
 */
class AdhocResource extends Builder
{
    public function __construct(ArubaConnector $connector, protected string $path, protected string $resultKey = 'items', protected ?string $totalKey = 'total')
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new AdhocListRequest($this->path, $query, $this->resultKey, $this->totalKey);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new AdhocRequest(Method::GET, $this->item($id), shape: ArubaRequest::ONE);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AdhocBodyRequest(Method::POST, $this->path, $body, $options, ArubaRequest::ONE);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new AdhocBodyRequest(Method::PATCH, $this->item($id), $body, $options, ArubaRequest::ONE);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new AdhocBodyRequest(Method::PUT, $this->item($id), $body, $options, ArubaRequest::ONE);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new AdhocRequest(Method::DELETE, $this->item($id), $options, ArubaRequest::NONE);
    }

    private function item(int|string $id): string
    {
        return rtrim($this->path, '/').'/'.rawurlencode((string) $id);
    }
}
