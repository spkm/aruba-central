<?php

namespace spkm\ArubaCentral\Query;

use DateTimeInterface;
use InvalidArgumentException;
use Stringable;

/**
 * The query string of a list request, built up immutably: conditions, sorts, a page (limit and offset), a time
 * range, and any other parameter the endpoint documents. Each API writes these in its own way: new Central as an
 * OData filter with start-at and end-at, classic as named parameters with from_timestamp and to_timestamp.
 *
 * @phpstan-consistent-constructor
 */
abstract class Query implements Stringable
{
    /** @var list<Condition> */
    protected array $conditions = [];

    /** @var list<array{string, string}> */
    protected array $sorts = [];

    protected ?int $limit = null;

    protected ?int $offset = null;

    protected DateTimeInterface|int|string|null $from = null;

    protected DateTimeInterface|int|string|null $to = null;

    /** @var array<string, mixed> */
    protected array $parameters = [];

    public static function make(): static
    {
        return new static;
    }

    /**
     * The query parameters as the API reads them.
     *
     * @return array<string, mixed>
     */
    abstract public function toArray(): array;

    /**
     * The query that asks how many records match rather than for the records.
     */
    abstract public function forCount(): static;

    /**
     * A condition on a field, ANDed with the ones before it.
     */
    public function where(string $field, Operator|string $operator, mixed $value = null): static
    {
        $operator = Operator::parse($operator);

        if ($operator->takesList() && ! is_iterable($value)) {
            throw new InvalidArgumentException('"'.$field.' in" needs a list of values.');
        }

        $query = clone $this;
        $query->conditions[] = new Condition($field, $operator, is_iterable($value) && ! is_array($value) ? iterator_to_array($value) : $value);

        return $query;
    }

    public function orderBy(string $field, string $direction = 'asc'): static
    {
        $direction = strtolower($direction);

        if (! in_array($direction, ['asc', 'desc'], true)) {
            throw new InvalidArgumentException('Sort direction must be "asc" or "desc", not "'.$direction.'".');
        }

        $query = clone $this;
        $query->sorts[] = [$field, $direction];

        return $query;
    }

    public function limit(?int $limit): static
    {
        if ($limit !== null && $limit < 1) {
            throw new InvalidArgumentException('The limit must be at least 1.');
        }

        $query = clone $this;
        $query->limit = $limit;

        return $query;
    }

    public function offset(?int $offset): static
    {
        if ($offset !== null && $offset < 0) {
            throw new InvalidArgumentException('The offset cannot be negative.');
        }

        $query = clone $this;
        $query->offset = $offset;

        return $query;
    }

    /**
     * The time range the records should fall in. Dates can be DateTimeInterface objects, Unix timestamps or
     * strings Carbon can parse.
     */
    public function between(DateTimeInterface|int|string|null $from, DateTimeInterface|int|string|null $to): static
    {
        $query = clone $this;
        $query->from = $from;
        $query->to = $to;

        return $query;
    }

    /**
     * Any other query parameter the endpoint documents: with('site-id', 7), or with(['site-id' => 7, ...]). A
     * parameter given here is sent as it is, after everything the query writes.
     *
     * @param  string|array<string, mixed>  $name
     */
    public function with(string|array $name, mixed $value = null): static
    {
        $query = clone $this;

        foreach (is_array($name) ? $name : [$name => $value] as $key => $parameter) {
            if ($parameter === null) {
                unset($query->parameters[$key]);
            } else {
                $query->parameters[$key] = $parameter;
            }
        }

        return $query;
    }

    /**
     * The query without its limit and offset, for a paginator to page.
     */
    public function withoutPaging(): static
    {
        $query = clone $this;
        $query->limit = null;
        $query->offset = null;

        return $query;
    }

    /**
     * @return list<Condition>
     */
    public function conditions(): array
    {
        return $this->conditions;
    }

    /**
     * @return list<array{string, string}>
     */
    public function sorts(): array
    {
        return $this->sorts;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @return array<string, mixed>
     */
    public function parameters(): array
    {
        return $this->parameters;
    }

    public function __toString(): string
    {
        return http_build_query($this->toArray(), '', '&', PHP_QUERY_RFC3986);
    }
}
