<?php

namespace spkm\ArubaCentral\Query;

use DateTimeInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use LogicException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use spkm\ArubaCentral\ArubaApiException;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\ArubaPaginator;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Exceptions\NotFoundException;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Support\Payload;
use UnexpectedValueException;

/**
 * An Eloquent-style query over one Central collection. Each resource extends it, saying which requests list,
 * fetch, create, update, replace and delete its records; the builder turns where(), orderBy() and the rest into
 * the API's parameters and the response into models.
 *
 * @template TData of Data
 *
 * @extends BaseResource<TData>
 */
abstract class Builder extends BaseResource
{
    protected Query $query;

    /**
     * The field a record is found by when the collection has no request for one record.
     */
    protected string $idField = 'id';

    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(ArubaConnector $connector, ?string $dataClass)
    {
        parent::__construct($connector, $dataClass);

        $this->query = $connector->newQuery();
    }

    abstract protected function listRequest(Query $query): ListRequest;

    protected function itemRequest(int|string $id): ?ArubaRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function createRequest(array $body, array $options): ?ArubaRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function updateRequest(int|string $id, array $body, array $options): ?ArubaRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function replaceRequest(int|string $id, array $body, array $options): ?ArubaRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $options
     */
    protected function deleteRequest(int|string $id, array $options): ?ArubaRequest
    {
        return null;
    }

    /**
     * A condition on a field: where('status', 'Up'), where('siteId', '=', 7), where('deployment', 'in', [...]).
     * Conditions are ANDed.
     */
    public function where(string $field, mixed $operator = null, mixed $value = null): static
    {
        if (func_num_args() === 2 && ! $operator instanceof Operator) {
            [$operator, $value] = [Operator::Equal, $operator];
        }

        $this->query = $this->query->where($field, $operator ?? Operator::Equal, $value);

        return $this;
    }

    public function whereNot(string $field, mixed $value): static
    {
        return $this->where($field, Operator::NotEqual, $value);
    }

    /**
     * @param  iterable<mixed>  $values
     */
    public function whereIn(string $field, iterable $values): static
    {
        return $this->where($field, Operator::In, $values);
    }

    public function whereContains(string $field, string $value): static
    {
        return $this->where($field, Operator::Contains, $value);
    }

    public function orderBy(string $field, string $direction = 'asc'): static
    {
        $this->query = $this->query->orderBy($field, $direction);

        return $this;
    }

    public function orderByDesc(string $field): static
    {
        return $this->orderBy($field, 'desc');
    }

    public function offset(int $offset): static
    {
        $this->query = $this->query->offset($offset);

        return $this;
    }

    /**
     * How many records to return in one page.
     */
    public function limit(int $limit): static
    {
        $this->query = $this->query->limit($limit);

        return $this;
    }

    public function forPage(int $page, int $perPage): static
    {
        return $this->offset(($page - 1) * $perPage)->limit($perPage);
    }

    /**
     * The time range the records should fall in, for the endpoints that take one.
     */
    public function between(DateTimeInterface|int|string|null $from, DateTimeInterface|int|string|null $to): static
    {
        $this->query = $this->query->between($from, $to);

        return $this;
    }

    /**
     * Any other query parameter the endpoint documents: with('site-id', 7), or with(['site-id' => 7, ...]).
     *
     * @param  string|array<string, mixed>  $name
     */
    public function with(string|array $name, mixed $value = null): static
    {
        $this->query = $this->query->with($name, $value);

        return $this;
    }

    /**
     * One page of matching records: as many as limit() asked for, or the endpoint's default.
     *
     * @return Collection<int, TData>
     */
    public function get(): Collection
    {
        $request = $this->listRequest($this->query);

        /** @var Collection<int, TData> */
        return Payload::items($this->send($request), $request->resultKey, $this->dataClass);
    }

    /**
     * Every matching record, fetched a page at a time.
     *
     * @return Collection<int, TData>
     */
    public function all(?int $perPage = null): Collection
    {
        return $this->lazy($perPage)->collect();
    }

    /**
     * The first matching record in sort order.
     *
     * @return TData|null
     */
    public function first(): mixed
    {
        $request = $this->listRequest($this->query->limit(1));

        return Payload::items($this->send($request), $request->resultKey, $this->dataClass)->first();
    }

    /**
     * How many records match, when the endpoint says.
     */
    public function count(): int
    {
        $request = $this->listRequest($this->query->forCount());
        $response = $this->send($request);
        $total = Payload::total($response, $request->totalKey);

        if ($total === null) {
            throw new UnexpectedValueException("Central's response to ".$request->getMethod()->value.' '.$request->resolveEndpoint().' has no total.');
        }

        return $total;
    }

    public function exists(): bool
    {
        return $this->count() > 0;
    }

    /**
     * The record with the given id, or null when Central has none.
     *
     * @return TData|null
     */
    public function find(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            return $this->fresh()->where($this->idField, $id)->first();
        }

        return $this->fetchOrNull($request);
    }

    /**
     * @return TData
     */
    public function findOrFail(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            $record = $this->find($id);

            if ($record === null) {
                throw new NotFoundException($this->send($this->listRequest($this->fresh()->where($this->idField, $id)->toQuery()->limit(1))));
            }

            return $record;
        }

        return $this->fetch($request);
    }

    /**
     * Every matching record, fetched a page at a time as the loop reaches it.
     *
     * @return LazyCollection<int, TData>
     */
    public function lazy(?int $perPage = null): LazyCollection
    {
        $paginator = $this->paginate($perPage);
        $dataClass = $this->dataClass;

        return LazyCollection::make(function () use ($paginator, $dataClass) {
            try {
                foreach ($dataClass === null ? $paginator->collect() : $paginator->models($dataClass) as $item) {
                    yield $item;
                }
            } catch (RequestException $exception) {
                throw $exception instanceof ArubaApiException ? $exception : ArubaApiException::fromResponse($exception->getResponse());
            }
        });
    }

    /**
     * @return LazyCollection<int, TData>
     */
    public function cursor(?int $perPage = null): LazyCollection
    {
        return $this->lazy($perPage);
    }

    /**
     * A paginator over the matching records, for fetching pages one at a time yourself.
     */
    public function paginate(?int $perPage = null): ArubaPaginator
    {
        return $this->connector->paginate($this->listRequest($this->query->withoutPaging()), $perPage ?? $this->query->getLimit());
    }

    /**
     * Create a record. Central answers with the record it stored, or a status.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options the operation documents.
     * @return TData|null
     */
    public function create(array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->createRequest($this->payloadOf($attributes), $options) ?? $this->undocumented('create'));
    }

    /**
     * Change some fields of a record.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function update(int|string $id, array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->updateRequest($id, $this->payloadOf($attributes), $options) ?? $this->undocumented('update'));
    }

    /**
     * Replace a record.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function replace(int|string $id, array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->replaceRequest($id, $this->payloadOf($attributes), $options) ?? $this->undocumented('replace'));
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function delete(int|string $id, array $options = []): bool
    {
        $this->fetch($this->deleteRequest($id, $options) ?? $this->undocumented('delete'));

        return true;
    }

    /**
     * The request get() would send, for sending through the connector yourself.
     */
    public function toRequest(): ListRequest
    {
        return $this->listRequest($this->query);
    }

    public function toQuery(): Query
    {
        return $this->query;
    }

    /**
     * The query parameters get() would send.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->query->toArray();
    }

    protected function send(ListRequest $request): Response
    {
        $response = $this->connector->send($request);

        if (! $response->successful()) {
            throw ArubaApiException::fromResponse($response);
        }

        return $response;
    }

    /**
     * A copy of this builder with no conditions.
     */
    protected function fresh(): static
    {
        $fresh = clone $this;
        $fresh->query = $this->connector->newQuery();

        return $fresh;
    }

    private function undocumented(string $action): never
    {
        throw new LogicException("Central's API documents no way to $action these records.");
    }
}
