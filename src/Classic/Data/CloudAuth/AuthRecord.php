<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A AuthRecord record.
 */
readonly class AuthRecord extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $endpointTags
     * @param  array<mixed>|null  $userGroups
     */
    public function __construct(
        /** Type of the AirPass request Values: portal | sim */
        public ?string $airpassType = null,
        /** AP group name send by AP */
        public ?string $apGroup = null,
        /** LocationID sent by Aruba AP */
        public ?string $arubaLocationID = null,
        /** Aruba-User-Role applied */
        public ?string $arubaRole = null,
        /** Category of the authentication request Values: airpass | eduroam | others */
        public ?string $authCategory = null,
        /** Authentication status */
        public ?bool $authStatus = null,
        /** Auth User Id - This field is used to preserve actual value in captive portal case */
        public ?string $authUserID = null,
        /** Authorization status */
        public ?bool $authzStatus = null,
        /** Airpass carrier (eg ATT, Verizon) */
        public ?string $carrier = null,
        /** Client certificate expiry time. */
        public ?CarbonImmutable $certExpiry = null,
        /** Client certificate Issuer Der */
        public ?string $certIssuerDer = null,
        /** Client certificate serial num */
        public ?string $certSerialNum = null,
        /** Client certificate subject cn */
        public ?string $certSubject = null,
        /** Client certificate subject Der */
        public ?string $certSubjectDer = null,
        /** Chargable user identity */
        public ?string $chargeableUserID = null,
        /** Type of the client Values: user | guest | unmanaged */
        public ?string $clientType = null,
        /** Type of connection Values: wired | wireless */
        public ?string $connType = null,
        /** EAP protocol type (eg EAP-TLS) */
        public ?string $eapType = null,
        /** Client tags from CPDI/added by admin */
        public ?array $endpointTags = null,
        /** Error category of the authentication request Values: unauthorized | certificate | configuration | server | client */
        public ?string $errorCategory = null,
        /** Error message from request processing */
        public ?string $errorMessage = null,
        /** Error type from request processing */
        public ?string $errorType = null,
        /** Identity Store used to retrieve user information. */
        public ?string $identityStore = null,
        /** Set to true if the MAC address is a randomized MAC */
        public ?bool $isMacRandomized = null,
        /** MAC address */
        public ?string $mac = null,
        /** MPSK Name */
        public ?string $mpskName = null,
        /** IP address of the access device */
        public ?string $nadIP = null,
        /** Radius NAS identifier */
        public ?string $nadIdentifier = null,
        /** MAC of the access device */
        public ?string $nadMAC = null,
        /** Name of the access device */
        public ?string $nadName = null,
        /** Radius NAS port */
        public ?string $nadPort = null,
        /** Radius NAS port type */
        public ?string $nadPortType = null,
        /** NAD Central site */
        public ?string $nadSite = null,
        /** Operator name. */
        public ?string $operatorName = null,
        public ?string $os = null,
        /** Policy permission group */
        public ?string $permGroup = null,
        public ?string $platformName = null,
        /** Type of policy */
        public ?string $policyType = null,
        /** Portal Identity fields not persisted to db. */
        public ?string $portalAuthSource = null,
        public ?string $portalIdentityID = null,
        /** Request Identifier */
        public ?string $requestID = null,
        /** Name of the SSID */
        public ?string $ssid = null,
        /** Status of the authentication request Values: accept | reject | timeout */
        public ?string $status = null,
        /** Customer Identifier */
        public ?string $tenantID = null,
        /** Timestamp of the request */
        public ?CarbonImmutable $timestamp = null,
        /** Department from identity store. */
        public ?string $userDepartment = null,
        /** User display name */
        public ?string $userDisplayName = null,
        /** User email address */
        public ?string $userEmail = null,
        /** User Groups from the identity store. */
        public ?array $userGroups = null,
        /** User identity */
        public ?string $userID = null,
        /** User Principal Name */
        public ?string $userPrincipalName = null,
    ) {}
}
