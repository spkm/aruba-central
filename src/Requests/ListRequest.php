<?php

namespace spkm\ArubaCentral\Requests;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\ArubaCentral\Query\Query;

/**
 * A GET for the records of a collection, filtered, sorted and paged by a Query. Central answers one page;
 * ArubaPaginator pages through them the way the endpoint documents: by offset, by a cursor it hands back, or by
 * page number.
 */
abstract class ListRequest extends ArubaRequest implements Paginatable
{
    public const OFFSET = 'offset';

    public const CURSOR = 'cursor';

    public const PAGE = 'page';

    public const UNPAGED = 'none';

    protected Method $method = Method::GET;

    protected string $responseShape = self::LIST;

    protected bool $cacheable = true;

    public string $resultKey = 'items';

    /**
     * The key the total number of matching records is under, when Central gives one.
     */
    public ?string $totalKey = 'total';

    public string $paging = self::OFFSET;

    public string $limitParameter = 'limit';

    public string $offsetParameter = 'offset';

    /**
     * For cursor paging: the query parameter the cursor goes in, and the response key the next one comes back in.
     */
    public string $cursorParameter = 'next';

    public string $cursorKey = 'next';

    /**
     * For page-number paging: the query parameter, and the number of the first page.
     */
    public string $pageParameter = 'page';

    public int $firstPage = 1;

    /**
     * The most records Central allows per page, when it documents a limit.
     */
    public ?int $maxLimit = null;

    /**
     * Parameters the endpoint needs on every call, sent unless the query gives its own value for them.
     *
     * @var array<string, mixed>
     */
    public array $defaults = [];

    /** @var Query|array<string, mixed> */
    protected Query|array $parameters;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        $this->parameters = $query;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        $parameters = [...$this->defaults, ...($this->parameters instanceof Query ? $this->parameters->toArray() : $this->parameters)];

        if ($this->paging === self::UNPAGED) {
            unset($parameters[$this->limitParameter], $parameters[$this->offsetParameter]);
        }

        return $parameters;
    }
}
