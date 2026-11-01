<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A ProtocolMap record.
 */
readonly class ProtocolMap extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $protocol_name
     */
    public function __construct(
        /** Keys: proto, proto_no, sport, eport. */
        public ?array $protocol_name = null,
    ) {}
}
