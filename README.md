![Banner](https://banners.beyondco.de/Aruba%20Central.png?theme=dark&packageManager=composer+require&packageName=spkm%2Faruba-central&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Tests](https://github.com/spkm/aruba-central/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/spkm/aruba-central/actions/workflows/tests.yml?branch=main)
[![Latest version](https://img.shields.io/packagist/v/spkm/aruba-central)](https://packagist.org/packages/spkm/aruba-central)
[![PHP version](https://img.shields.io/packagist/php-v/spkm/aruba-central)](https://packagist.org/packages/spkm/aruba-central)

A Laravel package for the [HPE Aruba Networking Central](https://www.hpe.com/us/en/aruba-central.html) REST APIs,
built with [Saloon](https://docs.saloon.dev). It covers both APIs in one facade: **new Central** (the HPE GreenLake
platform) is what `Aruba::` talks to, and **classic Central** sits behind `Aruba::classic()`. Each has a typed model,
a request and an Eloquent-style query builder for every API its reference documents.

```php
use spkm\ArubaCentral\Facades\Aruba;

// New Central
$down = Aruba::devices()->where('status', 'OFFLINE')->orderBy('deviceName')->get();
$client = Aruba::clients()->find('aa:bb:cc:dd:ee:ff');
$onAp = Aruba::clients()->with('serial-number', 'CN12345678')->get();   // clients connected to one AP
$alerts = Aruba::alerts()->where('severity', 'Critical')->all();
$wlans = Aruba::configuration()->wlanSsids()->get();

foreach (Aruba::accessPoints()->lazy() as $ap) {
    // one page at a time
}

// Classic Central
$aps = Aruba::classic()->monitoring()->accessPoints()->where('group', 'Staff')->get();
$sites = Aruba::classic()->monitoring()->sites()->all();
$roles = Aruba::classic()->userManagement()->roles()->get();
```

## Requirements

- PHP 8.5
- Laravel 12.39 or higher, or Laravel 13
- For new Central: an API client created in the HPE GreenLake platform (Manage Workspace > Personal API clients)
  whose service manager is your Central instance. Its tokens carry the role of the user who created it.
- For classic Central: an API client app and a token from its API Gateway. In a Central that opens on the new
  interface, switch to Classic Central with the toggle at the top of the page, then go to Organization > Platform
  Integration, click REST API on the API Gateway card and open System Apps & Tokens (in the older interface,
  Account Home > Global Settings > API Gateway). Add Apps & Tokens creates the app, whose row shows the client id
  and secret; View Tokens then Download Token gives a JSON file whose `refresh_token` is the seed the package
  keeps alive from there. The APIs tab of the same page shows the gateway address.

## Installation

```bash
composer require spkm/aruba-central
php artisan aruba:install
```

The install command publishes `config/aruba.php`. Set the gateway addresses (shown under API Gateway in each
Central) and the credentials in `.env`:

```dotenv
# New Central
ARUBA_BASE_URL=
ARUBA_CLIENT_ID=...
ARUBA_CLIENT_SECRET=...

# Classic Central
ARUBA_CLASSIC_BASE_URL=
ARUBA_CLASSIC_CLIENT_ID=...
ARUBA_CLASSIC_CLIENT_SECRET=...
ARUBA_CLASSIC_REFRESH_TOKEN=...
```

Either side can be left unconfigured; it is only built the first time it is used.

## Usage

### Two APIs, one facade

`Aruba::` is new Central: every API group is a method on the facade (`Aruba::devices()`, `Aruba::sites()`…), and
`Aruba::central()` gives the same connector for passing around. `Aruba::classic()` is classic Central, whose groups
are methods on the connector it returns (`Aruba::classic()->monitoring()`, `Aruba::classic()->firmware()`…).
Another tenant configured under `connections` is reached with `Aruba::connection('name')` and
`Aruba::classic('name')`.

### Two ways to call Central

**Resources** give an Eloquent-style builder for each collection, reached from the API group it belongs to. They
return models and throw an `ArubaApiException` when Central answers with an error:

```php
$switch = Aruba::switches()->find('...');                     // SwitchDetails or null
$count = Aruba::devices()->where('deviceType', 'ACCESS_POINT')->count();
$ports = Aruba::switches()->interfacesOf('...')->all();       // Collection of records
Aruba::alerts()->clear(['keys' => ['...'], 'reason' => 'Resolved']); // an action the API documents
```

**Requests** are plain Saloon, for when you want the response itself:

```php
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\GetDevicesRequest;
use spkm\ArubaCentral\Central\Query;

$response = Aruba::send(new GetDevicesRequest(Query::make()->where('status', '=', 'ONLINE')->limit(50)));
$response->status();
$response->json();
$response->dto();   // the same models the resource gives; throws ArubaApiException for an error status
```

`Aruba::get()`, `post()`, `put()`, `patch()` and `delete()` send any path, and `Aruba::from('/path', 'items')` gives a
builder over a list the package has no resource for, returning arrays. The same five methods and `from()` exist on
`Aruba::classic()`. Every resource, request and model is listed in [ENDPOINTS.md](ENDPOINTS.md).

### Resources

Each API group is a method on the facade (new Central) or on `Aruba::classic()`, and larger groups have a method per
collection. A collection with a main list gives a builder; its other operations are methods on the builder, which
return a model, a builder over a sub-list, or the response as an array for an action.

```php
Aruba::gateways()->find('...');                          // by serial, null when there is none
Aruba::gateways()->portsOf('...')->get();                // a builder over the gateway's ports
Aruba::accessPoints()->topByUsage()->with('site-id', 'S1')->get();
Aruba::clients()->with('serial-number', '...')->get();     // the clients on that AP, connected ones by default
Aruba::notificationRules()->create([...]);
Aruba::notificationRules()->update($id, ['enabled' => false]);
Aruba::webhooks()->rotateHmacKey($id);
Aruba::troubleshooting()->accessPoints('...')->initiateApPing(['hostname' => 'example.com']);
Aruba::classic()->monitoring()->clients()->wireless()->where('group', 'Staff')->get();
Aruba::classic()->deviceManagement()->sendCommandToDevice('...', 'reboot');
```

Query options an operation documents, beyond what the builder writes, go in the last array argument of a method,
or through `with()` on a builder. A list that always needs one is sent what its reference page gives as the default
(classic's unified clients, say, ask for connected wireless clients from the last three hours); one with no default,
such as the device inventory's `sku_type` or the firmware list's `device_type`, needs it from you:

```php
Aruba::classic()->deviceInventory()->where('sku_type', 'iap')->all();
Aruba::classic()->firmware()->where('device_type', 'CX')->get();
Aruba::classic()->aiOps()->insights()->with('from', $from->getTimestampMs())->with('to', $to->getTimestampMs())->get();
```

### The query builder

Both APIs filter, sort and page in the query string, and the builder writes those parameters the way each reads
them.

```php
// New Central: filter as an OData expression, sort as "field asc", limit and next, start-at and end-at
Aruba::devices()
    ->where('status', 'ONLINE')                               // status eq 'ONLINE'
    ->whereIn('deviceType', ['ACCESS_POINT', 'SWITCH'])       // deviceType in ('ACCESS_POINT', 'SWITCH')
    ->orderByDesc('deviceName')                               // sort=deviceName desc
    ->limit(100)                                              // limit=100
    ->get();

Aruba::audits()->between(now()->subDay(), now())->get();      // start-at=…&end-at=… (RFC 3339)
Aruba::alerts()->configurations()->with('scope-id', $scopeId)->get();
Aruba::wids()->monitoredAps()->where('lastSeen', '>=', now()->subDay()->getTimestampMs())->get();

// Classic Central: each condition is a named parameter, sort as +field or -field, limit and offset,
// from_timestamp and to_timestamp as Unix seconds
Aruba::classic()->monitoring()->accessPoints()
    ->where('group', 'Staff')                                 // group=Staff
    ->where('status', 'Up')                                   // status=Up
    ->orderBy('serial')                                       // sort=+serial
    ->between(now()->subHours(3), now())                      // from_timestamp=…&to_timestamp=…
    ->with('calculate_total', 'true')
    ->get();
```

| Builder | New Central | Classic Central |
|---|---|---|
| `where($f, $value)`, `where($f, '=', $value)` | `f eq value` | `f=value` |
| `where($f, '!=' / '>' / '>=' / '<' / '<=', $value)` | `ne` `gt` `ge` `lt` `le`, on the fields a list allows them for | not available |
| `whereIn($f, [...])` | `f in (a, b)` | `f=a,b` |
| `whereContains($f, $text)` | `contains(f, 'text')`, on the fields a list allows it for | not available |
| `orderBy($f)`, `orderByDesc($f)` | `sort=f asc` / `f desc` | `sort=+f` / `-f` |
| `between($from, $to)` | `start-at`, `end-at` (RFC 3339) | `from_timestamp`, `to_timestamp` (Unix seconds) |
| `with($name, $value)` | any parameter, as given | any parameter, as given |

Dates can be strings, Unix timestamps or `DateTimeInterface` objects. Conditions are ANDed; new Central's grammar
has no OR. Each list accepts filters and sorts on the fields its reference page names, and rejects others with a
400 that says so: most lists take `eq` and `in` only, with the comparison operators reserved for timestamp fields
(trend lists compare RFC 3339 strings, the WIDS lists milliseconds since the epoch). Enumerated values are spelt as
the API spells them, such as a device status of `ONLINE` or `OFFLINE` and an alert status of `Active`, `Deferred`
or `Cleared`.

Fetching:

| Call | Returns |
|---|---|
| `get()` | a `Collection` of models: one page, as many as `limit()` asked for or the endpoint's default |
| `all()` | a `Collection` of every matching record, fetched a page at a time |
| `first()` | one model or null, in sort order |
| `count()`, `exists()` | how many records match, where the endpoint says (classic asks for `calculate_total`) |
| `find($id)`, `findOrFail($id)` | one model by its id (serial, name, MAC…), null (or `NotFoundException`) when there is none |
| `lazy($perPage)`, `cursor()` | a `LazyCollection` that fetches each page as the loop reaches it |
| `paginate($perPage)` | a Saloon paginator, for stepping through pages yourself |
| `toRequest()`, `toQuery()`, `toArray()` | the request, the query or the parameters the builder would send |

Paging follows what each endpoint documents: by `limit` and the `next` token new Central hands back, by `offset`
and `limit`, by page number, or by the cursor a few classic lists use (`last_client_mac`, `marker`, `cursor`). The
paginator stops at an empty or short page, at the total when the response carries one, or when no cursor comes
back, and never asks for more than the endpoint allows per page.

### Models

Every record is a `readonly` class under `spkm\ArubaCentral\Central\Data\{Section}` or
`spkm\ArubaCentral\Classic\Data\{Section}` whose properties carry Central's own names and types: `integer` as
`int`, `number` as `float`, `boolean` as `bool`, `string` as `string` (with the allowed values in the property's
comment where Central lists them), `date-time` as `CarbonImmutable` (classic's Unix timestamps, in seconds or
milliseconds, too), and objects and lists as arrays. All are nullable. Anything Central adds later is ignored on the
way in; `toArray()` and `json_encode()` give the record back in Central's keys, leaving out what is null. The few
keys that aren't PHP identifiers (kebab-case ones, for instance) are properties with underscores and serialise under
Central's name.

```php
$device = Aruba::devices()->first();
$device->serialNumber;
$device->lastSeenAt?->diffForHumans();

$ap = Aruba::classic()->monitoring()->accessPoints()->find('...');
$ap->status;               // 'Up' or 'Down'
$ap->last_modified;        // Unix seconds, as classic sends it
```

### Configuration profiles (new Central)

New Central's configuration API keeps a profile type for every setting (WLAN SSIDs, roles, VLANs, NTP, DNS and
some two hundred more), each with the same six operations. `Aruba::configuration()` has a method per type, and
`profile($type)` for any other:

```php
$config = Aruba::configuration();

$config->wlanSsids()->get();                                     // GET /network-config/v1alpha1/wlan-ssids
$config->wlanSsids()->find('Staff');                             // GET …/wlan-ssids/Staff
$config->wlanSsids()->store('Guests', ['essid' => ['name' => 'Guests']]);   // POST …/wlan-ssids/Guests
$config->wlanSsids()->update('Guests', ['hide-ssid' => true]);  // PATCH
$config->wlanSsids()->replace('Guests', [...]);                  // PUT
$config->wlanSsids()->delete('Guests');                          // DELETE
$config->roles()->local($siteScopeId, 'CAMPUS_AP')->get();       // the site's local roles rather than the library's
$config->sites()->get();                                         // scope management, device groups, hierarchy…
$config->profile('some-new-type')->get();
```

Profile records are `Profile` models: `name`, `description` and everything else the type defines, under Central's
kebab-case keys, in `$extra`. The configuration API is marked alpha by HPE and its schemas change between releases,
which is why profiles are not modelled field by field.

### Service configuration (classic Central)

Classic Central's AirGroup, AirMatch, IDS/IPS, IPMS, overlay WLAN, RAPIDS, SD-WAN and UCC services keep their
configuration per node (GLOBAL, or a group) as sections under `/config`. `Aruba::classic()->services()` gives a
`NodeConfigResource` for each:

```php
$airgroup = Aruba::classic()->services()->airgroup('GROUP', 'Staff');

$airgroup->node();                              // GET /airgroup-config/v2/node_list/GROUP/Staff
$airgroup->get();                               // GET …/config
$airgroup->get('servers_list');                 // GET …/config/servers_list
$airgroup->create('servers_list', [...]);       // POST
$airgroup->replace('servers_list', [...], 'x'); // PUT …/config/servers_list/x
$airgroup->delete('servers_list', 'x');         // DELETE
```

The sections each service documents are listed in [ENDPOINTS.md](ENDPOINTS.md).

### Writing

A resource creates, updates (PATCH), replaces (PUT) and deletes where Central documents it, taking an array of
Central's field names or a model:

```php
$rule = Aruba::notificationRules()->create(['name' => 'Critical alerts', ...]);
Aruba::notificationRules()->update($rule->id, ['enabled' => false]);
Aruba::notificationRules()->delete($rule->id);
Aruba::classic()->monitoring()->sites()->create(['site_name' => 'Annexe', 'site_address' => [...]]);
```

`create()` returns what Central sends back: the record, or a status for an asynchronous operation (new Central
answers many writes with 202 and a task to poll; the resource has a method for the poll). A resource without a
documented write throws a `LogicException` rather than guessing at a path.

### Errors

A request that Central answers with an error throws a `spkm\ArubaCentral\ArubaApiException` (a Saloon
`RequestException`) from `dto()` and from every resource method; `Aruba::send()` gives you the response to inspect
instead.

| Central's answer | Exception |
|---|---|
| 400, 405, 406, 409, 412, 413, 415, 417 | `InvalidRequestException` |
| 401, 403 (the client lacks the permission) | `UnauthorizedException` |
| 404 | `NotFoundException` |
| 422 | `ValidationException`, an `InvalidRequestException` |
| 429 | `RateLimitedException`, with `retryAfter()`, `remaining()` and `remainingToday()` from the rate-limit headers |
| 408, 5xx, or a success whose body isn't JSON | `ServerErrorException` |

The message says what happened (`Aruba Central responded 400 to GET /network-monitoring/v1/devices:
HPE_GL_NETWORK_MONITORING_INVALID_INPUT; site-id is required`): the API's error code and message in whichever
shape the service uses. `errorCode()`, `apiMessage()` and `debugId()` give the parts.

New Central allows 10 calls a second per account and classic 7 a second plus a daily quota; a 429 is retried
automatically only when retries are on.

### Tokens

New Central's token is fetched from HPE GreenLake with the client credentials grant before the first request and
cached, encrypted, in the application's cache until a minute before it expires (two hours). Classic Central's
token pair is refreshed before the first request and whenever the access token is about to expire; because a
refresh can replace the refresh token and invalidate the old one, the current pair is kept outside the cache, in an
encrypted file under `storage/app/aruba-central` (`ARUBA_CLASSIC_TOKEN_PATH` moves it, `ARUBA_CLASSIC_TOKEN_STORE=cache`
keeps it in the cache instead, and the class name of your own `TokenStore` uses that). Concurrent refreshes take a
cache lock, so two workers never spend the same refresh token. A 401 from either API fetches a new token and sends
the request once more.

`Aruba::classic()->token()` gives the pair held and `forgetToken()` starts again from the configured seed. A refresh
token that has expired (fifteen days unused) or been revoked is reported as an `UnauthorizedException`; generate a
new token in API Gateway and put its refresh token in `ARUBA_CLASSIC_REFRESH_TOKEN`.

### Several tenants

Add other tenants under `connections` in `config/aruba.php`, each with a `central` and/or `classic` block, and reach
them with `Aruba::connection('name')` and `Aruba::classic('name')`, which give connectors with the same resources and
methods as the defaults.

### Caching, timeouts and retries

- `ARUBA_CACHE=true` caches GET responses for `cache.seconds` (an hour) in `cache.store`.
- `ARUBA_CONNECT_TIMEOUT` and `ARUBA_REQUEST_TIMEOUT` (10 and 30 seconds).
- `ARUBA_RETRIES=3` retries a GET up to three times, with backoff, on a connection failure, 408, 429 or 5xx.
  Writes are never retried.
- `reauthenticate` (on by default) fetches a new token and resends once when Central answers 401.
- `pagination.per_page` (100) sets the page size `all()`, `lazy()` and `paginate()` ask for, capped at what each
  endpoint allows.

## Testing

```bash
composer test
```

The suite fakes both Centrals with Saloon's `MockClient`; nothing reaches a real tenant.

## Contributing

Run `composer install` once to enable the pre-commit hook, which runs Pint, PHPStan and the tests.

## Security

If you discover a security issue, please email hello@spkmitchell.co.uk rather than opening an issue.

## Credits

- [Simon Mitchell](https://github.com/spkm)

## Licence

MIT.
