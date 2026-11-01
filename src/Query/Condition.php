<?php

namespace spkm\ArubaCentral\Query;

/**
 * One condition of a query: a field, how to compare it, and what with.
 */
final readonly class Condition
{
    public function __construct(public string $field, public Operator $operator, public mixed $value) {}
}
