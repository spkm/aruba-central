<?php

namespace spkm\ArubaCentral\Classic;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use LogicException;
use spkm\ArubaCentral\Query\Condition;
use spkm\ArubaCentral\Query\Operator;
use spkm\ArubaCentral\Query\Query as BaseQuery;

/**
 * Classic Central's query string: each condition as a named parameter (group=Staff, serial=…), "sort" as +field
 * or -field, "limit" and "offset", "from_timestamp" and "to_timestamp" as Unix seconds, and "calculate_total" when
 * counting. Classic filters by exact value, so where() accepts "=" and "in" (a comma-separated list) only.
 */
class Query extends BaseQuery
{
    public function toArray(): array
    {
        $parameters = [];

        foreach ($this->conditions as $condition) {
            $parameters[$condition->field] = self::value($condition);
        }

        if ($this->sorts !== []) {
            $parameters['sort'] = implode(',', array_map(fn (array $sort) => ($sort[1] === 'desc' ? '-' : '+').$sort[0], $this->sorts));
        }

        if ($this->limit !== null) {
            $parameters['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $parameters['offset'] = $this->offset;
        }

        if ($this->from !== null) {
            $parameters['from_timestamp'] = self::time($this->from);
        }

        if ($this->to !== null) {
            $parameters['to_timestamp'] = self::time($this->to);
        }

        return [...$parameters, ...$this->parameters];
    }

    public function forCount(): static
    {
        return $this->limit(1)->with('calculate_total', 'true');
    }

    private static function value(Condition $condition): string
    {
        if (! in_array($condition->operator, [Operator::Equal, Operator::In], true)) {
            throw new LogicException('Classic Central filters "'.$condition->field.'" by exact value only; "'.$condition->operator->value.'" is not available.');
        }

        $values = is_array($condition->value) ? $condition->value : [$condition->value];

        return implode(',', array_map(self::literal(...), $values));
    }

    private static function literal(mixed $value): string
    {
        return match (true) {
            is_bool($value) => $value ? 'true' : 'false',
            $value instanceof DateTimeInterface => (string) self::time($value),
            default => (string) $value,
        };
    }

    /**
     * A time as classic Central reads it: Unix seconds.
     */
    public static function time(DateTimeInterface|int|string $value): int
    {
        return match (true) {
            $value instanceof DateTimeInterface => $value->getTimestamp(),
            is_int($value) => $value,
            default => CarbonImmutable::parse($value)->getTimestamp(),
        };
    }
}
