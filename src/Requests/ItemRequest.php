<?php

namespace spkm\ArubaCentral\Requests;

use Saloon\Enums\Method;

/**
 * A GET for one record, or for a report, summary or setting Central keeps one of. Query options the operation
 * documents go in the last array argument.
 */
abstract class ItemRequest extends ArubaRequest
{
    protected Method $method = Method::GET;

    protected string $responseShape = self::ONE;

    protected bool $cacheable = true;

    /** @var array<string, mixed> */
    protected array $options;

    /**
     * @param  array<string, mixed>  $options  Query options the operation documents.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
