<?php

namespace spkm\ArubaCentral\Support;

use Illuminate\Support\Collection;
use Saloon\Http\Response;
use spkm\ArubaCentral\Data\Data;
use UnexpectedValueException;

/**
 * Reads Central's response bodies. A list arrives under a key the request names ("items" on new Central; "aps",
 * "clients", "data" and the like on classic) with a count or total beside it; one record arrives bare, or under a
 * key when the request says so.
 */
final class Payload
{
    /**
     * The decoded JSON body, or null when the body is empty. Throws JsonException for anything that isn't JSON.
     */
    public static function json(Response $response): mixed
    {
        $body = $response->body();

        return trim($body) === '' ? null : json_decode($body, true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * The records in the response, as arrays: the list under $key ('' for a bare list, or the whole body as one
     * record).
     *
     * @return list<array<string, mixed>>
     */
    public static function records(Response $response, string $key = ''): array
    {
        $json = self::json($response);

        if ($json === null || $json === []) {
            return [];
        }

        if (! is_array($json)) {
            throw new UnexpectedValueException("Central's response to ".self::requestLine($response).' is not a record or a list of records.');
        }

        $items = $key === '' ? $json : data_get($json, $key);

        if ($items === null) {
            return [];
        }

        if (is_array($items) && array_is_list($items)) {
            return self::onlyArrays($items);
        }

        if (! is_array($items)) {
            throw new UnexpectedValueException("Central's response to ".self::requestLine($response).' has no list under "'.$key.'".');
        }

        return [$items];
    }

    /**
     * The records as models of the request's class, or as arrays when it has none.
     *
     * @param  class-string<Data>|null  $dto
     * @return Collection<int, Data|array<string, mixed>>
     */
    public static function items(Response $response, string $key, ?string $dto): Collection
    {
        return collect(self::records($response, $key))->map(fn (array $item) => $dto === null ? $item : $dto::from($item));
    }

    /**
     * The one record in the response (the whole body, or what is under $key), or null when Central sent nothing.
     *
     * @param  class-string<Data>|null  $dto
     * @return Data|array<string, mixed>|null
     */
    public static function object(Response $response, string $key, ?string $dto): mixed
    {
        $json = self::json($response);

        if ($json === null || $json === []) {
            return null;
        }

        $record = $key === '' ? $json : (is_array($json) ? data_get($json, $key) : null);

        if (is_array($record) && array_is_list($record)) {
            $record = $record[0] ?? null;
        }

        if (! is_array($record)) {
            return $record === null ? null : ['value' => $record];
        }

        return $dto === null ? $record : $dto::from($record);
    }

    /**
     * The total number of records Central says match, under $key; null when it didn't say.
     */
    public static function total(Response $response, ?string $key): ?int
    {
        if ($key === null) {
            return null;
        }

        $json = self::json($response);
        $total = is_array($json) ? data_get($json, $key) : null;

        return is_int($total) || (is_string($total) && ctype_digit($total)) ? (int) $total : null;
    }

    /**
     * The list's records, with a plain value (a list of names, say) as a record whose one key is "value".
     *
     * @param  list<mixed>  $items
     * @return list<array<string, mixed>>
     */
    private static function onlyArrays(array $items): array
    {
        return array_values(array_map(
            fn (mixed $item) => is_array($item) ? $item : ['value' => $item],
            array_filter($items, fn (mixed $item) => $item !== null),
        ));
    }

    private static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }
}
