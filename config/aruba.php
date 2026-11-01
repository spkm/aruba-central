<?php

return [
    // New Central (what the Aruba facade talks to unless you ask for classic()): an HPE GreenLake API client whose
    // service manager is your Central instance, and the API gateway address shown under Central's API Gateway page,
    // such as https://de3.api.central.arubanetworks.com.
    'central' => [
        'base_url' => env('ARUBA_BASE_URL'),
        'client_id' => env('ARUBA_CLIENT_ID'),
        'client_secret' => env('ARUBA_CLIENT_SECRET'),
        'token_url' => env('ARUBA_TOKEN_URL', 'https://sso.common.cloud.hpe.com/as/token.oauth2'),
    ],

    // Classic Central, reached with Aruba::classic(): an app under API Gateway > System Apps & Tokens, and the
    // refresh token from a token generated there. The package keeps that token alive, so it is only a seed.
    'classic' => [
        'base_url' => env('ARUBA_CLASSIC_BASE_URL'),
        'client_id' => env('ARUBA_CLASSIC_CLIENT_ID'),
        'client_secret' => env('ARUBA_CLASSIC_CLIENT_SECRET'),
        'refresh_token' => env('ARUBA_CLASSIC_REFRESH_TOKEN'),

        // Where the current token pair is kept, since each refresh replaces the refresh token: 'file' (encrypted,
        // under token_path), 'cache' (encrypted, forever), or the class name of your own TokenStore.
        'token_store' => env('ARUBA_CLASSIC_TOKEN_STORE', 'file'),
        'token_path' => env('ARUBA_CLASSIC_TOKEN_PATH'),
    ],

    // Other tenants, used with Aruba::connection('name') and Aruba::classic('name'):
    // 'connections' => [
    //     'other' => [
    //         'central' => ['base_url' => ..., 'client_id' => ..., 'client_secret' => ...],
    //         'classic' => ['base_url' => ..., 'client_id' => ..., 'client_secret' => ..., 'refresh_token' => ...],
    //     ],
    // ],
    'connections' => [],

    'timeouts' => [
        'connect' => env('ARUBA_CONNECT_TIMEOUT', 10),
        'request' => env('ARUBA_REQUEST_TIMEOUT', 30),
    ],

    'retries' => [
        'times' => env('ARUBA_RETRIES'),
        'interval_ms' => 500,
    ],

    // Fetch a new token and send the request again, once, when Central answers 401 to it.
    'reauthenticate' => true,

    'cache' => [
        'enabled' => env('ARUBA_CACHE', false),
        'store' => env('ARUBA_CACHE_STORE'),
        'seconds' => 3600,
    ],

    'pagination' => [
        // Records per page when paging through a list with all(), lazy() or paginate(), unless the endpoint allows
        // fewer.
        'per_page' => 100,
    ],
];
