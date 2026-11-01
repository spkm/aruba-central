<?php

namespace spkm\ArubaCentral;

use Illuminate\Support\LazyCollection;
use JsonException;
use LogicException;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Exceptions\ServerErrorException;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Support\Payload;

/**
 * Pages through a list the way its endpoint documents: by offset and limit (most of both APIs), by a cursor the
 * last page handed back (new Central's "next", classic's "marker", "cursor" or "last_client_mac"), or by page
 * number (classic VisualRF and IoT). It stops at an empty or short page, when the offset reaches the total Central
 * gave, or when no cursor comes back.
 */
class ArubaPaginator extends Paginator
{
    protected ?int $perPageLimit = 100;

    protected ?string $cursor = null;

    public function __construct(Connector $connector, Request $request, ?int $perPage = null)
    {
        parent::__construct($connector, $request);

        if ($perPage !== null) {
            $this->perPageLimit = $perPage;
        }

        if ($request instanceof ListRequest && $request->maxLimit !== null && $this->perPageLimit !== null) {
            $this->perPageLimit = min($this->perPageLimit, $request->maxLimit);
        }
    }

    /**
     * Every item on every page, as the request's models.
     *
     * @return LazyCollection<int, Data>
     */
    public function dtos(): LazyCollection
    {
        $request = $this->getOriginalRequest();
        $dto = $request instanceof ArubaRequest ? $request->dtoClass() : null;

        if ($dto === null) {
            throw new LogicException(class_basename($request).' has no model; use collect() for its items as arrays.');
        }

        return $this->models($dto);
    }

    /**
     * Every item on every page as the given model.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>  $model
     * @return LazyCollection<int, TModel>
     */
    public function models(string $model): LazyCollection
    {
        return $this->collect()->map(fn (array $item) => $model::from($item));
    }

    protected function applyPagination(Request $request): Request
    {
        $list = $request instanceof ListRequest ? $request : null;
        $paging = $list->paging ?? ListRequest::OFFSET;

        if ($this->perPageLimit !== null && $paging !== ListRequest::UNPAGED) {
            $request->query()->add($list->limitParameter ?? 'limit', $this->perPageLimit);
        }

        match ($paging) {
            ListRequest::CURSOR => $this->cursor === null ? null : $request->query()->add($list->cursorParameter ?? 'next', $this->cursor),
            ListRequest::PAGE => $request->query()->add($list->pageParameter ?? 'page', ($list->firstPage ?? 1) + $this->page - 1),
            ListRequest::UNPAGED => null,
            default => $request->query()->add($list->offsetParameter ?? 'offset', ($this->page - 1) * ($this->perPageLimit ?? 0)),
        };

        return $request;
    }

    protected function isLastPage(Response $response): bool
    {
        $request = $response->getRequest();
        $list = $request instanceof ListRequest ? $request : null;
        $items = $this->getPageItems($response, $request);

        if ($items === [] || ($list->paging ?? ListRequest::OFFSET) === ListRequest::UNPAGED) {
            return true;
        }

        if ($list->paging === ListRequest::CURSOR) {
            try {
                $json = Payload::json($response);
            } catch (JsonException) {
                return true;
            }

            $next = is_array($json) ? data_get($json, $list->cursorKey) : null;
            $this->cursor = is_scalar($next) && (string) $next !== '' ? (string) $next : null;

            return $this->cursor === null;
        }

        if ($this->perPageLimit !== null && count($items) < $this->perPageLimit) {
            return true;
        }

        try {
            $total = Payload::total($response, $list->totalKey);
        } catch (JsonException) {
            return true;
        }

        return $total !== null && $this->totalResults >= $total;
    }

    /**
     * @return list<array<string, mixed>>
     */
    protected function getPageItems(Response $response, Request $request): array
    {
        try {
            return Payload::records($response, $request instanceof ArubaRequest ? $request->resultKey : '');
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }

    protected function onRewind(): void
    {
        $this->cursor = null;
    }

    /**
     * How many pages there are, which Central says only when the response carries a total.
     */
    protected function getTotalPages(Response $response): int
    {
        $request = $response->getRequest();

        try {
            $total = Payload::total($response, $request instanceof ListRequest ? $request->totalKey : 'total');
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }

        if ($total === null) {
            throw new LogicException("Central's response has no total, so its pages cannot be counted.");
        }

        return $this->perPageLimit === null ? 1 : (int) ceil($total / $this->perPageLimit);
    }
}
