<?php

namespace spkm\ArubaCentral\Query;

use InvalidArgumentException;

/**
 * The comparisons a query can ask for. New Central's filter grammar has them all; classic Central filters by exact
 * value (and by list) only.
 */
enum Operator: string
{
    case Equal = 'eq';
    case NotEqual = 'ne';
    case GreaterThan = 'gt';
    case GreaterOrEqual = 'ge';
    case LessThan = 'lt';
    case LessOrEqual = 'le';
    case In = 'in';
    case Contains = 'contains';

    /**
     * The operator for a familiar symbol or word: '=', '!=', '<>', '>', '>=', '<', '<=', 'in', 'contains', 'like',
     * and the OData names.
     */
    public static function parse(self|string $operator): self
    {
        if ($operator instanceof self) {
            return $operator;
        }

        $normalised = strtolower(trim($operator));

        return self::tryFrom($normalised) ?? match ($normalised) {
            '=', '==' => self::Equal,
            '!=', '<>' => self::NotEqual,
            '>' => self::GreaterThan,
            '>=', 'gte' => self::GreaterOrEqual,
            '<' => self::LessThan,
            '<=', 'lte' => self::LessOrEqual,
            'like' => self::Contains,
            default => throw new InvalidArgumentException('"'.$operator.'" is not a filter operator.'),
        };
    }

    /**
     * Whether the operator compares against a list of values.
     */
    public function takesList(): bool
    {
        return $this === self::In;
    }
}
