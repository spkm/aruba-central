<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A SessionRecord record.
 */
readonly class SessionRecord extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $ips
     */
    public function __construct(
        /** Accounting Identifier */
        public ?string $acctId = null,
        /** Type of the AirPass request */
        public ?string $airpassType = null,
        /** Category of the authentication request */
        public ?string $authCategory = null,
        /** Request Identifier of the corresponding authentciation request */
        public ?string $authReqId = null,
        /** Type of the client */
        public ?string $clientType = null,
        /** Type of connection */
        public ?string $connType = null,
        /** Duration of the session */
        public ?int $duration = null,
        /** Session start time */
        public ?CarbonImmutable $endAt = null,
        /** Input data bytes */
        public ?int $inputBytes = null,
        /** IP address of the client */
        public ?array $ips = null,
        /** Is the session closed */
        public ?bool $isClosed = null,
        /** Set to true if the MAC address is a randomized MAC */
        public ?bool $isMacRandomized = null,
        /** MAC(Calling-Station-Id) from the request */
        public ?string $mac = null,
        /** Multi Accounting Identifer, where avialable */
        public ?string $multiAcctId = null,
        /** IP address of the acces device */
        public ?string $nadIp = null,
        /** MAC of the access device */
        public ?string $nadMAC = null,
        /** Name of the access device */
        public ?string $nadName = null,
        /** Output data bytes */
        public ?int $outputBytes = null,
        /** Accounting packet type start/update/stop */
        public ?string $pktType = null,
        /** Unique id of poral identity. */
        public ?string $portalIdentityID = null,
        /** Name of the SSID */
        public ?string $ssid = null,
        /** Session start time */
        public ?CarbonImmutable $startAt = null,
        /** Customer Identifier */
        public ?string $tenantId = null,
        /** Updation timestamp */
        public ?CarbonImmutable $updatedAt = null,
        /** User's identity */
        public ?string $userId = null,
    ) {}
}
