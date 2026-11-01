<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A CXStackPortList record.
 */
readonly class CXStackPortList extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $member_port_detail
     */
    public function __construct(
        /** Number of Members */
        public ?int $total_members = null,
        /** List of Ports for the member A list of CXMemberPortList records. */
        public ?array $member_port_detail = null,
    ) {}
}
