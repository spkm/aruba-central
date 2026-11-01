<?php

namespace spkm\ArubaCentral\Central;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use spkm\ArubaCentral\Query\Condition;
use spkm\ArubaCentral\Query\Operator;
use spkm\ArubaCentral\Query\Query as BaseQuery;

/**
 * New Central's query string: "filter" as an OData expression (conditions joined with "and"), "sort" as
 * "field asc" or "field desc", "limit" and "offset", and "start-at" and "end-at" as RFC 3339 times. Other
 * parameters, such as site-id, go through with().
 */
class Query extends BaseQuery
{
    public function toArray(): array
    {
        $parameters = [];

        if ($this->conditions !== []) {
            $parameters['filter'] = implode(' and ', array_map(self::expression(...), $this->conditions));
        }

        if ($this->sorts !== []) {
            $parameters['sort'] = implode(',', array_map(fn (array $sort) => $sort[0].' '.$sort[1], $this->sorts));
        }

        if ($this->limit !== null) {
            $parameters['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $parameters['offset'] = $this->offset;
        }

        if ($this->from !== null) {
            $parameters['start-at'] = self::time($this->from);
        }

        if ($this->to !== null) {
            $parameters['end-at'] = self::time($this->to);
        }

        return [...$parameters, ...$this->parameters];
    }

    public function forCount(): static
    {
        return $this->limit(1);
    }

    /**
     * The filter expression get() would send, or null without conditions.
     */
    public function toFilter(): ?string
    {
        return $this->toArray()['filter'] ?? null;
    }

    private static function expression(Condition $condition): string
    {
        return match ($condition->operator) {
            Operator::In => $condition->field.' in ('.implode(', ', array_map(self::literal(...), is_array($condition->value) ? $condition->value : [$condition->value])).')',
            Operator::Contains => 'contains('.$condition->field.', '.self::literal($condition->value).')',
            default => $condition->field.' '.$condition->operator->value.' '.self::literal($condition->value),
        };
    }

    /**
     * A value as an OData literal: strings quoted, numbers and booleans bare, dates as RFC 3339.
     */
    private static function literal(mixed $value): string
    {
        return match (true) {
            $value === null => 'null',
            is_bool($value) => $value ? 'true' : 'false',
            is_int($value) || is_float($value) => (string) $value,
            $value instanceof DateTimeInterface => self::time($value),
            default => "'".str_replace("'", "''", (string) $value)."'",
        };
    }

    /**
     * A time as new Central reads it: RFC 3339 in UTC.
     */
    public static function time(DateTimeInterface|int|string $value): string
    {
        $time = match (true) {
            $value instanceof DateTimeInterface => CarbonImmutable::instance($value),
            is_int($value) => CarbonImmutable::createFromTimestamp($value),
            default => CarbonImmutable::parse($value),
        };

        return $time->utc()->format('Y-m-d\TH:i:s\Z');
    }
}
