# Endpoints

Every call the package makes to Aruba Central, by API. New Central resources are reached from the facade,
`Aruba::{group}()`, and classic Central's from `Aruba::classic()->{group}()`; requests are plain Saloon classes under
`spkm\ArubaCentral\Central\Requests\{Section}\{Group}` and `spkm\ArubaCentral\Classic\Requests\{Section}\{Group}`
for `Aruba::send()` and `Aruba::classic()->send()`.

## New Central

### Assignments: Config Assignment

`Aruba::configuration()->assignments()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->assignments()` | a builder over `ArubaConfigAssignmentConfigAssignmentsSchemaGETItem` records (GET `/network-config/v1alpha1/config-assignments`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()` |
| `Aruba::configuration()->assignments()->deleteConfigAssignmentsConfigAssignmentByID($scopeId, $deviceFunction, $profileType, $profileInstance)` | status or null (DELETE `/network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}`) |
| `Aruba::configuration()->assignments()->replaceConfigAssignmentsConfigAssignmentByID($scopeId, $deviceFunction, $profileType, $profileInstance)` | `Successful200` or null (PUT `/network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\ConfigAssignment\ReadConfigAssignmentsRequest` | GET | `/network-config/v1alpha1/config-assignments` | `Collection` of `ArubaConfigAssignmentConfigAssignmentsSchemaGETItem` |
| `Config\ConfigAssignment\CreateConfigAssignmentsRequest` | POST | `/network-config/v1alpha1/config-assignments` | `Successful200` or null |
| `Config\ConfigAssignment\DeleteConfigAssignmentsConfigAssignmentByIDRequest` | DELETE | `/network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}` | array or null |
| `Config\ConfigAssignment\ReplaceConfigAssignmentsConfigAssignmentByIDRequest` | PUT | `/network-config/v1alpha1/config-assignments/{scope-id}/{device-function}/{profile-type}/{profile-instance}` | `Successful200` or null |

### Central NAC: Cda Airpass Approval

`Aruba::configuration()->airpassApprovals()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->airpassApprovals()` | a builder over `ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem` records (GET `/network-config/v1alpha1/airpass-approval`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::configuration()->airpassApprovals()->readAirpassApprovalApprovalByID($name)` | `ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet` or null (GET `/network-config/v1alpha1/airpass-approval/{name}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\CdaAirpassApproval\ReadAirpassApprovalRequest` | GET | `/network-config/v1alpha1/airpass-approval` | `Collection` of `ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem` |
| `Config\CdaAirpassApproval\ReadAirpassApprovalApprovalByIDRequest` | GET | `/network-config/v1alpha1/airpass-approval/{name}` | `ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet` or null |

### Central NAC Service: DPP Registration

`Aruba::configuration()->nacDppRegistrations()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacDppRegistrations()->listDppRegistrations()` | a builder over `CdaDppReg` records (GET `/network-config/v1alpha1/cnac-dpp-reg`) |
| `Aruba::configuration()->nacDppRegistrations()->createDppRegistration()` | `CdaDppRegCreate` or null (POST `/network-config/v1alpha1/cnac-dpp-reg`) |
| `Aruba::configuration()->nacDppRegistrations()->updateDppRegistration()` | `CdaDppReg` or null (PUT `/network-config/v1alpha1/cnac-dpp-reg`) |
| `Aruba::configuration()->nacDppRegistrations()->deleteDppRegistration($id)` | status or null (DELETE `/network-config/v1alpha1/cnac-dpp-reg/{id}`) |
| `Aruba::configuration()->nacDppRegistrations()->getDppRegistration($id)` | `CdaDppReg` or null (GET `/network-config/v1alpha1/cnac-dpp-reg/{id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\DPPRegistration\ListDppRegistrationsRequest` | GET | `/network-config/v1alpha1/cnac-dpp-reg` | `Collection` of `CdaDppReg` |
| `Config\DPPRegistration\CreateDppRegistrationRequest` | POST | `/network-config/v1alpha1/cnac-dpp-reg` | `CdaDppRegCreate` or null |
| `Config\DPPRegistration\UpdateDppRegistrationRequest` | PUT | `/network-config/v1alpha1/cnac-dpp-reg` | `CdaDppReg` or null |
| `Config\DPPRegistration\DeleteDppRegistrationRequest` | DELETE | `/network-config/v1alpha1/cnac-dpp-reg/{id}` | array or null |
| `Config\DPPRegistration\GetDppRegistrationRequest` | GET | `/network-config/v1alpha1/cnac-dpp-reg/{id}` | `CdaDppReg` or null |

### Central NAC Service: Image

`Aruba::configuration()->nacImages()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacImages()->listImages()` | a builder over `CdaImage` records (GET `/network-config/v1alpha1/cnac-image`) |
| `Aruba::configuration()->nacImages()->streamDownloadImageFile($imageId)` | the response as an array, or null (GET `/network-config/v1alpha1/cnac-image/download/{image-id}`) |
| `Aruba::configuration()->nacImages()->uploadImageFile()` | `ImageUploadResource` or null (POST `/network-config/v1alpha1/cnac-image/upload`) |
| `Aruba::configuration()->nacImages()->getImageMetadata($imageId)` | a builder over `CdaImage` records (GET `/network-config/v1alpha1/cnac-image/{image-id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Image\ListImagesRequest` | GET | `/network-config/v1alpha1/cnac-image` | `Collection` of `CdaImage` |
| `Config\Image\StreamDownloadImageFileRequest` | GET | `/network-config/v1alpha1/cnac-image/download/{image-id}` | array or null |
| `Config\Image\UploadImageFileRequest` | POST | `/network-config/v1alpha1/cnac-image/upload` | `ImageUploadResource` or null |
| `Config\Image\GetImageMetadataRequest` | GET | `/network-config/v1alpha1/cnac-image/{image-id}` | `Collection` of `CdaImage` |

### Central NAC Service: Job

`Aruba::configuration()->nacJobs()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacJobs()->listCdaJobs()` | a builder over `CdaJob` records (GET `/network-config/v1alpha1/cnac-job`) |
| `Aruba::configuration()->nacJobs()->deleteCdaJob($jobId)` | status or null (DELETE `/network-config/v1alpha1/cnac-job/{job-id}`) |
| `Aruba::configuration()->nacJobs()->streamDownloadResultFile($jobId)` | the response as an array, or null (GET `/network-config/v1alpha1/cnac-job/{job-id}`) |
| `Aruba::configuration()->nacJobs()->streamDownloadErrorFile($jobId)` | the response as an array, or null (GET `/network-config/v1alpha1/cnac-job/{job-id}/error`) |
| `Aruba::configuration()->nacJobs()->streamDownloadInputFile($jobId)` | the response as an array, or null (GET `/network-config/v1alpha1/cnac-job/{job-id}/input`) |
| `Aruba::configuration()->nacJobs()->getCdaJob($jobId)` | a builder over `CdaJob` records (GET `/network-config/v1alpha1/cnac-job/{job-id}/status`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Job\ListCdaJobsRequest` | GET | `/network-config/v1alpha1/cnac-job` | `Collection` of `CdaJob` |
| `Config\Job\DeleteCdaJobRequest` | DELETE | `/network-config/v1alpha1/cnac-job/{job-id}` | array or null |
| `Config\Job\StreamDownloadResultFileRequest` | GET | `/network-config/v1alpha1/cnac-job/{job-id}` | array or null |
| `Config\Job\StreamDownloadErrorFileRequest` | GET | `/network-config/v1alpha1/cnac-job/{job-id}/error` | array or null |
| `Config\Job\StreamDownloadInputFileRequest` | GET | `/network-config/v1alpha1/cnac-job/{job-id}/input` | array or null |
| `Config\Job\GetCdaJobRequest` | GET | `/network-config/v1alpha1/cnac-job/{job-id}/status` | `Collection` of `CdaJob` |

### Central NAC Service: MAC Registration

`Aruba::configuration()->nacMacRegistrations()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacMacRegistrations()` | a builder over `CdaMacReg` records (GET `/network-config/v1alpha1/cnac-mac-reg`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()`, `delete()` |
| `Aruba::configuration()->nacMacRegistrations()->updateMacRegistration()` | `CdaMacReg` or null (PUT `/network-config/v1alpha1/cnac-mac-reg`) |
| `Aruba::configuration()->nacMacRegistrations()->exportMacCsvFile()` | the response as an array, or null (GET `/network-config/v1alpha1/cnac-mac-reg/export`) |
| `Aruba::configuration()->nacMacRegistrations()->importMacCsvFile()` | `Job` or null (POST `/network-config/v1alpha1/cnac-mac-reg/import`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\MACRegistration\GetMacRegistrationsRequest` | GET | `/network-config/v1alpha1/cnac-mac-reg` | `Collection` of `CdaMacReg` |
| `Config\MACRegistration\CreateMacRegistrationRequest` | POST | `/network-config/v1alpha1/cnac-mac-reg` | `CdaMacReg` or null |
| `Config\MACRegistration\UpdateMacRegistrationRequest` | PUT | `/network-config/v1alpha1/cnac-mac-reg` | `CdaMacReg` or null |
| `Config\MACRegistration\ExportMacCsvFileRequest` | GET | `/network-config/v1alpha1/cnac-mac-reg/export` | array or null |
| `Config\MACRegistration\ImportMacCsvFileRequest` | POST | `/network-config/v1alpha1/cnac-mac-reg/import` | `Job` or null |
| `Config\MACRegistration\DeleteMacRegistrationRequest` | DELETE | `/network-config/v1alpha1/cnac-mac-reg/{id}` | array or null |

### Central NAC Service: MPSK Registration

`Aruba::configuration()->nacMpskRegistrations()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacMpskRegistrations()->getNamedMPSK()` | a builder over `CdaNamedMpsk` records (GET `/network-config/v1alpha1/cnac-named-mpsk-reg`) |
| `Aruba::configuration()->nacMpskRegistrations()->createNamedMPSK()` | `CdaNamedMpsk` or null (POST `/network-config/v1alpha1/cnac-named-mpsk-reg`) |
| `Aruba::configuration()->nacMpskRegistrations()->updateNamedMPSK()` | `CdaNamedMpsk` or null (PUT `/network-config/v1alpha1/cnac-named-mpsk-reg`) |
| `Aruba::configuration()->nacMpskRegistrations()->exportNamedMPSKCsvFile($identityStoreId)` | the response as an array, or null (GET `/network-config/v1alpha1/cnac-named-mpsk-reg/export`) |
| `Aruba::configuration()->nacMpskRegistrations()->importNamedMPSKCsvFile()` | `Job` or null (POST `/network-config/v1alpha1/cnac-named-mpsk-reg/import`) |
| `Aruba::configuration()->nacMpskRegistrations()->deleteNamedMPSK($id)` | status or null (DELETE `/network-config/v1alpha1/cnac-named-mpsk-reg/{id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\MPSKRegistration\GetNamedMPSKRequest` | GET | `/network-config/v1alpha1/cnac-named-mpsk-reg` | `Collection` of `CdaNamedMpsk` |
| `Config\MPSKRegistration\CreateNamedMPSKRequest` | POST | `/network-config/v1alpha1/cnac-named-mpsk-reg` | `CdaNamedMpsk` or null |
| `Config\MPSKRegistration\UpdateNamedMPSKRequest` | PUT | `/network-config/v1alpha1/cnac-named-mpsk-reg` | `CdaNamedMpsk` or null |
| `Config\MPSKRegistration\ExportNamedMPSKCsvFileRequest` | GET | `/network-config/v1alpha1/cnac-named-mpsk-reg/export` | array or null |
| `Config\MPSKRegistration\ImportNamedMPSKCsvFileRequest` | POST | `/network-config/v1alpha1/cnac-named-mpsk-reg/import` | `Job` or null |
| `Config\MPSKRegistration\DeleteNamedMPSKRequest` | DELETE | `/network-config/v1alpha1/cnac-named-mpsk-reg/{id}` | array or null |

### Central NAC Service: Static Tags

`Aruba::configuration()->nacStaticTags()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacStaticTags()->getStaticTagsUsage()` | `CdaStaticTagsUsage` or null (POST `/network-config/v1alpha1/cnac-static-tags/usage`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\StaticTags\GetStaticTagsUsageRequest` | POST | `/network-config/v1alpha1/cnac-static-tags/usage` | `CdaStaticTagsUsage` or null |

### Central NAC Service: User Certificate

`Aruba::configuration()->nacUserCertificates()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacUserCertificates()` | a builder over `CdaUserCert` records (GET `/network-config/v1alpha1/cnac-certificate`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::configuration()->nacUserCertificates()->revokeCertificates()` | `CdaRevokeCerts` or null (POST `/network-config/v1alpha1/cnac-certificate/revoke`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\UserCertificate\CertificatesRequest` | GET | `/network-config/v1alpha1/cnac-certificate` | `Collection` of `CdaUserCert` |
| `Config\UserCertificate\RevokeCertificatesRequest` | POST | `/network-config/v1alpha1/cnac-certificate/revoke` | `CdaRevokeCerts` or null |

### Central NAC Service: Visitor

`Aruba::configuration()->nacVisitors()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->nacVisitors()` | a builder over `CdaUser` records (GET `/network-config/v1alpha1/cnac-visitor`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::configuration()->nacVisitors()->createVisitor()` | `CdaUser` or null (POST `/network-config/v1alpha1/cnac-visitor`) |
| `Aruba::configuration()->nacVisitors()->updateVisitor()` | `CdaUser` or null (PUT `/network-config/v1alpha1/cnac-visitor`) |
| `Aruba::configuration()->nacVisitors()->exportVisitorCsvFile()` | the response as an array, or null (GET `/network-config/v1alpha1/cnac-visitor/export`) |
| `Aruba::configuration()->nacVisitors()->deleteVisitor($id)` | status or null (DELETE `/network-config/v1alpha1/cnac-visitor/{id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Visitor\GetVisitorsRequest` | GET | `/network-config/v1alpha1/cnac-visitor` | `Collection` of `CdaUser` |
| `Config\Visitor\CreateVisitorRequest` | POST | `/network-config/v1alpha1/cnac-visitor` | `CdaUser` or null |
| `Config\Visitor\UpdateVisitorRequest` | PUT | `/network-config/v1alpha1/cnac-visitor` | `CdaUser` or null |
| `Config\Visitor\ExportVisitorCsvFileRequest` | GET | `/network-config/v1alpha1/cnac-visitor/export` | array or null |
| `Config\Visitor\DeleteVisitorRequest` | DELETE | `/network-config/v1alpha1/cnac-visitor/{id}` | array or null |

### Config Management: Persona Assignment

`Aruba::configuration()->personaAssignments()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->personaAssignments()->createPersonaAssignmentPersonaDeviceListByID($deviceFunction)` | `Successful200` or null (POST `/network-config/v1alpha1/persona-assignment/{device-function}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\PersonaAssignment\CreatePersonaAssignmentPersonaDeviceListByIDRequest` | POST | `/network-config/v1alpha1/persona-assignment/{device-function}` | `Successful200` or null |

### Config Management: Persona Mapping

`Aruba::configuration()->personaMappings()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->personaMappings()` | a builder over `ArubaPersonaMappingDevicePersonaMappingSchemaGETItem` records (GET `/network-config/v1alpha1/device-persona-mapping`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\PersonaMapping\ReadDevicePersonaMappingRequest` | GET | `/network-config/v1alpha1/device-persona-mapping` | `Collection` of `ArubaPersonaMappingDevicePersonaMappingSchemaGETItem` |
| `Config\PersonaMapping\ReadDevicePersonaMappingDeviceTypeListByIDRequest` | GET | `/network-config/v1alpha1/device-persona-mapping/{device-type}` | `Collection` of `ArubaPersonaMappingDevicePersonaMappingdeviceTypeItem` |

### Configuration Health: Configuration Health

`Aruba::configuration()->health()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->health()` | a builder over `GetConfigHealthDevicesItem` records (GET `/network-config/v1alpha1/config-health/devices`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::configuration()->health()->getActiveIssues($serial)` | the response as an array, or null (GET `/network-config/v1alpha1/config-health/active-issue`) |
| `Aruba::configuration()->health()->resyncCfgDevices()` | the response as an array, or null (POST `/network-config/v1alpha1/config-health/devices-resync`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\ConfigurationHealth\GetActiveIssuesRequest` | GET | `/network-config/v1alpha1/config-health/active-issue` | array or null |
| `Config\ConfigurationHealth\GetConfigHealthDevicesRequest` | GET | `/network-config/v1alpha1/config-health/devices` | `Collection` of `GetConfigHealthDevicesItem` |
| `Config\ConfigurationHealth\ResyncCfgDevicesRequest` | POST | `/network-config/v1alpha1/config-health/devices-resync` | array or null |

### Firmware Policy: Firmware Compliance

`Aruba::configuration()->firmwareCompliance()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->firmwareCompliance()->deleteFirmwareCompliance()` | status or null (DELETE `/network-config/v1alpha1/firmware-compliance`) |
| `Aruba::configuration()->firmwareCompliance()->readFirmwareCompliance()` | `ArubaFirmwareComplianceFirmwareComplianceSchemaGet` or null (GET `/network-config/v1alpha1/firmware-compliance`) |
| `Aruba::configuration()->firmwareCompliance()->updateFirmwareCompliance()` | `Successful200` or null (PATCH `/network-config/v1alpha1/firmware-compliance`) |
| `Aruba::configuration()->firmwareCompliance()->createFirmwareCompliance()` | `Successful200` or null (POST `/network-config/v1alpha1/firmware-compliance`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\FirmwareCompliance\DeleteFirmwareComplianceRequest` | DELETE | `/network-config/v1alpha1/firmware-compliance` | array or null |
| `Config\FirmwareCompliance\ReadFirmwareComplianceRequest` | GET | `/network-config/v1alpha1/firmware-compliance` | `ArubaFirmwareComplianceFirmwareComplianceSchemaGet` or null |
| `Config\FirmwareCompliance\UpdateFirmwareComplianceRequest` | PATCH | `/network-config/v1alpha1/firmware-compliance` | `Successful200` or null |
| `Config\FirmwareCompliance\CreateFirmwareComplianceRequest` | POST | `/network-config/v1alpha1/firmware-compliance` | `Successful200` or null |

### Interfaces: Interface Ethernet

`Aruba::configuration()->ethernetInterfaces()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->ethernetInterfaces()` | a builder over records as arrays (GET `/network-config/v1alpha1/ethernet-interfaces`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::configuration()->ethernetInterfaces()->readEthernetInterfacesInterfaceByID($name)` | `ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet` or null (GET `/network-config/v1alpha1/ethernet-interfaces/{name}`) |
| `Aruba::configuration()->ethernetInterfaces()->updateEthernetInterfacesInterfaceByID($name)` | `Successful200` or null (PATCH `/network-config/v1alpha1/ethernet-interfaces/{name}`) |
| `Aruba::configuration()->ethernetInterfaces()->createEthernetInterfacesInterfaceByID($name)` | `Successful200` or null (POST `/network-config/v1alpha1/ethernet-interfaces/{name}`) |
| `Aruba::configuration()->ethernetInterfaces()->replaceEthernetInterfacesInterfaceByID($name)` | `Successful200` or null (PUT `/network-config/v1alpha1/ethernet-interfaces/{name}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\InterfaceEthernet\ReadEthernetInterfacesRequest` | GET | `/network-config/v1alpha1/ethernet-interfaces` | `Collection` of arrays |
| `Config\InterfaceEthernet\ReadEthernetInterfacesInterfaceByIDRequest` | GET | `/network-config/v1alpha1/ethernet-interfaces/{name}` | `ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet` or null |
| `Config\InterfaceEthernet\UpdateEthernetInterfacesInterfaceByIDRequest` | PATCH | `/network-config/v1alpha1/ethernet-interfaces/{name}` | `Successful200` or null |
| `Config\InterfaceEthernet\CreateEthernetInterfacesInterfaceByIDRequest` | POST | `/network-config/v1alpha1/ethernet-interfaces/{name}` | `Successful200` or null |
| `Config\InterfaceEthernet\ReplaceEthernetInterfacesInterfaceByIDRequest` | PUT | `/network-config/v1alpha1/ethernet-interfaces/{name}` | `Successful200` or null |

### Interfaces: Lacp

`Aruba::configuration()->lacp()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->lacp()->deleteLacp()` | status or null (DELETE `/network-config/v1alpha1/lacp`) |
| `Aruba::configuration()->lacp()->readLacp()` | `ArubaLacpLacpSchemaGet` or null (GET `/network-config/v1alpha1/lacp`) |
| `Aruba::configuration()->lacp()->updateLacp()` | `Successful200` or null (PATCH `/network-config/v1alpha1/lacp`) |
| `Aruba::configuration()->lacp()->createLacp()` | `Successful200` or null (POST `/network-config/v1alpha1/lacp`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Lacp\DeleteLacpRequest` | DELETE | `/network-config/v1alpha1/lacp` | array or null |
| `Config\Lacp\ReadLacpRequest` | GET | `/network-config/v1alpha1/lacp` | `ArubaLacpLacpSchemaGet` or null |
| `Config\Lacp\UpdateLacpRequest` | PATCH | `/network-config/v1alpha1/lacp` | `Successful200` or null |
| `Config\Lacp\CreateLacpRequest` | POST | `/network-config/v1alpha1/lacp` | `Successful200` or null |

### MSP: MSP

`Aruba::msp()`

| Call | Returns |
|---|---|
| `Aruba::msp()->tenants()` | a builder over `MSPTenantmsp` records (GET `/network-msp/v2/list-tenants`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Msp\MSP\ListTenantsRequest` | GET | `/network-msp/v2/list-tenants` | `Collection` of `MSPTenantmsp` |

### Miscellaneous: Firmware Management

`Aruba::configuration()->deviceFirmware()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->deviceFirmware()->deleteDeviceFirmware()` | status or null (DELETE `/network-config/v1alpha1/device-firmware`) |
| `Aruba::configuration()->deviceFirmware()->readDeviceFirmware()` | `ArubaFirmwareManagementDeviceFirmwareSchemaGet` or null (GET `/network-config/v1alpha1/device-firmware`) |
| `Aruba::configuration()->deviceFirmware()->updateDeviceFirmware()` | `Successful200` or null (PATCH `/network-config/v1alpha1/device-firmware`) |
| `Aruba::configuration()->deviceFirmware()->createDeviceFirmware()` | `Successful200` or null (POST `/network-config/v1alpha1/device-firmware`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\FirmwareManagement\DeleteDeviceFirmwareRequest` | DELETE | `/network-config/v1alpha1/device-firmware` | array or null |
| `Config\FirmwareManagement\ReadDeviceFirmwareRequest` | GET | `/network-config/v1alpha1/device-firmware` | `ArubaFirmwareManagementDeviceFirmwareSchemaGet` or null |
| `Config\FirmwareManagement\UpdateDeviceFirmwareRequest` | PATCH | `/network-config/v1alpha1/device-firmware` | `Successful200` or null |
| `Config\FirmwareManagement\CreateDeviceFirmwareRequest` | POST | `/network-config/v1alpha1/device-firmware` | `Successful200` or null |

### Miscellaneous: Interface Vxlan

`Aruba::configuration()->vxlan()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->vxlan()` | a builder over records as arrays (GET `/network-config/v1alpha1/vxlan`): `get()`, `all()`, `first()`, `count()`, `lazy()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\InterfaceVxlan\ReadVxlanRequest` | GET | `/network-config/v1alpha1/vxlan` | `Collection` of arrays |

### Monitoring: Access Points

`Aruba::accessPoints()`

| Call | Returns |
|---|---|
| `Aruba::accessPoints()` | a builder over `AccessPointItem` records (GET `/network-monitoring/v1/aps`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::accessPoints()->getAccessPointCPUUtilization($serialNumber)` | `AccessPointCPUUtilization` or null (GET `/network-monitoring/v1/aps/{serial-number}/cpu-utilization-trends`) |
| `Aruba::accessPoints()->dhcpPoolsOf($serialNumber)` | a builder over `AccessPointDHCPPoolItem` records (GET `/network-monitoring/v1/aps/{serial-number}/dhcp-pools`) |
| `Aruba::accessPoints()->getAccessPointMemoryUtilization($serialNumber)` | `AccessPointMemoryUtilization` or null (GET `/network-monitoring/v1/aps/{serial-number}/memory-utilization-trends`) |
| `Aruba::accessPoints()->portsOf($serialNumber)` | a builder over `PortItem` records (GET `/network-monitoring/v1/aps/{serial-number}/ports`) |
| `Aruba::accessPoints()->getAccessPointPortCollisionsPerformance($serialNumber, $portIndex)` | `PortCollisionsTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/collisions-trends`) |
| `Aruba::accessPoints()->getAccessPointPortCrcPerformance($serialNumber, $portIndex)` | `PortCrcTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/crc-trends`) |
| `Aruba::accessPoints()->getAccessPointPortFramesPerformance($serialNumber, $portIndex)` | `PortFramesTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/frames-trends`) |
| `Aruba::accessPoints()->getAccessPointPortThroughput($serialNumber, $portIndex)` | `PortThroughputTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/throughput-trends`) |
| `Aruba::accessPoints()->getAccessPointPowerConsumption($serialNumber)` | `AccessPointPowerConsumption` or null (GET `/network-monitoring/v1/aps/{serial-number}/power-consumption-trends`) |
| `Aruba::accessPoints()->radiosOf($serialNumber)` | a builder over `AccessPointRadioItem` records (GET `/network-monitoring/v1/aps/{serial-number}/radios`) |
| `Aruba::accessPoints()->getAPRFChannelQualityPerformance($serialNumber, $radioNumber)` | `RFChannelQualityTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/channel-quality-trends`) |
| `Aruba::accessPoints()->getAPRFChannelUtilizationPerformance($serialNumber, $radioNumber)` | `RFChannelUtilizationTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/channel-utilization-trends`) |
| `Aruba::accessPoints()->getAPRFFramesPerformance($serialNumber, $radioNumber)` | `RFFramesTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/frames-trends`) |
| `Aruba::accessPoints()->getAPRFNoiseFloorPerformance($serialNumber, $radioNumber)` | `RFNoiseFloorTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/noise-floor-trends`) |
| `Aruba::accessPoints()->getAccessPointRadioThroughput($serialNumber, $radioNumber)` | `RadioThroughputTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/throughput-trends`) |
| `Aruba::accessPoints()->getAccessPointThroughput($serialNumber, $interfaceType)` | `APThroughputTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/throughput-trends`) |
| `Aruba::accessPoints()->tunnelsOf($serialNumber)` | a builder over `AccessPointTunnelItem` records (GET `/network-monitoring/v1/aps/{serial-number}/tunnels`) |
| `Aruba::accessPoints()->getAccessPointTunnelDetail($serialNumber, $tunnelId)` | `AccessPointTunnelDetail` or null (GET `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}`) |
| `Aruba::accessPoints()->getAccessPointProbeJitterTrend($serialNumber, $tunnelId)` | `APProbeTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/jitter-trends`) |
| `Aruba::accessPoints()->getAccessPointProbeLatencyTrend($serialNumber, $tunnelId)` | `APProbeTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/latency-trends`) |
| `Aruba::accessPoints()->getAccessPointProbeMosTrend($serialNumber, $tunnelId)` | `APProbeTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/mos-trends`) |
| `Aruba::accessPoints()->getAccessPointProbeLossTrend($serialNumber, $tunnelId)` | `APProbeTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/packet-loss-trends`) |
| `Aruba::accessPoints()->getAccessPointTunnelThroughput($serialNumber, $tunnelId)` | `TunnelThroughputTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/throughput-trends`) |
| `Aruba::accessPoints()->wlansOf($serialNumber)` | a builder over `AccessPointWlanInfoWithClientCount` records (GET `/network-monitoring/v1/aps/{serial-number}/wlans`) |
| `Aruba::accessPoints()->getAccessPointWlanThroughput($serialNumber, $wlanName)` | `AccessPointWLANThroughputTrend` or null (GET `/network-monitoring/v1/aps/{serial-number}/wlans/{wlan-name}/throughput-trends`) |
| `Aruba::accessPoints()->bssids()` | a builder over `BssidItem` records (GET `/network-monitoring/v1/bssids`) |
| `Aruba::accessPoints()->radios()` | a builder over `RadioItem` records (GET `/network-monitoring/v1/radios`) |
| `Aruba::accessPoints()->swarms()` | a builder over `SwarmListInfo` records (GET `/network-monitoring/v1/swarms`) |
| `Aruba::accessPoints()->swarm($clusterId)` | `SwarmInfo` or null (GET `/network-monitoring/v1/swarms/{cluster-id}`) |
| `Aruba::accessPoints()->topByUsage()` | a builder over `TopAccessPoint` records (GET `/network-monitoring/v1/top-aps-by-usage`) |
| `Aruba::accessPoints()->topByWiredUsage()` | a builder over `TopAccessPoint` records (GET `/network-monitoring/v1/top-aps-by-wired-usage`) |
| `Aruba::accessPoints()->topByWirelessUsage()` | a builder over `TopAccessPoint` records (GET `/network-monitoring/v1/top-aps-by-wireless-usage`) |
| `Aruba::accessPoints()->wlans()` | a builder over `WlanInfoWithClientCount` records (GET `/network-monitoring/v1/wlans`) |
| `Aruba::accessPoints()->wlan($wlanName)` | `WlanInfoWithClientCount` or null (GET `/network-monitoring/v1/wlans/{wlan-name}`) |
| `Aruba::accessPoints()->getWlanThroughputTrend($wlanName)` | `WLANThroughputTrend` or null (GET `/network-monitoring/v1/wlans/{wlan-name}/throughput-trends`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\AccessPoints\GetAccessPointsRequest` | GET | `/network-monitoring/v1/aps` | `Collection` of `AccessPointItem` |
| `Monitoring\AccessPoints\GetAccessPointDetailsRequest` | GET | `/network-monitoring/v1/aps/{serial-number}` | `AccessPoint` or null |
| `Monitoring\AccessPoints\GetAccessPointCPUUtilizationRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/cpu-utilization-trends` | `AccessPointCPUUtilization` or null |
| `Monitoring\AccessPoints\GetAccessPointDHCPPoolListRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/dhcp-pools` | `Collection` of `AccessPointDHCPPoolItem` |
| `Monitoring\AccessPoints\GetAccessPointMemoryUtilizationRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/memory-utilization-trends` | `AccessPointMemoryUtilization` or null |
| `Monitoring\AccessPoints\GetAccessPointPortListRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/ports` | `Collection` of `PortItem` |
| `Monitoring\AccessPoints\GetAccessPointPortCollisionsPerformanceRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/collisions-trends` | `PortCollisionsTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointPortCrcPerformanceRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/crc-trends` | `PortCrcTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointPortFramesPerformanceRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/frames-trends` | `PortFramesTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointPortThroughputRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/ports/{port-index}/throughput-trends` | `PortThroughputTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointPowerConsumptionRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/power-consumption-trends` | `AccessPointPowerConsumption` or null |
| `Monitoring\AccessPoints\GetAccessPointRadioListRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/radios` | `Collection` of `AccessPointRadioItem` |
| `Monitoring\AccessPoints\GetAPRFChannelQualityPerformanceRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/channel-quality-trends` | `RFChannelQualityTrend` or null |
| `Monitoring\AccessPoints\GetAPRFChannelUtilizationPerformanceRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/channel-utilization-trends` | `RFChannelUtilizationTrend` or null |
| `Monitoring\AccessPoints\GetAPRFFramesPerformanceRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/frames-trends` | `RFFramesTrend` or null |
| `Monitoring\AccessPoints\GetAPRFNoiseFloorPerformanceRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/noise-floor-trends` | `RFNoiseFloorTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointRadioThroughputRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/throughput-trends` | `RadioThroughputTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointThroughputRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/throughput-trends` | `APThroughputTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointTunnelListRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/tunnels` | `Collection` of `AccessPointTunnelItem` |
| `Monitoring\AccessPoints\GetAccessPointTunnelDetailRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}` | `AccessPointTunnelDetail` or null |
| `Monitoring\AccessPoints\GetAccessPointProbeJitterTrendRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/jitter-trends` | `APProbeTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointProbeLatencyTrendRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/latency-trends` | `APProbeTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointProbeMosTrendRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/mos-trends` | `APProbeTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointProbeLossTrendRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/packet-loss-trends` | `APProbeTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointTunnelThroughputRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/throughput-trends` | `TunnelThroughputTrend` or null |
| `Monitoring\AccessPoints\GetAccessPointWlanListRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/wlans` | `Collection` of `AccessPointWlanInfoWithClientCount` |
| `Monitoring\AccessPoints\GetAccessPointWlanThroughputRequest` | GET | `/network-monitoring/v1/aps/{serial-number}/wlans/{wlan-name}/throughput-trends` | `AccessPointWLANThroughputTrend` or null |
| `Monitoring\AccessPoints\GetBssidsRequest` | GET | `/network-monitoring/v1/bssids` | `Collection` of `BssidItem` |
| `Monitoring\AccessPoints\GetRadioListRequest` | GET | `/network-monitoring/v1/radios` | `Collection` of `RadioItem` |
| `Monitoring\AccessPoints\GetSwarmsRequest` | GET | `/network-monitoring/v1/swarms` | `Collection` of `SwarmListInfo` |
| `Monitoring\AccessPoints\GetSwarmRequest` | GET | `/network-monitoring/v1/swarms/{cluster-id}` | `SwarmInfo` or null |
| `Monitoring\AccessPoints\GetTopAccessPointsByUsageRequest` | GET | `/network-monitoring/v1/top-aps-by-usage` | `Collection` of `TopAccessPoint` |
| `Monitoring\AccessPoints\GetTopAccessPointsByWiredUsageRequest` | GET | `/network-monitoring/v1/top-aps-by-wired-usage` | `Collection` of `TopAccessPoint` |
| `Monitoring\AccessPoints\GetTopAccessPointsByWirelessUsageRequest` | GET | `/network-monitoring/v1/top-aps-by-wireless-usage` | `Collection` of `TopAccessPoint` |
| `Monitoring\AccessPoints\GetWlanListRequest` | GET | `/network-monitoring/v1/wlans` | `Collection` of `WlanInfoWithClientCount` |
| `Monitoring\AccessPoints\GetWlanRequest` | GET | `/network-monitoring/v1/wlans/{wlan-name}` | `WlanInfoWithClientCount` or null |
| `Monitoring\AccessPoints\GetWlanThroughputTrendRequest` | GET | `/network-monitoring/v1/wlans/{wlan-name}/throughput-trends` | `WLANThroughputTrend` or null |

### Monitoring: Application Visibility

`Aruba::applications()`

| Call | Returns |
|---|---|
| `Aruba::applications()` | a builder over `ApplicationItems` records (GET `/network-monitoring/v1/applications`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::applications()->categories()` | a builder over `ApplicationCategoryUsageItem` records (GET `/network-monitoring/v1/application-categories`) |
| `Aruba::applications()->securityRisks()` | a builder over `Risk` records (GET `/network-monitoring/v1/security-risks`) |
| `Aruba::applications()->websiteCategories()` | a builder over `WebsiteCategoryUsageItem` records (GET `/network-monitoring/v1/website-categories`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\ApplicationVisibility\ListApplicationCategoriesRequest` | GET | `/network-monitoring/v1/application-categories` | `Collection` of `ApplicationCategoryUsageItem` |
| `Monitoring\ApplicationVisibility\ListApplicationsRequest` | GET | `/network-monitoring/v1/applications` | `Collection` of `ApplicationItems` |
| `Monitoring\ApplicationVisibility\ListSecurityRisksRequest` | GET | `/network-monitoring/v1/security-risks` | `Collection` of `Risk` |
| `Monitoring\ApplicationVisibility\ListWebsiteCategoriesRequest` | GET | `/network-monitoring/v1/website-categories` | `Collection` of `WebsiteCategoryUsageItem` |

### Monitoring: Client Onboarding

`Aruba::clientOnboarding()`

| Call | Returns |
|---|---|
| `Aruba::clientOnboarding()->scores()` | a builder over `OnboardingStageScore` records (GET `/network-monitoring/v1/client-onboarding-score`) |
| `Aruba::clientOnboarding()->stageCounts()` | a builder over `OnboardingCountItem` records (GET `/network-monitoring/v1/client-onboarding-stage/count`) |
| `Aruba::clientOnboarding()->stageExport()` | a builder over `OnboardingStageExportItem` records (GET `/network-monitoring/v1/client-onboarding-stage/export`) |
| `Aruba::clientOnboarding()->stageReasons()` | a builder over `OnboardingReasonsItem` records (GET `/network-monitoring/v1/client-onboarding-stage/reasons`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\ClientOnboarding\GetClientOnboardingScoreRequest` | GET | `/network-monitoring/v1/client-onboarding-score` | `Collection` of `OnboardingStageScore` |
| `Monitoring\ClientOnboarding\GetClientOnboardingStageCountRequest` | GET | `/network-monitoring/v1/client-onboarding-stage/count` | `Collection` of `OnboardingCountItem` |
| `Monitoring\ClientOnboarding\GetClientOnboardingStageExportRequest` | GET | `/network-monitoring/v1/client-onboarding-stage/export` | `Collection` of `OnboardingStageExportItem` |
| `Monitoring\ClientOnboarding\GetClientOnboardingStageReasonsRequest` | GET | `/network-monitoring/v1/client-onboarding-stage/reasons` | `Collection` of `OnboardingReasonsItem` |

### Monitoring: Clients

`Aruba::clients()`

| Call | Returns |
|---|---|
| `Aruba::clients()` | a builder over `Client` records (GET `/network-monitoring/v1/clients`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::clients()->topByUsage()` | a builder over `GetTopNClientsByUsageItem` records (GET `/network-monitoring/v1/clients-topn-usage`) |
| `Aruba::clients()->trends()` | `GetClientsTrends` or null (GET `/network-monitoring/v1/clients-trend`) |
| `Aruba::clients()->usage()` | `GetClientsUsage` or null (GET `/network-monitoring/v1/clients-usage`) |
| `Aruba::clients()->mobilityTrail($macAddress)` | a builder over `MobilityDetails` records (GET `/network-monitoring/v1/clients/{mac-address}/mobility-trail`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Clients\ListUnifiedClientsRequest` | GET | `/network-monitoring/v1/clients` | `Collection` of `Client` |
| `Monitoring\Clients\GetTopNClientsByUsageRequest` | GET | `/network-monitoring/v1/clients-topn-usage` | `Collection` of `GetTopNClientsByUsageItem` |
| `Monitoring\Clients\GetClientsTrendsRequest` | GET | `/network-monitoring/v1/clients-trend` | `GetClientsTrends` or null |
| `Monitoring\Clients\GetClientsUsageRequest` | GET | `/network-monitoring/v1/clients-usage` | `GetClientsUsage` or null |
| `Monitoring\Clients\GetClientDetailsRequest` | GET | `/network-monitoring/v1/clients/{mac-address}` | `ClientDetails` or null |
| `Monitoring\Clients\GetClientMobilityDetailsRequest` | GET | `/network-monitoring/v1/clients/{mac-address}/mobility-trail` | `Collection` of `MobilityDetails` |

### Monitoring: Devices

`Aruba::devices()`

| Call | Returns |
|---|---|
| `Aruba::devices()` | a builder over `Device` records (GET `/network-monitoring/v1/devices`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `update()`, `delete()` |
| `Aruba::devices()->inventory()` | a builder over `DeviceInventoryItem` records (GET `/network-monitoring/v1/device-inventory`) |
| `Aruba::devices()->createNotes()` | the response as an array, or null (POST `/network-monitoring/v1/device-notes`) |
| `Aruba::devices()->notesOperation($id)` | `AsyncNotesResult` or null (GET `/network-monitoring/v1/device-notes-async-operations/{id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Devices\GetDeviceInventoryRequest` | GET | `/network-monitoring/v1/device-inventory` | `Collection` of `DeviceInventoryItem` |
| `Monitoring\Devices\CreateDeviceNotesAsyncRequest` | POST | `/network-monitoring/v1/device-notes` | array or null |
| `Monitoring\Devices\GetDeviceNotesOperationRequest` | GET | `/network-monitoring/v1/device-notes-async-operations/{id}` | `AsyncNotesResult` or null |
| `Monitoring\Devices\GetDevicesRequest` | GET | `/network-monitoring/v1/devices` | `Collection` of `Device` |
| `Monitoring\Devices\DeleteUnifiedDeviceRequest` | DELETE | `/network-monitoring/v1/devices/{serial-number}` | array or null |
| `Monitoring\Devices\UpdateDeviceNotesRequest` | PATCH | `/network-monitoring/v1/devices/{serial-number}` | `UpdateDeviceNotesData` or null |

### Monitoring: Firewall Session

`Aruba::firewallSessions()`

| Call | Returns |
|---|---|
| `Aruba::firewallSessions()->forClient()` | a builder over `SessionItems` records (GET `/network-monitoring/v1/client-firewall-sessions`) |
| `Aruba::firewallSessions()->clients()` | a builder over `ClientItems` records (GET `/network-monitoring/v1/firewall-clients`) |
| `Aruba::firewallSessions()->forSite()` | a builder over `SessionItems` records (GET `/network-monitoring/v1/site-firewall-sessions`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\FirewallSession\ListClientFirewallSessionLogsRequest` | GET | `/network-monitoring/v1/client-firewall-sessions` | `Collection` of `SessionItems` |
| `Monitoring\FirewallSession\ListFirewallClientsRequest` | GET | `/network-monitoring/v1/firewall-clients` | `Collection` of `ClientItems` |
| `Monitoring\FirewallSession\ListSiteFirewallSessionLogsRequest` | GET | `/network-monitoring/v1/site-firewall-sessions` | `Collection` of `SessionItems` |

### Monitoring: FloorPlan

`Aruba::floorPlans()`

| Call | Returns |
|---|---|
| `Aruba::floorPlans()->catalogue()` | a builder over `CatalogueApsItem` records (GET `/network-monitoring/v1/catalogue-aps`) |
| `Aruba::floorPlans()->summary($siteId)` | `SiteSummary` or null (GET `/network-monitoring/v1/sitemaps-summary/{site-id}`) |
| `Aruba::floorPlans()->sites()` | a builder over `SiteInfo` records (GET `/network-monitoring/v1/sitemaps/sites`) |
| `Aruba::floorPlans()->buildings($siteId)` | a builder over `BuildingWithFloorsItem` records (GET `/network-monitoring/v1/sitemaps/{site-id}/buildings`) |
| `Aruba::floorPlans()->removeBuilding($siteId, $buildingId)` | status or null (DELETE `/network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}`) |
| `Aruba::floorPlans()->updateBuilding($siteId, $buildingId)` | `Building` or null (PUT `/network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}`) |
| `Aruba::floorPlans()->createFloor($siteId)` | `FloorMap` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/floors`) |
| `Aruba::floorPlans()->removefloor($siteId, $floorId)` | status or null (DELETE `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}`) |
| `Aruba::floorPlans()->floor($siteId, $floorId)` | `FloorMap` or null (GET `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}`) |
| `Aruba::floorPlans()->updateFloormap($siteId, $floorId)` | `FloorMap` or null (PUT `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}`) |
| `Aruba::floorPlans()->getFloorMapImage($siteId, $floorId, $raster)` | the response as an array, or null (GET `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/image`) |
| `Aruba::floorPlans()->replaceimage($siteId, $floorId)` | `FloorMap` or null (PUT `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/image`) |
| `Aruba::floorPlans()->scaleFloorMap($siteId, $floorId)` | `FloorMap` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/scale`) |
| `Aruba::floorPlans()->deleteWalls($siteId, $floorId)` | the response as an array, or null (DELETE `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls`) |
| `Aruba::floorPlans()->getWalls($siteId, $floorId)` | a builder over `WallsItem` records (GET `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls`) |
| `Aruba::floorPlans()->createWalls($siteId, $floorId)` | `Overlay` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls`) |
| `Aruba::floorPlans()->updateWalls($siteId, $floorId)` | `Overlay` or null (PUT `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls`) |
| `Aruba::floorPlans()->deleteZones($siteId, $floorId)` | the response as an array, or null (DELETE `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones`) |
| `Aruba::floorPlans()->getZones($siteId, $floorId)` | a builder over `ZonesItem` records (GET `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones`) |
| `Aruba::floorPlans()->createZones($siteId, $floorId)` | `Overlay` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones`) |
| `Aruba::floorPlans()->updateZones($siteId, $floorId)` | `Overlay` or null (PUT `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones`) |
| `Aruba::floorPlans()->importfloors($siteId)` | `ImportStatus` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/import`) |
| `Aruba::floorPlans()->getImportStatus($siteId, $id)` | `ImportStatus` or null (GET `/network-monitoring/v1/sitemaps/{site-id}/import/{id}`) |
| `Aruba::floorPlans()->getAssociatedDevices($siteId)` | a builder over records as arrays (GET `/network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned`) |
| `Aruba::floorPlans()->changeDeviceAssignment($siteId)` | `DeviceassignmentPost` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned`) |
| `Aruba::floorPlans()->getPlacedDevices($siteId)` | a builder over records as arrays (GET `/network-monitoring/v1/sitemaps/{site-id}/network-devices-deployed`) |
| `Aruba::floorPlans()->placeDevicesOnFloor($siteId)` | `DeviceplacementPost` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/network-devices-deployed`) |
| `Aruba::floorPlans()->removePlannedDevicesOnFloor($siteId)` | `RemoveDevice` or null (DELETE `/network-monitoring/v1/sitemaps/{site-id}/network-devices-planned`) |
| `Aruba::floorPlans()->getPlacedPlannedDevices($siteId)` | a builder over records as arrays (GET `/network-monitoring/v1/sitemaps/{site-id}/network-devices-planned`) |
| `Aruba::floorPlans()->placePlannedDevicesOnFloor($siteId)` | `DeviceplacementPost` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/network-devices-planned`) |
| `Aruba::floorPlans()->removeDevicesOnFloor($siteId)` | `RemoveDevice` or null (POST `/network-monitoring/v1/sitemaps/{site-id}/network-devices-undeploy`) |
| `Aruba::floorPlans()->deleteWallTypes()` | the response as an array, or null (DELETE `/network-monitoring/v1/wall-types`) |
| `Aruba::floorPlans()->getWallTypes()` | a builder over `WallTypesItem` records (GET `/network-monitoring/v1/wall-types`) |
| `Aruba::floorPlans()->createWallTypes()` | `Overlay` or null (POST `/network-monitoring/v1/wall-types`) |
| `Aruba::floorPlans()->updateWallTypes()` | `Overlay` or null (PUT `/network-monitoring/v1/wall-types`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\FloorPlan\GetCatalogueRequest` | GET | `/network-monitoring/v1/catalogue-aps` | `Collection` of `CatalogueApsItem` |
| `Monitoring\FloorPlan\GetSummaryRequest` | GET | `/network-monitoring/v1/sitemaps-summary/{site-id}` | `SiteSummary` or null |
| `Monitoring\FloorPlan\ListSitemapSitesRequest` | GET | `/network-monitoring/v1/sitemaps/sites` | `Collection` of `SiteInfo` |
| `Monitoring\FloorPlan\GetBuildingsRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/buildings` | `Collection` of `BuildingWithFloorsItem` |
| `Monitoring\FloorPlan\RemoveBuildingRequest` | DELETE | `/network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}` | array or null |
| `Monitoring\FloorPlan\UpdateBuildingRequest` | PUT | `/network-monitoring/v1/sitemaps/{site-id}/buildings/{building-id}` | `Building` or null |
| `Monitoring\FloorPlan\CreateFloorRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/floors` | `FloorMap` or null |
| `Monitoring\FloorPlan\RemovefloorRequest` | DELETE | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}` | array or null |
| `Monitoring\FloorPlan\GetFloorMapRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}` | `FloorMap` or null |
| `Monitoring\FloorPlan\UpdateFloormapRequest` | PUT | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}` | `FloorMap` or null |
| `Monitoring\FloorPlan\GetFloorMapImageRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/image` | array or null |
| `Monitoring\FloorPlan\ReplaceimageRequest` | PUT | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/image` | `FloorMap` or null |
| `Monitoring\FloorPlan\ScaleFloorMapRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/scale` | `FloorMap` or null |
| `Monitoring\FloorPlan\DeleteWallsRequest` | DELETE | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls` | array or null |
| `Monitoring\FloorPlan\GetWallsRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls` | `Collection` of `WallsItem` |
| `Monitoring\FloorPlan\CreateWallsRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls` | `Overlay` or null |
| `Monitoring\FloorPlan\UpdateWallsRequest` | PUT | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls` | `Overlay` or null |
| `Monitoring\FloorPlan\DeleteZonesRequest` | DELETE | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones` | array or null |
| `Monitoring\FloorPlan\GetZonesRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones` | `Collection` of `ZonesItem` |
| `Monitoring\FloorPlan\CreateZonesRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones` | `Overlay` or null |
| `Monitoring\FloorPlan\UpdateZonesRequest` | PUT | `/network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/zones` | `Overlay` or null |
| `Monitoring\FloorPlan\ImportfloorsRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/import` | `ImportStatus` or null |
| `Monitoring\FloorPlan\GetImportStatusRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/import/{id}` | `ImportStatus` or null |
| `Monitoring\FloorPlan\GetAssociatedDevicesRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned` | `Collection` of arrays |
| `Monitoring\FloorPlan\ChangeDeviceAssignmentRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-assigned` | `DeviceassignmentPost` or null |
| `Monitoring\FloorPlan\GetPlacedDevicesRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-deployed` | `Collection` of arrays |
| `Monitoring\FloorPlan\PlaceDevicesOnFloorRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-deployed` | `DeviceplacementPost` or null |
| `Monitoring\FloorPlan\RemovePlannedDevicesOnFloorRequest` | DELETE | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-planned` | `RemoveDevice` or null |
| `Monitoring\FloorPlan\GetPlacedPlannedDevicesRequest` | GET | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-planned` | `Collection` of arrays |
| `Monitoring\FloorPlan\PlacePlannedDevicesOnFloorRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-planned` | `DeviceplacementPost` or null |
| `Monitoring\FloorPlan\RemoveDevicesOnFloorRequest` | POST | `/network-monitoring/v1/sitemaps/{site-id}/network-devices-undeploy` | `RemoveDevice` or null |
| `Monitoring\FloorPlan\DeleteWallTypesRequest` | DELETE | `/network-monitoring/v1/wall-types` | array or null |
| `Monitoring\FloorPlan\GetWallTypesRequest` | GET | `/network-monitoring/v1/wall-types` | `Collection` of `WallTypesItem` |
| `Monitoring\FloorPlan\CreateWallTypesRequest` | POST | `/network-monitoring/v1/wall-types` | `Overlay` or null |
| `Monitoring\FloorPlan\UpdateWallTypesRequest` | PUT | `/network-monitoring/v1/wall-types` | `Overlay` or null |

### Monitoring: Gateways

`Aruba::gateways()`

| Call | Returns |
|---|---|
| `Aruba::gateways()` | a builder over `GatewayItem` records (GET `/network-monitoring/v1/gateways`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::gateways()->getClusterCapacityTrend($clusterName)` | `ClusterCapacityTrend` or null (GET `/network-monitoring/v1/clusters/{cluster-name}/capacity-trends`) |
| `Aruba::gateways()->getClusterMemberCapacityTrend($clusterName, $serialNumber)` | `ClusterMemberCapacityTrend` or null (GET `/network-monitoring/v1/clusters/{cluster-name}/capacity-trends/{serial-number}`) |
| `Aruba::gateways()->getGatewayClusterConnectivityGraph($clusterName)` | `ClusterConnectivityGraph` or null (GET `/network-monitoring/v1/clusters/{cluster-name}/connectivity-graph`) |
| `Aruba::gateways()->clusterMembers($clusterName)` | a builder over `ClusterMemberItem` records (GET `/network-monitoring/v1/clusters/{cluster-name}/members`) |
| `Aruba::gateways()->clusterTunnels($clusterName)` | a builder over `GatewayClusterTunnelItem` records (GET `/network-monitoring/v1/clusters/{cluster-name}/tunnels`) |
| `Aruba::gateways()->getGatewayClusterTunnelHealth($clusterName)` | `ClusterTunnelHealthSummary` or null (GET `/network-monitoring/v1/clusters/{cluster-name}/tunnels-health-summary`) |
| `Aruba::gateways()->getGatewayClusterTunnelsStatusSummary($clusterName)` | `ClusterTunnelStatusSummary` or null (GET `/network-monitoring/v1/clusters/{cluster-name}/tunnels-status-summary`) |
| `Aruba::gateways()->getGatewayClusterVlanMismatchSummary($clusterName)` | `ClusterVlanMismatch` or null (GET `/network-monitoring/v1/clusters/{cluster-name}/vlan-mismatch`) |
| `Aruba::gateways()->getGatewayHardwareCPUUtilization($serialNumber)` | `GwCPUTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/cpu-utilization-trends`) |
| `Aruba::gateways()->dhcpClientsOf($serialNumber)` | a builder over `GatewayDhcpLeaseItem` records (GET `/network-monitoring/v1/gateways/{serial-number}/dhcp-clients`) |
| `Aruba::gateways()->dhcpPoolsOf($serialNumber)` | a builder over `GatewayDhcpPoolItem` records (GET `/network-monitoring/v1/gateways/{serial-number}/dhcp-pools`) |
| `Aruba::gateways()->getGatewayHardwareTemperature($serialNumber)` | `GwTempTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/hardware-temperature-trends`) |
| `Aruba::gateways()->getGatewayLanTunnelHealth($serialNumber)` | `GatewayTunnelHealthSummary` or null (GET `/network-monitoring/v1/gateways/{serial-number}/lan-tunnels-health-summary`) |
| `Aruba::gateways()->getGatewayHardwareMemoryUtilization($serialNumber)` | `GwMemTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/memory-utilization-trends`) |
| `Aruba::gateways()->getGatewayModemStats($serialNumber)` | `GwModemStats` or null (GET `/network-monitoring/v1/gateways/{serial-number}/modem-stat`) |
| `Aruba::gateways()->portsOf($serialNumber)` | a builder over `GatewayPortItem` records (GET `/network-monitoring/v1/gateways/{serial-number}/ports`) |
| `Aruba::gateways()->getGatewayPortDetail($serialNumber, $portNumber)` | `GatewayPort` or null (GET `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}`) |
| `Aruba::gateways()->getGatewayFramesErrorsTrend($serialNumber, $portNumber)` | `GwFramesErrorsTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-errors-trends`) |
| `Aruba::gateways()->getGatewayFramesPacketsTrend($serialNumber, $portNumber)` | `GwFramesPacketsTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-packets-trends`) |
| `Aruba::gateways()->getGatewayFramesTrend($serialNumber, $portNumber)` | `GwFramesTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-trends`) |
| `Aruba::gateways()->getGatewayPortThroughputTrend($serialNumber, $portNumber)` | `GwInterfaceThroughputTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/throughput-trends`) |
| `Aruba::gateways()->tunnelsOf($serialNumber)` | a builder over `GatewayTunnelItem` records (GET `/network-monitoring/v1/gateways/{serial-number}/tunnels`) |
| `Aruba::gateways()->getGatewayTunnelDetail($serialNumber, $tunnelName)` | `GatewayTunnelDetail` or null (GET `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}`) |
| `Aruba::gateways()->getGatewayTunnelDroppedPacketsTrend($serialNumber, $tunnelName)` | `GwTunnelPacketsTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/dropped-packet-trends`) |
| `Aruba::gateways()->getGatewayTunnelStatusTrend($serialNumber, $tunnelName)` | `GwLanTunnelStatusTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/status-trends`) |
| `Aruba::gateways()->getGatewayTunnelThroughputTrend($serialNumber, $tunnelName)` | `GwLanTunnelThroughputTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/throughput-trends`) |
| `Aruba::gateways()->uplinksOf($serialNumber)` | a builder over `GatewayUplinkItem` records (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks`) |
| `Aruba::gateways()->getGatewayWanInterfaceDetail($serialNumber, $linkTag)` | `GatewayUplinkDetail` or null (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}`) |
| `Aruba::gateways()->getGatewayUplinkProbeList($serialNumber, $linkTag)` | a builder over records as arrays (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes`) |
| `Aruba::gateways()->getGatewayUplinkPerformanceTrends($serialNumber, $linkTag, $probe)` | `GwProbePerformanceTrends` or null (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes/{probe}/performance-trends`) |
| `Aruba::gateways()->getGatewayUplinkThroughputTrends($serialNumber, $linkTag)` | `GwUplinkThroughputTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/throughput-trends`) |
| `Aruba::gateways()->getGatewayUplinkWanAvailabilityTrends($serialNumber, $linkTag)` | `GwUplWanAvailTrends` or null (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-availability-trends`) |
| `Aruba::gateways()->getGatewayWanCompressionTrends($serialNumber, $linkTag)` | `GwWanCompressionTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-compression-trends`) |
| `Aruba::gateways()->getGatewayUplinkVpnAvailabilityTrends($serialNumber, $vlanId)` | `GwUplVpnAvailTrends` or null (GET `/network-monitoring/v1/gateways/{serial-number}/uplinks/{vlan-id}/vpn-availability-trends`) |
| `Aruba::gateways()->vlansOf($serialNumber)` | a builder over `GatewayVlanItem` records (GET `/network-monitoring/v1/gateways/{serial-number}/vlans`) |
| `Aruba::gateways()->getGatewayVlanDetail($serialNumber, $vlanId)` | `GatewayVlanDetail` or null (GET `/network-monitoring/v1/gateways/{serial-number}/vlans/{vlan-id}`) |
| `Aruba::gateways()->getGatewayVpnAvailabilityTrends($serialNumber)` | `GwVpnAvailTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/vpn-availability-trends`) |
| `Aruba::gateways()->getGatewayWanAvailabilityTrends($serialNumber)` | `GwWanAvailTrend` or null (GET `/network-monitoring/v1/gateways/{serial-number}/wan-availability-trends`) |
| `Aruba::gateways()->getGatewayWanTunnelHealth($serialNumber)` | `GatewayWanTunnelHealthSummary` or null (GET `/network-monitoring/v1/gateways/{serial-number}/wan-tunnels-health-summary`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Gateways\GetClusterCapacityTrendRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/capacity-trends` | `ClusterCapacityTrend` or null |
| `Monitoring\Gateways\GetClusterMemberCapacityTrendRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/capacity-trends/{serial-number}` | `ClusterMemberCapacityTrend` or null |
| `Monitoring\Gateways\GetGatewayClusterConnectivityGraphRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/connectivity-graph` | `ClusterConnectivityGraph` or null |
| `Monitoring\Gateways\GetGatewayClusterMemberListRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/members` | `Collection` of `ClusterMemberItem` |
| `Monitoring\Gateways\GetGatewayClusterTunnelListRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/tunnels` | `Collection` of `GatewayClusterTunnelItem` |
| `Monitoring\Gateways\GetGatewayClusterTunnelHealthRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/tunnels-health-summary` | `ClusterTunnelHealthSummary` or null |
| `Monitoring\Gateways\GetGatewayClusterTunnelsStatusSummaryRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/tunnels-status-summary` | `ClusterTunnelStatusSummary` or null |
| `Monitoring\Gateways\GetGatewayClusterVlanMismatchSummaryRequest` | GET | `/network-monitoring/v1/clusters/{cluster-name}/vlan-mismatch` | `ClusterVlanMismatch` or null |
| `Monitoring\Gateways\GetGatewaysRequest` | GET | `/network-monitoring/v1/gateways` | `Collection` of `GatewayItem` |
| `Monitoring\Gateways\GetGatewayDetailRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}` | `Gateway` or null |
| `Monitoring\Gateways\GetGatewayHardwareCPUUtilizationRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/cpu-utilization-trends` | `GwCPUTrend` or null |
| `Monitoring\Gateways\GetGatewayDhcpLeaseListRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/dhcp-clients` | `Collection` of `GatewayDhcpLeaseItem` |
| `Monitoring\Gateways\GetGatewayDhcpPoolListRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/dhcp-pools` | `Collection` of `GatewayDhcpPoolItem` |
| `Monitoring\Gateways\GetGatewayHardwareTemperatureRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/hardware-temperature-trends` | `GwTempTrend` or null |
| `Monitoring\Gateways\GetGatewayLanTunnelHealthRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/lan-tunnels-health-summary` | `GatewayTunnelHealthSummary` or null |
| `Monitoring\Gateways\GetGatewayHardwareMemoryUtilizationRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/memory-utilization-trends` | `GwMemTrend` or null |
| `Monitoring\Gateways\GetGatewayModemStatsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/modem-stat` | `GwModemStats` or null |
| `Monitoring\Gateways\GetGatewayPortsListRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/ports` | `Collection` of `GatewayPortItem` |
| `Monitoring\Gateways\GetGatewayPortDetailRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}` | `GatewayPort` or null |
| `Monitoring\Gateways\GetGatewayFramesErrorsTrendRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-errors-trends` | `GwFramesErrorsTrend` or null |
| `Monitoring\Gateways\GetGatewayFramesPacketsTrendRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-packets-trends` | `GwFramesPacketsTrend` or null |
| `Monitoring\Gateways\GetGatewayFramesTrendRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-trends` | `GwFramesTrend` or null |
| `Monitoring\Gateways\GetGatewayPortThroughputTrendRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/throughput-trends` | `GwInterfaceThroughputTrend` or null |
| `Monitoring\Gateways\GetGatewayTunnelListRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/tunnels` | `Collection` of `GatewayTunnelItem` |
| `Monitoring\Gateways\GetGatewayTunnelDetailRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}` | `GatewayTunnelDetail` or null |
| `Monitoring\Gateways\GetGatewayTunnelDroppedPacketsTrendRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/dropped-packet-trends` | `GwTunnelPacketsTrend` or null |
| `Monitoring\Gateways\GetGatewayTunnelStatusTrendRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/status-trends` | `GwLanTunnelStatusTrend` or null |
| `Monitoring\Gateways\GetGatewayTunnelThroughputTrendRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/throughput-trends` | `GwLanTunnelThroughputTrend` or null |
| `Monitoring\Gateways\GetGatewayUplinkListRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks` | `Collection` of `GatewayUplinkItem` |
| `Monitoring\Gateways\GetGatewayWanInterfaceDetailRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}` | `GatewayUplinkDetail` or null |
| `Monitoring\Gateways\GetGatewayUplinkProbeListRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes` | `Collection` of arrays |
| `Monitoring\Gateways\GetGatewayUplinkPerformanceTrendsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes/{probe}/performance-trends` | `GwProbePerformanceTrends` or null |
| `Monitoring\Gateways\GetGatewayUplinkThroughputTrendsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/throughput-trends` | `GwUplinkThroughputTrend` or null |
| `Monitoring\Gateways\GetGatewayUplinkWanAvailabilityTrendsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-availability-trends` | `GwUplWanAvailTrends` or null |
| `Monitoring\Gateways\GetGatewayWanCompressionTrendsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-compression-trends` | `GwWanCompressionTrend` or null |
| `Monitoring\Gateways\GetGatewayUplinkVpnAvailabilityTrendsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/uplinks/{vlan-id}/vpn-availability-trends` | `GwUplVpnAvailTrends` or null |
| `Monitoring\Gateways\GetGatewayVlanListRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/vlans` | `Collection` of `GatewayVlanItem` |
| `Monitoring\Gateways\GetGatewayVlanDetailRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/vlans/{vlan-id}` | `GatewayVlanDetail` or null |
| `Monitoring\Gateways\GetGatewayVpnAvailabilityTrendsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/vpn-availability-trends` | `GwVpnAvailTrend` or null |
| `Monitoring\Gateways\GetGatewayWanAvailabilityTrendsRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/wan-availability-trends` | `GwWanAvailTrend` or null |
| `Monitoring\Gateways\GetGatewayWanTunnelHealthRequest` | GET | `/network-monitoring/v1/gateways/{serial-number}/wan-tunnels-health-summary` | `GatewayWanTunnelHealthSummary` or null |

### Monitoring: IDPS

`Aruba::threats()`

| Call | Returns |
|---|---|
| `Aruba::threats()` | a builder over records as arrays (GET `/network-monitoring/v1/threats`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::threats()->detail($id, $siteId, $timeAt)` | `ThreatDetail` or null (GET `/network-monitoring/v1/threats/{id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\IDPS\GetThreatsRequest` | GET | `/network-monitoring/v1/threats` | `Collection` of arrays |
| `Monitoring\IDPS\GetThreatDetailRequest` | GET | `/network-monitoring/v1/threats/{id}` | `ThreatDetail` or null |

### Monitoring: Site Health

`Aruba::siteHealth()`

| Call | Returns |
|---|---|
| `Aruba::siteHealth()` | a builder over `SiteHealthItem` records (GET `/network-monitoring/v1/sites-health`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::siteHealth()->clients()` | a builder over `SiteClientHealthItem` records (GET `/network-monitoring/v1/sites-client-health`) |
| `Aruba::siteHealth()->devices()` | a builder over `SiteDeviceHealthItem` records (GET `/network-monitoring/v1/sites-device-health`) |
| `Aruba::siteHealth()->tenantClients()` | `TenantClientHealth` or null (GET `/network-monitoring/v1/tenant-client-health`) |
| `Aruba::siteHealth()->tenantDevices()` | `TenantDeviceHealth` or null (GET `/network-monitoring/v1/tenant-device-health`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\SiteHealth\GetSiteHealthRequest` | GET | `/network-monitoring/v1/site-health/{site-id}` | `SiteHealth` or null |
| `Monitoring\SiteHealth\ListSitesClientHealthRequest` | GET | `/network-monitoring/v1/sites-client-health` | `Collection` of `SiteClientHealthItem` |
| `Monitoring\SiteHealth\ListSitesDeviceHealthRequest` | GET | `/network-monitoring/v1/sites-device-health` | `Collection` of `SiteDeviceHealthItem` |
| `Monitoring\SiteHealth\ListSitesHealthRequest` | GET | `/network-monitoring/v1/sites-health` | `Collection` of `SiteHealthItem` |
| `Monitoring\SiteHealth\TenantClientHealthRequest` | GET | `/network-monitoring/v1/tenant-client-health` | `TenantClientHealth` or null |
| `Monitoring\SiteHealth\TenantDeviceHealthRequest` | GET | `/network-monitoring/v1/tenant-device-health` | `TenantDeviceHealth` or null |

### Monitoring: Subscriptions

`Aruba::subscriptions()`

| Call | Returns |
|---|---|
| `Aruba::subscriptions()->expiringSummary()` | a builder over `ExpiringLicensePerMonth` records (GET `/network-monitoring/v1/subscription-expiring-summary`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Subscriptions\GetExpiringLicensesSummaryRequest` | GET | `/network-monitoring/v1/subscription-expiring-summary` | `Collection` of `ExpiringLicensePerMonth` |

### Monitoring: Switch

`Aruba::switches()`

| Call | Returns |
|---|---|
| `Aruba::switches()` | a builder over `SwitchItem` records (GET `/network-monitoring/v1/switches`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::switches()->stackMembers($serialNumber)` | a builder over `Stack` records (GET `/network-monitoring/v1/stack/{serial-number}/members`) |
| `Aruba::switches()->topInterfaceTrends()` | a builder over `TopnInterfaceTrends` records (GET `/network-monitoring/v1/switches/topn-interface-trends`) |
| `Aruba::switches()->hardwareCategoriesOf($serialNumber)` | a builder over `SwitchHardware` records (GET `/network-monitoring/v1/switches/{serial-number}/hardware-categories`) |
| `Aruba::switches()->hardwareTrendsOf($serialNumber)` | `HardwareTrends` or null (GET `/network-monitoring/v1/switches/{serial-number}/hardware-trends`) |
| `Aruba::switches()->interfacePoeOf($serialNumber)` | a builder over records as arrays (GET `/network-monitoring/v1/switches/{serial-number}/interface-poe`) |
| `Aruba::switches()->interfaceTrendsOf($serialNumber)` | `InterfaceTrends` or null (GET `/network-monitoring/v1/switches/{serial-number}/interface-trends`) |
| `Aruba::switches()->interfacesOf($serialNumber)` | a builder over records as arrays (GET `/network-monitoring/v1/switches/{serial-number}/interfaces`) |
| `Aruba::switches()->lagSummaryOf($serialNumber)` | a builder over `SwitchLagSummary` records (GET `/network-monitoring/v1/switches/{serial-number}/lag`) |
| `Aruba::switches()->updatePort($serialNumber)` | `PortUpdate` or null (POST `/network-monitoring/v1/switches/{serial-number}/update-port`) |
| `Aruba::switches()->vlansOf($serialNumber)` | a builder over records as arrays (GET `/network-monitoring/v1/switches/{serial-number}/vlans`) |
| `Aruba::switches()->vsxOf($serialNumber)` | `Vsx` or null (GET `/network-monitoring/v1/switches/{serial-number}/vsx`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Switch\ListStackMembersRequest` | GET | `/network-monitoring/v1/stack/{serial-number}/members` | `Collection` of `Stack` |
| `Monitoring\Switch\GetSwitchesRequest` | GET | `/network-monitoring/v1/switches` | `Collection` of `SwitchItem` |
| `Monitoring\Switch\GetTopnSwitchConnectivityTrendsRequest` | GET | `/network-monitoring/v1/switches/topn-interface-trends` | `Collection` of `TopnInterfaceTrends` |
| `Monitoring\Switch\GetSwitchRequest` | GET | `/network-monitoring/v1/switches/{serial-number}` | `SwitchDetails` or null |
| `Monitoring\Switch\ListHardwareCategoriesRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/hardware-categories` | `Collection` of `SwitchHardware` |
| `Monitoring\Switch\GetSwitchHardwareTrendsRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/hardware-trends` | `HardwareTrends` or null |
| `Monitoring\Switch\GetSwitchInterfacePoeRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/interface-poe` | `Collection` of arrays |
| `Monitoring\Switch\GetSwitchConnectivityrendsRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/interface-trends` | `InterfaceTrends` or null |
| `Monitoring\Switch\ListInterfacesRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/interfaces` | `Collection` of arrays |
| `Monitoring\Switch\GetLagSummaryRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/lag` | `Collection` of `SwitchLagSummary` |
| `Monitoring\Switch\UpdateSwitchPortOperationRequest` | POST | `/network-monitoring/v1/switches/{serial-number}/update-port` | `PortUpdate` or null |
| `Monitoring\Switch\ListVlansRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/vlans` | `Collection` of arrays |
| `Monitoring\Switch\GetVsxRequest` | GET | `/network-monitoring/v1/switches/{serial-number}/vsx` | `Vsx` or null |

### Monitoring: Topology

`Aruba::topology()`

| Call | Returns |
|---|---|
| `Aruba::topology()->neighbourLink($serialNumber, $neighbourSerialNumber)` | `LinksDetail` or null (GET `/network-monitoring/v1/devices/{serial-number}/neighbours/{neighbour-serial-number}`) |
| `Aruba::topology()->isolatedDevices($siteId)` | `IsolatedNodes` or null (GET `/network-monitoring/v1/isolated-devices/{site-id}`) |
| `Aruba::topology()->neighbours($serialNumber)` | `Neighbours` or null (GET `/network-monitoring/v1/neighbours/{serial-number}`) |
| `Aruba::topology()->forSite($siteId)` | `Topology` or null (GET `/network-monitoring/v1/topology/{site-id}`) |
| `Aruba::topology()->unmanagedDevice($macAddress, $siteId)` | `UnmanagedDevice` or null (GET `/network-monitoring/v1/unmanaged-device/{mac-address}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Topology\GetDeviceNeighbourLinkRequest` | GET | `/network-monitoring/v1/devices/{serial-number}/neighbours/{neighbour-serial-number}` | `LinksDetail` or null |
| `Monitoring\Topology\GetIsolatedNodesRequest` | GET | `/network-monitoring/v1/isolated-devices/{site-id}` | `IsolatedNodes` or null |
| `Monitoring\Topology\GetNeighboursRequest` | GET | `/network-monitoring/v1/neighbours/{serial-number}` | `Neighbours` or null |
| `Monitoring\Topology\GetLinkTopologyRequest` | GET | `/network-monitoring/v1/topology/{site-id}` | `Topology` or null |
| `Monitoring\Topology\GetUnmanagedDeviceRequest` | GET | `/network-monitoring/v1/unmanaged-device/{mac-address}` | `UnmanagedDevice` or null |

### Notifications: Alerts

`Aruba::alerts()`

| Call | Returns |
|---|---|
| `Aruba::alerts()` | a builder over `Alert` records (GET `/network-notifications/v1/alerts`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::alerts()->configurations()` | a builder over `AlertConfig` records (GET `/network-notifications/v1/alert-config`) |
| `Aruba::alerts()->setActive()` | `AlertAction` or null (POST `/network-notifications/v1/alerts/active`) |
| `Aruba::alerts()->actionStatus($taskId)` | `AlertActionStatus` or null (GET `/network-notifications/v1/alerts/async-operations/{task-id}`) |
| `Aruba::alerts()->classification($type)` | `AlertsClassification` or null (GET `/network-notifications/v1/alerts/classification`) |
| `Aruba::alerts()->clear()` | `AlertAction` or null (POST `/network-notifications/v1/alerts/clear`) |
| `Aruba::alerts()->defer()` | `AlertAction` or null (POST `/network-notifications/v1/alerts/defer`) |
| `Aruba::alerts()->setPriority()` | `AlertAction` or null (POST `/network-notifications/v1/alerts/priority`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Notifications\Alerts\GetAlertConfigsRequest` | GET | `/network-notifications/v1/alert-config` | `Collection` of `AlertConfig` |
| `Notifications\Alerts\GetAlertListRequest` | GET | `/network-notifications/v1/alerts` | `Collection` of `Alert` |
| `Notifications\Alerts\SetActiveAlertsRequest` | POST | `/network-notifications/v1/alerts/active` | `AlertAction` or null |
| `Notifications\Alerts\AlertActionStatusRequest` | GET | `/network-notifications/v1/alerts/async-operations/{task-id}` | `AlertActionStatus` or null |
| `Notifications\Alerts\AlertsClassificationRequest` | GET | `/network-notifications/v1/alerts/classification` | `AlertsClassification` or null |
| `Notifications\Alerts\ClearAlertsRequest` | POST | `/network-notifications/v1/alerts/clear` | `AlertAction` or null |
| `Notifications\Alerts\DeferAlertsRequest` | POST | `/network-notifications/v1/alerts/defer` | `AlertAction` or null |
| `Notifications\Alerts\SetPriorityAlertsRequest` | POST | `/network-notifications/v1/alerts/priority` | `AlertAction` or null |

### Notifications: Insights

`Aruba::insights()`

| Call | Returns |
|---|---|
| `Aruba::insights()` | a builder over `AIOpsSourceRecommendations` records (GET `/network-notifications/v1/insights`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::insights()->schemas()` | `AIOpsInsightsSchemasResult` or null (GET `/network-notifications/v1/insights-schema`) |
| `Aruba::insights()->mute($insightId)` | `AIOpsInsightMuteResult` or null (POST `/network-notifications/v1/insights/{insight-id}/mute`) |
| `Aruba::insights()->unmute($insightId)` | `AIOpsInsightMuteResult` or null (POST `/network-notifications/v1/insights/{insight-id}/unmute`) |
| `Aruba::insights()->muted()` | a builder over `AIOpsInsightMutedItem` records (GET `/network-notifications/v1/muted-insights`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Notifications\Insights\GetSourceRecommendationsRequest` | GET | `/network-notifications/v1/insights` | `Collection` of `AIOpsSourceRecommendations` |
| `Notifications\Insights\GetInsightSchemasRequest` | GET | `/network-notifications/v1/insights-schema` | `AIOpsInsightsSchemasResult` or null |
| `Notifications\Insights\MuteInsightRequest` | POST | `/network-notifications/v1/insights/{insight-id}/mute` | `AIOpsInsightMuteResult` or null |
| `Notifications\Insights\UnmuteInsightRequest` | POST | `/network-notifications/v1/insights/{insight-id}/unmute` | `AIOpsInsightMuteResult` or null |
| `Notifications\Insights\ListMutedInsightsRequest` | GET | `/network-notifications/v1/muted-insights` | `Collection` of `AIOpsInsightMutedItem` |

### Notifications: Notification Rules

`Aruba::notificationRules()`

| Call | Returns |
|---|---|
| `Aruba::notificationRules()` | a builder over `NotificationRuleSummary` records (GET `/network-notifications/v1/notification-rules`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Notifications\NotificationRules\GetNotificationRulesRequest` | GET | `/network-notifications/v1/notification-rules` | `Collection` of `NotificationRuleSummary` |
| `Notifications\NotificationRules\CreateNotificationRuleRequest` | POST | `/network-notifications/v1/notification-rules` | `NotificationRule` or null |
| `Notifications\NotificationRules\DeleteNotificationRuleRequest` | DELETE | `/network-notifications/v1/notification-rules/{id}` | array or null |
| `Notifications\NotificationRules\GetNotificationRuleRequest` | GET | `/network-notifications/v1/notification-rules/{id}` | `NotificationRule` or null |
| `Notifications\NotificationRules\UpdateNotificationRuleRequest` | PATCH | `/network-notifications/v1/notification-rules/{id}` | `NotificationRule` or null |

### Reporting: Reporting

`Aruba::reports()`

| Call | Returns |
|---|---|
| `Aruba::reports()` | a builder over `Report` records (GET `/network-reporting/v1/reports`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `replace()`, `delete()` |
| `Aruba::reports()->metadata()` | `ReportsMetadata` or null (GET `/network-reporting/v1/reports-meta`) |
| `Aruba::reports()->runs($reportId)` | a builder over `ReportRun` records (GET `/network-reporting/v1/reports/{report-id}/report-runs`) |
| `Aruba::reports()->deleteRun($reportId, $reportRunId)` | status or null (DELETE `/network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}`) |
| `Aruba::reports()->downloadLink($reportId, $reportRunId)` | the response as an array, or null (POST `/network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}/download-link`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Reporting\Reporting\ListReportsRequest` | GET | `/network-reporting/v1/reports` | `Collection` of `Report` |
| `Reporting\Reporting\CreateUserReportRequest` | POST | `/network-reporting/v1/reports` | array or null |
| `Reporting\Reporting\GetReportsMetadataRequest` | GET | `/network-reporting/v1/reports-meta` | `ReportsMetadata` or null |
| `Reporting\Reporting\DeleteUserReportRequest` | DELETE | `/network-reporting/v1/reports/{report-id}` | array or null |
| `Reporting\Reporting\GetUserReportRequest` | GET | `/network-reporting/v1/reports/{report-id}` | `Report` or null |
| `Reporting\Reporting\UpdateUserReportRequest` | PUT | `/network-reporting/v1/reports/{report-id}` | array or null |
| `Reporting\Reporting\ListReportRunsRequest` | GET | `/network-reporting/v1/reports/{report-id}/report-runs` | `Collection` of `ReportRun` |
| `Reporting\Reporting\DeleteReportRunRequest` | DELETE | `/network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}` | array or null |
| `Reporting\Reporting\DownloadReportLinkRequest` | POST | `/network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}/download-link` | array or null |

### Roles & Policy: Policy Group

`Aruba::configuration()->policyGroups()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->policyGroups()->deletePolicyGroups()` | status or null (DELETE `/network-config/v1alpha1/policy-groups`) |
| `Aruba::configuration()->policyGroups()->readPolicyGroups()` | `ArubaPolicyGroupPolicyGroupsSchemaGet` or null (GET `/network-config/v1alpha1/policy-groups`) |
| `Aruba::configuration()->policyGroups()->updatePolicyGroups()` | `Successful200` or null (PATCH `/network-config/v1alpha1/policy-groups`) |
| `Aruba::configuration()->policyGroups()->createPolicyGroups()` | `Successful200` or null (POST `/network-config/v1alpha1/policy-groups`) |
| `Aruba::configuration()->policyGroups()->deletePolicyGroupsPolicyGroupPolicyGroupListByID($name)` | status or null (DELETE `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}`) |
| `Aruba::configuration()->policyGroups()->readPolicyGroupsPolicyGroupPolicyGroupListByID($name)` | `ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet` or null (GET `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}`) |
| `Aruba::configuration()->policyGroups()->updatePolicyGroupsPolicyGroupPolicyGroupListByID($name)` | `Successful200` or null (PATCH `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}`) |
| `Aruba::configuration()->policyGroups()->createPolicyGroupsPolicyGroupPolicyGroupListByID($name)` | `Successful200` or null (POST `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}`) |
| `Aruba::configuration()->policyGroups()->replacePolicyGroupsPolicyGroupPolicyGroupListByID($name)` | `Successful200` or null (PUT `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\PolicyGroup\DeletePolicyGroupsRequest` | DELETE | `/network-config/v1alpha1/policy-groups` | array or null |
| `Config\PolicyGroup\ReadPolicyGroupsRequest` | GET | `/network-config/v1alpha1/policy-groups` | `ArubaPolicyGroupPolicyGroupsSchemaGet` or null |
| `Config\PolicyGroup\UpdatePolicyGroupsRequest` | PATCH | `/network-config/v1alpha1/policy-groups` | `Successful200` or null |
| `Config\PolicyGroup\CreatePolicyGroupsRequest` | POST | `/network-config/v1alpha1/policy-groups` | `Successful200` or null |
| `Config\PolicyGroup\DeletePolicyGroupsPolicyGroupPolicyGroupListByIDRequest` | DELETE | `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}` | array or null |
| `Config\PolicyGroup\ReadPolicyGroupsPolicyGroupPolicyGroupListByIDRequest` | GET | `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}` | `ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet` or null |
| `Config\PolicyGroup\UpdatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest` | PATCH | `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}` | `Successful200` or null |
| `Config\PolicyGroup\CreatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest` | POST | `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}` | `Successful200` or null |
| `Config\PolicyGroup\ReplacePolicyGroupsPolicyGroupPolicyGroupListByIDRequest` | PUT | `/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}` | `Successful200` or null |

### Scope Management: Device Groups

`Aruba::configuration()->deviceGroups()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->deviceGroups()` | a builder over `DeviceGroup` records (GET `/network-config/v1/device-groups`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::configuration()->deviceGroups()->createDeviceCollectionSM()` | `DeviceCollectionPostRPCOutputSchema` or null (POST `/network-config/v1/device-groups`) |
| `Aruba::configuration()->deviceGroups()->updateByScopeId()` | `DeviceCollectionPutRPCOutputSchema` or null (PUT `/network-config/v1/device-groups`) |
| `Aruba::configuration()->deviceGroups()->addDevicesToDeviceCollectionSM()` | `DeviceMoveCollectionSMSchema` or null (POST `/network-config/v1/device-groups-add-devices`) |
| `Aruba::configuration()->deviceGroups()->deviceGroupsCreateAndAddDevices()` | `DeviceMoveCollectionSMSchema` or null (POST `/network-config/v1/device-groups-create-and-add-devices`) |
| `Aruba::configuration()->deviceGroups()->removeDevicesFromDeviceCollectionSM()` | `DeviceMoveCollectionSMSchema` or null (POST `/network-config/v1/device-groups-remove-devices`) |
| `Aruba::configuration()->deviceGroups()->deleteMany()` | the response as an array, or null (DELETE `/network-config/v1/device-groups/bulk`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\DeviceGroups\GetDeviceGroupsRequest` | GET | `/network-config/v1/device-groups` | `Collection` of `DeviceGroup` |
| `Config\DeviceGroups\CreateDeviceCollectionSMRequest` | POST | `/network-config/v1/device-groups` | `DeviceCollectionPostRPCOutputSchema` or null |
| `Config\DeviceGroups\UpdateDeviceCollectionByScopeIdRequest` | PUT | `/network-config/v1/device-groups` | `DeviceCollectionPutRPCOutputSchema` or null |
| `Config\DeviceGroups\AddDevicesToDeviceCollectionSMRequest` | POST | `/network-config/v1/device-groups-add-devices` | `DeviceMoveCollectionSMSchema` or null |
| `Config\DeviceGroups\DeviceGroupsCreateAndAddDevicesRequest` | POST | `/network-config/v1/device-groups-create-and-add-devices` | `DeviceMoveCollectionSMSchema` or null |
| `Config\DeviceGroups\RemoveDevicesFromDeviceCollectionSMRequest` | POST | `/network-config/v1/device-groups-remove-devices` | `DeviceMoveCollectionSMSchema` or null |
| `Config\DeviceGroups\DeleteDeviceGroupsBulkRequest` | DELETE | `/network-config/v1/device-groups/bulk` | array or null |

### Scope Management: Global

`Aruba::configuration()->global_()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->global_()->getGlobalScopeId()` | the response as an array, or null (GET `/network-config/v1/global`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Global\GetGlobalScopeIdRequest` | GET | `/network-config/v1/global` | array or null |

### Scope Management: Hierarchy

`Aruba::configuration()->hierarchy()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->hierarchy()` | a builder over `HierarchyScope` records (GET `/network-config/v1/hierarchy`): `get()`, `all()`, `first()`, `count()`, `lazy()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Hierarchy\GetHierarchyRequest` | GET | `/network-config/v1/hierarchy` | `Collection` of `HierarchyScope` |

### Scope Management: Site Collections

`Aruba::configuration()->siteCollections()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->siteCollections()` | a builder over `SiteCollection` records (GET `/network-config/v1/site-collections`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()` |
| `Aruba::configuration()->siteCollections()->addSites()` | `AddSitesToCollectionPostRPCOutputSchema` or null (POST `/network-config/v1/site-collection-add-sites`) |
| `Aruba::configuration()->siteCollections()->removeSites($siteId)` | status or null (DELETE `/network-config/v1/site-collection-remove-sites`) |
| `Aruba::configuration()->siteCollections()->updateByScopeId()` | `SiteCollectionPutRPCOutputSchema` or null (PUT `/network-config/v1/site-collections`) |
| `Aruba::configuration()->siteCollections()->deleteMany()` | the response as an array, or null (DELETE `/network-config/v1/site-collections/bulk`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\SiteCollections\AddSiteToSiteCollectionRequest` | POST | `/network-config/v1/site-collection-add-sites` | `AddSitesToCollectionPostRPCOutputSchema` or null |
| `Config\SiteCollections\RemoveSitesFromSiteCollectionByScopeIdRequest` | DELETE | `/network-config/v1/site-collection-remove-sites` | array or null |
| `Config\SiteCollections\GetSiteCollectionsRequest` | GET | `/network-config/v1/site-collections` | `Collection` of `SiteCollection` |
| `Config\SiteCollections\CreateSiteCollectionRequest` | POST | `/network-config/v1/site-collections` | `SiteCollectionPostRPCOutputSchema` or null |
| `Config\SiteCollections\UpdateSiteCollectionByScopeIdRequest` | PUT | `/network-config/v1/site-collections` | `SiteCollectionPutRPCOutputSchema` or null |
| `Config\SiteCollections\DeleteSiteCollectionsBulkRequest` | DELETE | `/network-config/v1/site-collections/bulk` | array or null |

### Scope Management: Sites

`Aruba::configuration()->sites()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->sites()` | a builder over `Site` records (GET `/network-config/v1/sites`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()` |
| `Aruba::configuration()->sites()->addDevicesToSiteSM()` | `DeviceMoveSiteSMSchema` or null (POST `/network-config/v1/site-add-devices`) |
| `Aruba::configuration()->sites()->updateByScopeId()` | `SitePutRPCOutputSchema` or null (PUT `/network-config/v1/sites`) |
| `Aruba::configuration()->sites()->deleteMany()` | the response as an array, or null (DELETE `/network-config/v1/sites/bulk`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Sites\AddDevicesToSiteSMRequest` | POST | `/network-config/v1/site-add-devices` | `DeviceMoveSiteSMSchema` or null |
| `Config\Sites\GetSitesRequest` | GET | `/network-config/v1/sites` | `Collection` of `Site` |
| `Config\Sites\CreateSiteRequest` | POST | `/network-config/v1/sites` | `SitePostRPCOutputSchema` or null |
| `Config\Sites\UpdateSiteByScopeIdRequest` | PUT | `/network-config/v1/sites` | `SitePutRPCOutputSchema` or null |
| `Config\Sites\DeleteSitesBulkRequest` | DELETE | `/network-config/v1/sites/bulk` | array or null |

### Services: AirMatch

`Aruba::airMatch()`

| Call | Returns |
|---|---|
| `Aruba::airMatch()->listAllApCoveragePlans()` | a builder over `ApCoveragePlan` records (GET `/network-services/v1/airmatch-ap-coverage-plans`) |
| `Aruba::airMatch()->getApCoveragePlans($serialNumber)` | `ApCoveragePlan` or null (GET `/network-services/v1/airmatch-ap-coverage-plans/{serial-number}`) |
| `Aruba::airMatch()->getApNeighbors($serialNumber)` | `ApNeighborList` or null (GET `/network-services/v1/airmatch-ap-neighbor-list/{serial-number}`) |
| `Aruba::airMatch()->getApRadioRelations($serialNumber)` | `ApRadioRelations` or null (GET `/network-services/v1/airmatch-ap-radio-relations/{serial-number}`) |
| `Aruba::airMatch()->listApInfo()` | a builder over `ApInfo` records (GET `/network-services/v1/airmatch-aps`) |
| `Aruba::airMatch()->getApInfo($serialNumber)` | `ApInfo` or null (GET `/network-services/v1/airmatch-aps/{serial-number}`) |
| `Aruba::airMatch()->getRadioBoardLimits($serialNumber, $radioMac)` | `BoardLimit` or null (GET `/network-services/v1/airmatch-board-limits/{serial-number}/radios/{radio-mac}`) |
| `Aruba::airMatch()->getDeviceConfig($serialNumber)` | `DeviceConfig` or null (GET `/network-services/v1/airmatch-device-config/{serial-number}`) |
| `Aruba::airMatch()->getGlobalConfigId()` | `ConfigId` or null (GET `/network-services/v1/airmatch-global-config-id`) |
| `Aruba::airMatch()->getRadioHistory($radioMac)` | `History` or null (GET `/network-services/v1/airmatch-history/{radio-mac}`) |
| `Aruba::airMatch()->getNonFriends($radioMac)` | `NonFriends` or null (GET `/network-services/v1/airmatch-non-friend/{radio-mac}`) |
| `Aruba::airMatch()->listRfPartitions()` | `Partition` or null (GET `/network-services/v1/airmatch-partitions`) |
| `Aruba::airMatch()->createRfPartitions()` | `PartitionResponse` or null (POST `/network-services/v1/airmatch-partitions`) |
| `Aruba::airMatch()->getPathloss($radioMac)` | `Pathloss` or null (GET `/network-services/v1/airmatch-pathloss/{radio-mac}`) |
| `Aruba::airMatch()->listPriorityRfEvents()` | a builder over `PrioRfEvents` records (GET `/network-services/v1/airmatch-priority-rf-events`) |
| `Aruba::airMatch()->getPriorityRfEvents($radioMac)` | `PrioRfEvents` or null (GET `/network-services/v1/airmatch-priority-rf-events/{radio-mac}`) |
| `Aruba::airMatch()->listRadioFeasibility()` | a builder over `RadioFeasibility` records (GET `/network-services/v1/airmatch-radio-feasibility`) |
| `Aruba::airMatch()->getRadioFeasibility($radioMac)` | `RadioFeasibility` or null (GET `/network-services/v1/airmatch-radio-feasibility/{radio-mac}`) |
| `Aruba::airMatch()->getRadioPartition($radioMac)` | `RadioPartition` or null (GET `/network-services/v1/airmatch-radio-partition/{radio-mac}`) |
| `Aruba::airMatch()->listRadioInfo()` | a builder over `RadioInfo` records (GET `/network-services/v1/airmatch-radios`) |
| `Aruba::airMatch()->getRadioInfo($radioMac)` | `RadioInfo` or null (GET `/network-services/v1/airmatch-radios/{radio-mac}`) |
| `Aruba::airMatch()->listRfEvents()` | a builder over `RfEvents` records (GET `/network-services/v1/airmatch-rf-events`) |
| `Aruba::airMatch()->getRfEvents($radioMac)` | `RfEvents` or null (GET `/network-services/v1/airmatch-rf-events/{radio-mac}`) |
| `Aruba::airMatch()->getServiceConfig()` | `ServiceConfig` or null (GET `/network-services/v1/airmatch-service-config`) |
| `Aruba::airMatch()->listAllSolutions()` | a builder over `Solution` records (GET `/network-services/v1/airmatch-solutions`) |
| `Aruba::airMatch()->runSolutionOptimization($runmode)` | `RunnowResponse` or null (POST `/network-services/v1/airmatch-solutions/run-now`) |
| `Aruba::airMatch()->getRadioSolution($radioMac)` | `Solution` or null (GET `/network-services/v1/airmatch-solutions/{radio-mac}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\AirMatch\ListAllApCoveragePlansRequest` | GET | `/network-services/v1/airmatch-ap-coverage-plans` | `Collection` of `ApCoveragePlan` |
| `Services\AirMatch\GetApCoveragePlansRequest` | GET | `/network-services/v1/airmatch-ap-coverage-plans/{serial-number}` | `ApCoveragePlan` or null |
| `Services\AirMatch\GetApNeighborsRequest` | GET | `/network-services/v1/airmatch-ap-neighbor-list/{serial-number}` | `ApNeighborList` or null |
| `Services\AirMatch\GetApRadioRelationsRequest` | GET | `/network-services/v1/airmatch-ap-radio-relations/{serial-number}` | `ApRadioRelations` or null |
| `Services\AirMatch\ListApInfoRequest` | GET | `/network-services/v1/airmatch-aps` | `Collection` of `ApInfo` |
| `Services\AirMatch\GetApInfoRequest` | GET | `/network-services/v1/airmatch-aps/{serial-number}` | `ApInfo` or null |
| `Services\AirMatch\GetRadioBoardLimitsRequest` | GET | `/network-services/v1/airmatch-board-limits/{serial-number}/radios/{radio-mac}` | `BoardLimit` or null |
| `Services\AirMatch\GetDeviceConfigRequest` | GET | `/network-services/v1/airmatch-device-config/{serial-number}` | `DeviceConfig` or null |
| `Services\AirMatch\GetGlobalConfigIdRequest` | GET | `/network-services/v1/airmatch-global-config-id` | `ConfigId` or null |
| `Services\AirMatch\GetRadioHistoryRequest` | GET | `/network-services/v1/airmatch-history/{radio-mac}` | `History` or null |
| `Services\AirMatch\GetNonFriendsRequest` | GET | `/network-services/v1/airmatch-non-friend/{radio-mac}` | `NonFriends` or null |
| `Services\AirMatch\ListRfPartitionsRequest` | GET | `/network-services/v1/airmatch-partitions` | `Partition` or null |
| `Services\AirMatch\CreateRfPartitionsRequest` | POST | `/network-services/v1/airmatch-partitions` | `PartitionResponse` or null |
| `Services\AirMatch\GetPathlossRequest` | GET | `/network-services/v1/airmatch-pathloss/{radio-mac}` | `Pathloss` or null |
| `Services\AirMatch\ListPriorityRfEventsRequest` | GET | `/network-services/v1/airmatch-priority-rf-events` | `Collection` of `PrioRfEvents` |
| `Services\AirMatch\GetPriorityRfEventsRequest` | GET | `/network-services/v1/airmatch-priority-rf-events/{radio-mac}` | `PrioRfEvents` or null |
| `Services\AirMatch\ListRadioFeasibilityRequest` | GET | `/network-services/v1/airmatch-radio-feasibility` | `Collection` of `RadioFeasibility` |
| `Services\AirMatch\GetRadioFeasibilityRequest` | GET | `/network-services/v1/airmatch-radio-feasibility/{radio-mac}` | `RadioFeasibility` or null |
| `Services\AirMatch\GetRadioPartitionRequest` | GET | `/network-services/v1/airmatch-radio-partition/{radio-mac}` | `RadioPartition` or null |
| `Services\AirMatch\ListRadioInfoRequest` | GET | `/network-services/v1/airmatch-radios` | `Collection` of `RadioInfo` |
| `Services\AirMatch\GetRadioInfoRequest` | GET | `/network-services/v1/airmatch-radios/{radio-mac}` | `RadioInfo` or null |
| `Services\AirMatch\ListRfEventsRequest` | GET | `/network-services/v1/airmatch-rf-events` | `Collection` of `RfEvents` |
| `Services\AirMatch\GetRfEventsRequest` | GET | `/network-services/v1/airmatch-rf-events/{radio-mac}` | `RfEvents` or null |
| `Services\AirMatch\GetServiceConfigRequest` | GET | `/network-services/v1/airmatch-service-config` | `ServiceConfig` or null |
| `Services\AirMatch\ListAllSolutionsRequest` | GET | `/network-services/v1/airmatch-solutions` | `Collection` of `Solution` |
| `Services\AirMatch\RunSolutionOptimizationRequest` | POST | `/network-services/v1/airmatch-solutions/run-now` | `RunnowResponse` or null |
| `Services\AirMatch\GetRadioSolutionRequest` | GET | `/network-services/v1/airmatch-solutions/{radio-mac}` | `Solution` or null |

### Services: Airgroup System

`Aruba::configuration()->airgroupSystem()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->airgroupSystem()->deleteAirgroupSystem()` | status or null (DELETE `/network-config/v1alpha1/airgroup-system`) |
| `Aruba::configuration()->airgroupSystem()->readAirgroupSystem()` | `ArubaAirgroupSystemAirgroupSystemSchemaGet` or null (GET `/network-config/v1alpha1/airgroup-system`) |
| `Aruba::configuration()->airgroupSystem()->updateAirgroupSystem()` | `Successful200` or null (PATCH `/network-config/v1alpha1/airgroup-system`) |
| `Aruba::configuration()->airgroupSystem()->createAirgroupSystem()` | `Successful200` or null (POST `/network-config/v1alpha1/airgroup-system`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\AirgroupSystem\DeleteAirgroupSystemRequest` | DELETE | `/network-config/v1alpha1/airgroup-system` | array or null |
| `Config\AirgroupSystem\ReadAirgroupSystemRequest` | GET | `/network-config/v1alpha1/airgroup-system` | `ArubaAirgroupSystemAirgroupSystemSchemaGet` or null |
| `Config\AirgroupSystem\UpdateAirgroupSystemRequest` | PATCH | `/network-config/v1alpha1/airgroup-system` | `Successful200` or null |
| `Config\AirgroupSystem\CreateAirgroupSystemRequest` | POST | `/network-config/v1alpha1/airgroup-system` | `Successful200` or null |

### Services: Audit Trail Information

`Aruba::audits()`

| Call | Returns |
|---|---|
| `Aruba::audits()` | a builder over `AuditDetail` records (GET `/network-services/v1/audits`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\AuditTrailInformation\ListAuditsRequest` | GET | `/network-services/v1/audits` | `Collection` of `AuditDetail` |
| `Services\AuditTrailInformation\GetAuditByIdRequest` | GET | `/network-services/v1/audits/{id}` | `AuditDetail` or null |

### Services: FCO Response Information

`Aruba::afc()`

| Call | Returns |
|---|---|
| `Aruba::afc()` | a builder over `FcoRespInfo` records (GET `/network-services/v1/fco-resp-info-all`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\FCOResponseInformation\ListAfcRespInfoRequest` | GET | `/network-services/v1/fco-resp-info-all` | `Collection` of `FcoRespInfo` |
| `Services\FCOResponseInformation\GetAfcRespInfoRequest` | GET | `/network-services/v1/fco-resp-info/{serial-number}` | `FcoRespInfo` or null |

### Services: Firmware Management

`Aruba::firmware()`

| Call | Returns |
|---|---|
| `Aruba::firmware()` | a builder over `FirmwareDetailsItem` records (GET `/network-services/v1/firmware-details`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::firmware()->apLiveUpgrades()` | a builder over `ListApLiveUpgradesItem` records (GET `/network-services/v1/ap-live-upgrades`) |
| `Aruba::firmware()->deviceLiveUpgrades()` | a builder over `ListDeviceLiveUpgradesItem` records (GET `/network-services/v1/device-live-upgrades`) |
| `Aruba::firmware()->gatewayLiveUpgrades()` | a builder over `ListGatewayLiveUpgradesItem` records (GET `/network-services/v1/gateway-live-upgrades`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\FirmwareManagement\ListApLiveUpgradesRequest` | GET | `/network-services/v1/ap-live-upgrades` | `Collection` of `ListApLiveUpgradesItem` |
| `Services\FirmwareManagement\ListDeviceLiveUpgradesRequest` | GET | `/network-services/v1/device-live-upgrades` | `Collection` of `ListDeviceLiveUpgradesItem` |
| `Services\FirmwareManagement\GetFirmwareDetailsListRequest` | GET | `/network-services/v1/firmware-details` | `Collection` of `FirmwareDetailsItem` |
| `Services\FirmwareManagement\ListGatewayLiveUpgradesRequest` | GET | `/network-services/v1/gateway-live-upgrades` | `Collection` of `ListGatewayLiveUpgradesItem` |

### Services: GDPR

`Aruba::gdpr()`

| Call | Returns |
|---|---|
| `Aruba::gdpr()` | a builder over `Exclusion` records (GET `/network-services/v1/gdpr-exclusions`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `delete()` |
| `Aruba::gdpr()->exclusionTypes()` | a builder over `ExclusionType` records (GET `/network-services/v1/gdpr-exclusion-types`) |
| `Aruba::gdpr()->exclusionType($id)` | `ExclusionType` or null (GET `/network-services/v1/gdpr-exclusion-types/{id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\GDPR\ListExclusionTypesRequest` | GET | `/network-services/v1/gdpr-exclusion-types` | `Collection` of `ExclusionType` |
| `Services\GDPR\GetExclusionTypeRequest` | GET | `/network-services/v1/gdpr-exclusion-types/{id}` | `ExclusionType` or null |
| `Services\GDPR\ListExclusionsRequest` | GET | `/network-services/v1/gdpr-exclusions` | `Collection` of `Exclusion` |
| `Services\GDPR\AddExclusionRequest` | POST | `/network-services/v1/gdpr-exclusions` | `Exclusion` or null |
| `Services\GDPR\RemoveExclusionRequest` | DELETE | `/network-services/v1/gdpr-exclusions/{id}` | array or null |
| `Services\GDPR\GetExclusionRequest` | GET | `/network-services/v1/gdpr-exclusions/{id}` | `Exclusion` or null |

### Services: Location

`Aruba::location()`

| Call | Returns |
|---|---|
| `Aruba::location()->startRangingScan($siteId, $floorId)` | `StartApRangingScan` or null (POST `/network-services/v1/ap-ranging-scans`) |
| `Aruba::location()->assetTags()` | a builder over records as arrays (GET `/network-services/v1/asset-tags`) |
| `Aruba::location()->assetTag($assetTagId)` | `TagData` or null (GET `/network-services/v1/asset-tags/{asset-tag-id}`) |
| `Aruba::location()->deleteAssetTagImage($assetTagId)` | status or null (DELETE `/network-services/v1/asset-tags/{asset-tag-id}/image`) |
| `Aruba::location()->getAssetTagImage($assetTagId)` | the response as an array, or null (GET `/network-services/v1/asset-tags/{asset-tag-id}/image`) |
| `Aruba::location()->updateAssetTagImage($assetTagId)` | `AssetTagImage` or null (PUT `/network-services/v1/asset-tags/{asset-tag-id}/image`) |
| `Aruba::location()->deleteAssetTagData($assetTagId)` | status or null (DELETE `/network-services/v1/asset-tags/{asset-tag-id}/metadata`) |
| `Aruba::location()->createAssetTagData($assetTagId)` | `TagDataUpdate` or null (POST `/network-services/v1/asset-tags/{asset-tag-id}/metadata`) |
| `Aruba::location()->updateAssetTagData($assetTagId)` | `TagDataUpdate` or null (PUT `/network-services/v1/asset-tags/{asset-tag-id}/metadata`) |
| `Aruba::location()->analyticsSiteInsights()` | a builder over `LaSitesInsightsForAPI` records (GET `/network-services/v1/location-analytics/sites/insights`) |
| `Aruba::location()->analyticsTrends()` | `LaTrendsResponseForAPI` or null (GET `/network-services/v1/location-analytics/trends`) |
| `Aruba::location()->rangingScans($siteId, $floorId)` | a builder over `ApRangingScanStatus` records (GET `/network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans`) |
| `Aruba::location()->stopRangingScan($siteId, $floorId, $scanId)` | status or null (DELETE `/network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}`) |
| `Aruba::location()->rangingScan($siteId, $floorId, $scanId)` | `ApRangingScanStatus` or null (GET `/network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}`) |
| `Aruba::location()->deviceLocations($siteId)` | a builder over `DeviceLocationSummary` records (GET `/network-services/v1/sites/{site-id}/device-locations`) |
| `Aruba::location()->deviceLocation($siteId, $locationId)` | `DeviceLocationSummary` or null (GET `/network-services/v1/sites/{site-id}/device-locations/{location-id}`) |
| `Aruba::location()->deleteDeviceAdminLocation($siteId, $serialNumber)` | status or null (DELETE `/network-services/v1/sites/{site-id}/devices/{serial-number}/location`) |
| `Aruba::location()->deviceDetailedLocation($siteId, $serialNumber)` | `DeviceLocationSummary` or null (GET `/network-services/v1/sites/{site-id}/devices/{serial-number}/location`) |
| `Aruba::location()->setDeviceAdminLocation($siteId, $serialNumber)` | `LocationUpdate` or null (POST `/network-services/v1/sites/{site-id}/devices/{serial-number}/location`) |
| `Aruba::location()->clientLocations()` | a builder over records as arrays (GET `/network-services/v1/wifi-clients-locations`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\Location\StartApRangingScanRequest` | POST | `/network-services/v1/ap-ranging-scans` | `StartApRangingScan` or null |
| `Services\Location\ListAssetTagDataRequest` | GET | `/network-services/v1/asset-tags` | `Collection` of arrays |
| `Services\Location\GetAssetTagDataByAssetTagIdRequest` | GET | `/network-services/v1/asset-tags/{asset-tag-id}` | `TagData` or null |
| `Services\Location\DeleteAssetTagImageRequest` | DELETE | `/network-services/v1/asset-tags/{asset-tag-id}/image` | array or null |
| `Services\Location\GetAssetTagImageRequest` | GET | `/network-services/v1/asset-tags/{asset-tag-id}/image` | array or null |
| `Services\Location\UpdateAssetTagImageRequest` | PUT | `/network-services/v1/asset-tags/{asset-tag-id}/image` | `AssetTagImage` or null |
| `Services\Location\DeleteAssetTagDataByAssetTagIdRequest` | DELETE | `/network-services/v1/asset-tags/{asset-tag-id}/metadata` | array or null |
| `Services\Location\CreateAssetTagDataByAssetTagIdRequest` | POST | `/network-services/v1/asset-tags/{asset-tag-id}/metadata` | `TagDataUpdate` or null |
| `Services\Location\UpdateAssetTagDataByAssetTagIdRequest` | PUT | `/network-services/v1/asset-tags/{asset-tag-id}/metadata` | `TagDataUpdate` or null |
| `Services\Location\GetLaSitesInsightsForAPIRequest` | GET | `/network-services/v1/location-analytics/sites/insights` | `Collection` of `LaSitesInsightsForAPI` |
| `Services\Location\GetLaTrendsForAPIRequest` | GET | `/network-services/v1/location-analytics/trends` | `LaTrendsResponseForAPI` or null |
| `Services\Location\GetApRangingScanListRequest` | GET | `/network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans` | `Collection` of `ApRangingScanStatus` |
| `Services\Location\StopApRangingScanRequest` | DELETE | `/network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}` | array or null |
| `Services\Location\GetApRangingScanRequest` | GET | `/network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans/{scan-id}` | `ApRangingScanStatus` or null |
| `Services\Location\GetDeviceLocationsRequest` | GET | `/network-services/v1/sites/{site-id}/device-locations` | `Collection` of `DeviceLocationSummary` |
| `Services\Location\GetLocationByIdRequest` | GET | `/network-services/v1/sites/{site-id}/device-locations/{location-id}` | `DeviceLocationSummary` or null |
| `Services\Location\DelDeviceAdminLocationRequest` | DELETE | `/network-services/v1/sites/{site-id}/devices/{serial-number}/location` | array or null |
| `Services\Location\GetDeviceDetailedLocationRequest` | GET | `/network-services/v1/sites/{site-id}/devices/{serial-number}/location` | `DeviceLocationSummary` or null |
| `Services\Location\PutDeviceAdminLocationRequest` | POST | `/network-services/v1/sites/{site-id}/devices/{serial-number}/location` | `LocationUpdate` or null |
| `Services\Location\ListClientLocationsForAPIRequest` | GET | `/network-services/v1/wifi-clients-locations` | `Collection` of arrays |

### Services: Transition Manager

`Aruba::transitionManager()`

| Call | Returns |
|---|---|
| `Aruba::transitionManager()->flushTransitionCache()` | `OperationResult` or null (POST `/network-services/v1/tms-cache-flushes`) |
| `Aruba::transitionManager()->getCurrentCustomerAction()` | `CurrentCustomerAction` or null (GET `/network-services/v1/tms-current-customer-action`) |
| `Aruba::transitionManager()->listCustomers()` | a builder over records as arrays (GET `/network-services/v1/tms-customer-ids`) |
| `Aruba::transitionManager()->listDebugInformation()` | a builder over records as arrays (GET `/network-services/v1/tms-debug-records`) |
| `Aruba::transitionManager()->listExcludedCustomers()` | a builder over records as arrays (GET `/network-services/v1/tms-excluded-ids`) |
| `Aruba::transitionManager()->updateExcludedCustomers()` | `OperationResult` or null (POST `/network-services/v1/tms-excluded-ids`) |
| `Aruba::transitionManager()->listMigrationActions()` | a builder over records as arrays (GET `/network-services/v1/tms-migration-actions`) |
| `Aruba::transitionManager()->listMigrationApplicationStatuses()` | a builder over records as arrays (GET `/network-services/v1/tms-migration-application-statuses`) |
| `Aruba::transitionManager()->listMigrationDetails()` | a builder over records as arrays (GET `/network-services/v1/tms-migration-details`) |
| `Aruba::transitionManager()->setMigrationIdCheck($check)` | `OperationResult` or null (POST `/network-services/v1/tms-migration-id-check-updates`) |
| `Aruba::transitionManager()->getCustomerByMigrationId($migrationId)` | `MigrationIdMappingResult` or null (GET `/network-services/v1/tms-migration-id-mappings/{migration-id}`) |
| `Aruba::transitionManager()->getMigrationMspTenantInformation($migrationMspId)` | `MspIdInformationResult` or null (GET `/network-services/v1/tms-migration-msp-id-record`) |
| `Aruba::transitionManager()->getMspTenantMapping()` | `MspIdMappingResult` or null (POST `/network-services/v1/tms-msp-id-mappings`) |
| `Aruba::transitionManager()->setMspCustomerAction()` | `OperationResult` or null (POST `/network-services/v1/tms-msp-transition-actions`) |
| `Aruba::transitionManager()->listCustomersByAction()` | a builder over records as arrays (GET `/network-services/v1/tms-transition-action-assignments`) |
| `Aruba::transitionManager()->setCustomerAction()` | `OperationResult` or null (POST `/network-services/v1/tms-transition-actions`) |
| `Aruba::transitionManager()->setBigHammerRollback()` | `OperationResult` or null (POST `/network-services/v1/tms-transition-rollbacks`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\TransitionManager\FlushTransitionCacheRequest` | POST | `/network-services/v1/tms-cache-flushes` | `OperationResult` or null |
| `Services\TransitionManager\GetCurrentCustomerActionRequest` | GET | `/network-services/v1/tms-current-customer-action` | `CurrentCustomerAction` or null |
| `Services\TransitionManager\ListCustomersRequest` | GET | `/network-services/v1/tms-customer-ids` | `Collection` of arrays |
| `Services\TransitionManager\ListDebugInformationRequest` | GET | `/network-services/v1/tms-debug-records` | `Collection` of arrays |
| `Services\TransitionManager\ListExcludedCustomersRequest` | GET | `/network-services/v1/tms-excluded-ids` | `Collection` of arrays |
| `Services\TransitionManager\UpdateExcludedCustomersRequest` | POST | `/network-services/v1/tms-excluded-ids` | `OperationResult` or null |
| `Services\TransitionManager\ListMigrationActionsRequest` | GET | `/network-services/v1/tms-migration-actions` | `Collection` of arrays |
| `Services\TransitionManager\ListMigrationApplicationStatusesRequest` | GET | `/network-services/v1/tms-migration-application-statuses` | `Collection` of arrays |
| `Services\TransitionManager\ListMigrationDetailsRequest` | GET | `/network-services/v1/tms-migration-details` | `Collection` of arrays |
| `Services\TransitionManager\SetMigrationIdCheckRequest` | POST | `/network-services/v1/tms-migration-id-check-updates` | `OperationResult` or null |
| `Services\TransitionManager\GetCustomerByMigrationIdRequest` | GET | `/network-services/v1/tms-migration-id-mappings/{migration-id}` | `MigrationIdMappingResult` or null |
| `Services\TransitionManager\GetMigrationMspTenantInformationRequest` | GET | `/network-services/v1/tms-migration-msp-id-record` | `MspIdInformationResult` or null |
| `Services\TransitionManager\GetMspTenantMappingRequest` | POST | `/network-services/v1/tms-msp-id-mappings` | `MspIdMappingResult` or null |
| `Services\TransitionManager\SetMspCustomerActionRequest` | POST | `/network-services/v1/tms-msp-transition-actions` | `OperationResult` or null |
| `Services\TransitionManager\ListCustomersByActionRequest` | GET | `/network-services/v1/tms-transition-action-assignments` | `Collection` of arrays |
| `Services\TransitionManager\SetCustomerActionRequest` | POST | `/network-services/v1/tms-transition-actions` | `OperationResult` or null |
| `Services\TransitionManager\SetBigHammerRollbackRequest` | POST | `/network-services/v1/tms-transition-rollbacks` | `OperationResult` or null |

### Services: WIDS

`Aruba::wids()`

| Call | Returns |
|---|---|
| `Aruba::wids()->intrusions()` | a builder over `Intrusion` records (GET `/network-services/v1/wids-intrusions`) |
| `Aruba::wids()->monitoredAps()` | a builder over `MonitoredAp` records (GET `/network-services/v1/wids-monitored-aps`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\WIDS\ListIntrusionsRequest` | GET | `/network-services/v1/wids-intrusions` | `Collection` of `Intrusion` |
| `Services\WIDS\ListMonitoredApsRequest` | GET | `/network-services/v1/wids-monitored-aps` | `Collection` of `MonitoredAp` |

### Services: Webhooks

`Aruba::webhooks()`

| Call | Returns |
|---|---|
| `Aruba::webhooks()` | a builder over `GetWebhooksItem` records (GET `/network-services/v1/webhooks`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `update()`, `replace()`, `delete()` |
| `Aruba::webhooks()->rotateHmacKey($id)` | `WebhookRotateHmacKey` or null (POST `/network-services/v1/webhooks/{id}/rotate-hmac-key`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\Webhooks\GetWebhooksRequest` | GET | `/network-services/v1/webhooks` | `Collection` of `GetWebhooksItem` |
| `Services\Webhooks\CreateWebhookRequest` | POST | `/network-services/v1/webhooks` | `WebhookCreate` or null |
| `Services\Webhooks\DeleteWebhookRequest` | DELETE | `/network-services/v1/webhooks/{id}` | array or null |
| `Services\Webhooks\GetWebhookRequest` | GET | `/network-services/v1/webhooks/{id}` | array or null |
| `Services\Webhooks\PatchWebhookRequest` | PATCH | `/network-services/v1/webhooks/{id}` | `WebhookPatch` or null |
| `Services\Webhooks\UpdateWebhookRequest` | PUT | `/network-services/v1/webhooks/{id}` | `WebhookUpdate` or null |
| `Services\Webhooks\RotateWebhookHmacKeyRequest` | POST | `/network-services/v1/webhooks/{id}/rotate-hmac-key` | `WebhookRotateHmacKey` or null |

### System: Custom Get Api

`Aruba::configuration()->customGetApi()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->customGetApi()->readCustomGetApi()` | `ArubaCustomGetApiCustomGetApiSchemaGet` or null (GET `/network-config/v1alpha1/custom-get-api`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\CustomGetApi\ReadCustomGetApiRequest` | GET | `/network-config/v1alpha1/custom-get-api` | `ArubaCustomGetApiCustomGetApiSchemaGet` or null |

### Troubleshooting: AOS-S Switches

`Aruba::troubleshooting()->aosSwitches($serialNumber)`

| Call | Returns |
|---|---|
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->initiatePvosCableTest()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/cableTest`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->getPvosCableTestResult($taskId)` | `CableTestHppcResult` or null (GET `/network-troubleshooting/v1/aos-s/{serial-number}/cableTest/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->initiatePvosGetArpTable()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/getArpTable`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->getPvosGetArpTableResult($taskId)` | `GetArpTableHppcResult` or null (GET `/network-troubleshooting/v1/aos-s/{serial-number}/getArpTable/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->listAossTasks()` | a builder over `TaskListEntry` records (GET `/network-troubleshooting/v1/aos-s/{serial-number}/list-tasks`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->locatePvosSwitch()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/locate`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->initiatePvosPing()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/ping`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->getPvosPingResult($taskId)` | `PingHppcResult` or null (GET `/network-troubleshooting/v1/aos-s/{serial-number}/ping/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->initiatePvosPoeBounce()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/poeBounce`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->getPvosPoeBounceResult($taskId)` | `PoeBounceHppcResult` or null (GET `/network-troubleshooting/v1/aos-s/{serial-number}/poeBounce/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->initiatePvosPortBounce()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/portBounce`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->getPvosPortBounceResult($taskId)` | `PortBounceHppcResult` or null (GET `/network-troubleshooting/v1/aos-s/{serial-number}/portBounce/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->rebootPvosSwitch()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/reboot`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->listAossShowCommands()` | a builder over `ShowCommandsCategory` records (GET `/network-troubleshooting/v1/aos-s/{serial-number}/show-commands`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->runAossShowCommands()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/showCommands`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->getAossShowCommandsResult($taskId)` | `ShowCommandResult` or null (GET `/network-troubleshooting/v1/aos-s/{serial-number}/showCommands/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->initiatePvosTraceroute()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aos-s/{serial-number}/traceroute`) |
| `Aruba::troubleshooting()->aosSwitches($serialNumber)->getPvosTracerouteResult($taskId)` | `TracerouteHppcResult` or null (GET `/network-troubleshooting/v1/aos-s/{serial-number}/traceroute/async-operations/{task-id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\AOSSSwitches\InitiatePvosCableTestRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/cableTest` | `AsyncOperationStatus` or null |
| `Troubleshooting\AOSSSwitches\GetPvosCableTestResultRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/cableTest/async-operations/{task-id}` | `CableTestHppcResult` or null |
| `Troubleshooting\AOSSSwitches\InitiatePvosGetArpTableRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/getArpTable` | `AsyncOperationStatus` or null |
| `Troubleshooting\AOSSSwitches\GetPvosGetArpTableResultRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/getArpTable/async-operations/{task-id}` | `GetArpTableHppcResult` or null |
| `Troubleshooting\AOSSSwitches\ListAossTasksRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/list-tasks` | `Collection` of `TaskListEntry` |
| `Troubleshooting\AOSSSwitches\LocatePvosSwitchRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/locate` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AOSSSwitches\InitiatePvosPingRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/ping` | `AsyncOperationStatus` or null |
| `Troubleshooting\AOSSSwitches\GetPvosPingResultRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/ping/async-operations/{task-id}` | `PingHppcResult` or null |
| `Troubleshooting\AOSSSwitches\InitiatePvosPoeBounceRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/poeBounce` | `AsyncOperationStatus` or null |
| `Troubleshooting\AOSSSwitches\GetPvosPoeBounceResultRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/poeBounce/async-operations/{task-id}` | `PoeBounceHppcResult` or null |
| `Troubleshooting\AOSSSwitches\InitiatePvosPortBounceRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/portBounce` | `AsyncOperationStatus` or null |
| `Troubleshooting\AOSSSwitches\GetPvosPortBounceResultRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/portBounce/async-operations/{task-id}` | `PortBounceHppcResult` or null |
| `Troubleshooting\AOSSSwitches\RebootPvosSwitchRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/reboot` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AOSSSwitches\ListAossShowCommandsRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/show-commands` | `Collection` of `ShowCommandsCategory` |
| `Troubleshooting\AOSSSwitches\RunAossShowCommandsRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/showCommands` | `AsyncOperationStatus` or null |
| `Troubleshooting\AOSSSwitches\GetAossShowCommandsResultRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/showCommands/async-operations/{task-id}` | `ShowCommandResult` or null |
| `Troubleshooting\AOSSSwitches\InitiatePvosTracerouteRequest` | POST | `/network-troubleshooting/v1/aos-s/{serial-number}/traceroute` | `AsyncOperationStatus` or null |
| `Troubleshooting\AOSSSwitches\GetPvosTracerouteResultRequest` | GET | `/network-troubleshooting/v1/aos-s/{serial-number}/traceroute/async-operations/{task-id}` | `TracerouteHppcResult` or null |

### Troubleshooting: Access Points

`Aruba::troubleshooting()->accessPoints($serialNumber)`

| Call | Returns |
|---|---|
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApAaa()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/aaa`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApAaaResult($taskId)` | `AaaApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/aaa/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->disconnectAllUsersAp()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/disconnectUserAll`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->disconnectUserByMacAp()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/disconnectUserByMacAddress`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->disconnectUserByNetworkAp()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/disconnectUserByNetwork`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApGetArpTable()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/getArpTable`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApGetArpTableResult($taskId)` | `GetArpTableApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/getArpTable/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApHttp()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/http`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApHttpResult($taskId)` | `HttpApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/http/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApHttps()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/https`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApHttpsResult($taskId)` | `HttpsApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/https/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->listApTasks()` | a builder over `TaskListEntry` records (GET `/network-troubleshooting/v1/aps/{serial-number}/list-tasks`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->locateAp()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/locate`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApNslookup()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/nslookup`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApNslookupResult($taskId)` | `NslookupApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/nslookup/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApPing()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/ping`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApPingResult($taskId)` | `PingApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/ping/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->rebootAp()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/reboot`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->rebootApSwarm()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/rebootSwarm`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->listApShowCommands()` | a builder over `ShowCommandsCategory` records (GET `/network-troubleshooting/v1/aps/{serial-number}/show-commands`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->runApShowCommands()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/showCommands`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApShowCommandsResult($taskId)` | `ShowCommandResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/showCommands/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApSpeedtest()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/speedtest`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApSpeedtestResult($taskId)` | `SpeedtestApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/speedtest/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApTcp()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/tcp`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApTcpResult($taskId)` | `TcpApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/tcp/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->initiateApTraceroute()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/aps/{serial-number}/traceroute`) |
| `Aruba::troubleshooting()->accessPoints($serialNumber)->getApTracerouteResult($taskId)` | `TracerouteApResult` or null (GET `/network-troubleshooting/v1/aps/{serial-number}/traceroute/async-operations/{task-id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\AccessPoints\InitiateApAaaRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/aaa` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApAaaResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/aaa/async-operations/{task-id}` | `AaaApResult` or null |
| `Troubleshooting\AccessPoints\DisconnectAllUsersApRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/disconnectUserAll` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AccessPoints\DisconnectUserByMacApRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/disconnectUserByMacAddress` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AccessPoints\DisconnectUserByNetworkApRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/disconnectUserByNetwork` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AccessPoints\InitiateApGetArpTableRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/getArpTable` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApGetArpTableResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/getArpTable/async-operations/{task-id}` | `GetArpTableApResult` or null |
| `Troubleshooting\AccessPoints\InitiateApHttpRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/http` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApHttpResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/http/async-operations/{task-id}` | `HttpApResult` or null |
| `Troubleshooting\AccessPoints\InitiateApHttpsRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/https` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApHttpsResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/https/async-operations/{task-id}` | `HttpsApResult` or null |
| `Troubleshooting\AccessPoints\ListApTasksRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/list-tasks` | `Collection` of `TaskListEntry` |
| `Troubleshooting\AccessPoints\LocateApRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/locate` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AccessPoints\InitiateApNslookupRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/nslookup` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApNslookupResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/nslookup/async-operations/{task-id}` | `NslookupApResult` or null |
| `Troubleshooting\AccessPoints\InitiateApPingRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/ping` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApPingResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/ping/async-operations/{task-id}` | `PingApResult` or null |
| `Troubleshooting\AccessPoints\RebootApRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/reboot` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AccessPoints\RebootApSwarmRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/rebootSwarm` | `ActionInitiatedStatus` or null |
| `Troubleshooting\AccessPoints\ListApShowCommandsRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/show-commands` | `Collection` of `ShowCommandsCategory` |
| `Troubleshooting\AccessPoints\RunApShowCommandsRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/showCommands` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApShowCommandsResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/showCommands/async-operations/{task-id}` | `ShowCommandResult` or null |
| `Troubleshooting\AccessPoints\InitiateApSpeedtestRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/speedtest` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApSpeedtestResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/speedtest/async-operations/{task-id}` | `SpeedtestApResult` or null |
| `Troubleshooting\AccessPoints\InitiateApTcpRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/tcp` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApTcpResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/tcp/async-operations/{task-id}` | `TcpApResult` or null |
| `Troubleshooting\AccessPoints\InitiateApTracerouteRequest` | POST | `/network-troubleshooting/v1/aps/{serial-number}/traceroute` | `AsyncOperationStatus` or null |
| `Troubleshooting\AccessPoints\GetApTracerouteResultRequest` | GET | `/network-troubleshooting/v1/aps/{serial-number}/traceroute/async-operations/{task-id}` | `TracerouteApResult` or null |

### Troubleshooting: CX Switches

`Aruba::troubleshooting()->cxSwitches($serialNumber)`

| Call | Returns |
|---|---|
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->initiateCxAaa()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/aaa`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxAaaResult($taskId)` | `AaaCxResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/aaa/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->initiateCxCableTest()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/cableTest`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxCableTestResult($taskId)` | `CableTestCxResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/cableTest/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->initiateCxHttp()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/http`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxHttpResult($taskId)` | `HttpCxResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/http/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->listCxTasks()` | a builder over `TaskListEntry` records (GET `/network-troubleshooting/v1/cx/{serial-number}/list-tasks`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->locateCxSwitch()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/locate`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->initiateCxPing()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/ping`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxPingResult($taskId)` | `PingCxResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/ping/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->initiateCxPoeBounce()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/poeBounce`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxPoeBounceResult($taskId)` | `PoeBounceCxResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/poeBounce/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->initiateCxPortBounce()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/portBounce`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxPortBounceResult($taskId)` | `PortBounceCxResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/portBounce/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->rebootCxSwitch()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/reboot`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->listCxShowCommands()` | a builder over `ShowCommandsCategory` records (GET `/network-troubleshooting/v1/cx/{serial-number}/show-commands`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->runCxShowCommands()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/showCommands`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxShowCommandsResult($taskId)` | `ShowCommandResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/showCommands/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->initiateCxTraceroute()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/cx/{serial-number}/traceroute`) |
| `Aruba::troubleshooting()->cxSwitches($serialNumber)->getCxTracerouteResult($taskId)` | `TracerouteCxResult` or null (GET `/network-troubleshooting/v1/cx/{serial-number}/traceroute/async-operations/{task-id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\CXSwitches\InitiateCxAaaRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/aaa` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxAaaResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/aaa/async-operations/{task-id}` | `AaaCxResult` or null |
| `Troubleshooting\CXSwitches\InitiateCxCableTestRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/cableTest` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxCableTestResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/cableTest/async-operations/{task-id}` | `CableTestCxResult` or null |
| `Troubleshooting\CXSwitches\InitiateCxHttpRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/http` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxHttpResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/http/async-operations/{task-id}` | `HttpCxResult` or null |
| `Troubleshooting\CXSwitches\ListCxTasksRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/list-tasks` | `Collection` of `TaskListEntry` |
| `Troubleshooting\CXSwitches\LocateCxSwitchRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/locate` | `ActionInitiatedStatus` or null |
| `Troubleshooting\CXSwitches\InitiateCxPingRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/ping` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxPingResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/ping/async-operations/{task-id}` | `PingCxResult` or null |
| `Troubleshooting\CXSwitches\InitiateCxPoeBounceRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/poeBounce` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxPoeBounceResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/poeBounce/async-operations/{task-id}` | `PoeBounceCxResult` or null |
| `Troubleshooting\CXSwitches\InitiateCxPortBounceRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/portBounce` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxPortBounceResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/portBounce/async-operations/{task-id}` | `PortBounceCxResult` or null |
| `Troubleshooting\CXSwitches\RebootCxSwitchRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/reboot` | `ActionInitiatedStatus` or null |
| `Troubleshooting\CXSwitches\ListCxShowCommandsRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/show-commands` | `Collection` of `ShowCommandsCategory` |
| `Troubleshooting\CXSwitches\RunCxShowCommandsRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/showCommands` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxShowCommandsResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/showCommands/async-operations/{task-id}` | `ShowCommandResult` or null |
| `Troubleshooting\CXSwitches\InitiateCxTracerouteRequest` | POST | `/network-troubleshooting/v1/cx/{serial-number}/traceroute` | `AsyncOperationStatus` or null |
| `Troubleshooting\CXSwitches\GetCxTracerouteResultRequest` | GET | `/network-troubleshooting/v1/cx/{serial-number}/traceroute/async-operations/{task-id}` | `TracerouteCxResult` or null |

### Troubleshooting: Events

`Aruba::troubleshooting()->events()`

| Call | Returns |
|---|---|
| `Aruba::troubleshooting()->events()->eventExtraAttributes()` | a builder over `KeyValuePair` records (GET `/network-troubleshooting/v1/event-extra-attributes`) |
| `Aruba::troubleshooting()->events()->eventFilters($contextType, $contextIdentifier, $siteId)` | `EventFilters` or null (GET `/network-troubleshooting/v1/event-filters`) |
| `Aruba::troubleshooting()->events()->eventList()` | a builder over `Event` records (GET `/network-troubleshooting/v1/events`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\Events\EventExtraAttributesRequest` | GET | `/network-troubleshooting/v1/event-extra-attributes` | `Collection` of `KeyValuePair` |
| `Troubleshooting\Events\EventFiltersRequest` | GET | `/network-troubleshooting/v1/event-filters` | `EventFilters` or null |
| `Troubleshooting\Events\EventListRequest` | GET | `/network-troubleshooting/v1/events` | `Collection` of `Event` |

### Troubleshooting: Gateways

`Aruba::troubleshooting()->gateways($serialNumber)`

| Call | Returns |
|---|---|
| `Aruba::troubleshooting()->gateways($serialNumber)->disconnectAllClientsGw()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/disconnectClientAll`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->disconnectClientByMacGw()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/disconnectClientByMacAddress`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwGetArpTable()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/getArpTable`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwGetArpTableResult($taskId)` | `GetArpTableMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/getArpTable/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->haltGateway()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/halt`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwHttp()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/http`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwHttpResult($taskId)` | `HttpMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/http/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwHttps()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/https`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwHttpsResult($taskId)` | `HttpsMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/https/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwIperf()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/iperf`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwIperfResult($taskId)` | `IperfMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/iperf/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->listGwTasks()` | a builder over `TaskListEntry` records (GET `/network-troubleshooting/v1/gateways/{serial-number}/list-tasks`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwPing()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/ping`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwPingResult($taskId)` | `PingMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/ping/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->runGatewayPingSweep()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/pingSweep`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGatewayPingSweepResult($taskId)` | `GatewayPingSweepResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/pingSweep/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwPoeBounce()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/poeBounce`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwPoeBounceResult($taskId)` | `PoeBounceMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/poeBounce/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwPortBounce()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/portBounce`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwPortBounceResult($taskId)` | `PortBounceMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/portBounce/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->rebootGateway()` | `ActionInitiatedStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/reboot`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->listGwShowCommands()` | a builder over `ShowCommandsCategory` records (GET `/network-troubleshooting/v1/gateways/{serial-number}/show-commands`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->runGwShowCommands()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/showCommands`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwShowCommandsResult($taskId)` | `ShowCommandResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/showCommands/async-operations/{task-id}`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->initiateGwTraceroute()` | `AsyncOperationStatus` or null (POST `/network-troubleshooting/v1/gateways/{serial-number}/traceroute`) |
| `Aruba::troubleshooting()->gateways($serialNumber)->getGwTracerouteResult($taskId)` | `TracerouteMcResult` or null (GET `/network-troubleshooting/v1/gateways/{serial-number}/traceroute/async-operations/{task-id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\Gateways\DisconnectAllClientsGwRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/disconnectClientAll` | `ActionInitiatedStatus` or null |
| `Troubleshooting\Gateways\DisconnectClientByMacGwRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/disconnectClientByMacAddress` | `ActionInitiatedStatus` or null |
| `Troubleshooting\Gateways\InitiateGwGetArpTableRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/getArpTable` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwGetArpTableResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/getArpTable/async-operations/{task-id}` | `GetArpTableMcResult` or null |
| `Troubleshooting\Gateways\HaltGatewayRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/halt` | `ActionInitiatedStatus` or null |
| `Troubleshooting\Gateways\InitiateGwHttpRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/http` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwHttpResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/http/async-operations/{task-id}` | `HttpMcResult` or null |
| `Troubleshooting\Gateways\InitiateGwHttpsRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/https` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwHttpsResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/https/async-operations/{task-id}` | `HttpsMcResult` or null |
| `Troubleshooting\Gateways\InitiateGwIperfRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/iperf` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwIperfResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/iperf/async-operations/{task-id}` | `IperfMcResult` or null |
| `Troubleshooting\Gateways\ListGwTasksRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/list-tasks` | `Collection` of `TaskListEntry` |
| `Troubleshooting\Gateways\InitiateGwPingRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/ping` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwPingResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/ping/async-operations/{task-id}` | `PingMcResult` or null |
| `Troubleshooting\Gateways\RunGatewayPingSweepRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/pingSweep` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGatewayPingSweepResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/pingSweep/async-operations/{task-id}` | `GatewayPingSweepResult` or null |
| `Troubleshooting\Gateways\InitiateGwPoeBounceRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/poeBounce` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwPoeBounceResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/poeBounce/async-operations/{task-id}` | `PoeBounceMcResult` or null |
| `Troubleshooting\Gateways\InitiateGwPortBounceRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/portBounce` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwPortBounceResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/portBounce/async-operations/{task-id}` | `PortBounceMcResult` or null |
| `Troubleshooting\Gateways\RebootGatewayRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/reboot` | `ActionInitiatedStatus` or null |
| `Troubleshooting\Gateways\ListGwShowCommandsRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/show-commands` | `Collection` of `ShowCommandsCategory` |
| `Troubleshooting\Gateways\RunGwShowCommandsRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/showCommands` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwShowCommandsResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/showCommands/async-operations/{task-id}` | `ShowCommandResult` or null |
| `Troubleshooting\Gateways\InitiateGwTracerouteRequest` | POST | `/network-troubleshooting/v1/gateways/{serial-number}/traceroute` | `AsyncOperationStatus` or null |
| `Troubleshooting\Gateways\GetGwTracerouteResultRequest` | GET | `/network-troubleshooting/v1/gateways/{serial-number}/traceroute/async-operations/{task-id}` | `TracerouteMcResult` or null |

### Troubleshooting: Telemetry Data

`Aruba::troubleshooting()->telemetry()`

| Call | Returns |
|---|---|
| `Aruba::troubleshooting()->telemetry()->devices()` | a builder over `DeviceInfoRespItem` records (GET `/network-troubleshooting/v1/telemetry-devices`) |
| `Aruba::troubleshooting()->telemetry()->events()` | a builder over `EventRespItem` records (GET `/network-troubleshooting/v1/telemetry-events`) |
| `Aruba::troubleshooting()->telemetry()->metrics()` | a builder over `TelemetryDataRespItem` records (GET `/network-troubleshooting/v1/telemetry-metrics`) |
| `Aruba::troubleshooting()->telemetry()->subscribe()` | `SubscriptionResp` or null (POST `/network-troubleshooting/v1/telemetry-subscriptions`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\TelemetryData\ListTelemetryDevicesRequest` | GET | `/network-troubleshooting/v1/telemetry-devices` | `Collection` of `DeviceInfoRespItem` |
| `Troubleshooting\TelemetryData\ListTelemetryEventsRequest` | GET | `/network-troubleshooting/v1/telemetry-events` | `Collection` of `EventRespItem` |
| `Troubleshooting\TelemetryData\ListTelemetryMetricsRequest` | GET | `/network-troubleshooting/v1/telemetry-metrics` | `Collection` of `TelemetryDataRespItem` |
| `Troubleshooting\TelemetryData\CreateTelemetrySubscriptionsRequest` | POST | `/network-troubleshooting/v1/telemetry-subscriptions` | `SubscriptionResp` or null |

### Troubleshooting: Troubleshooting Operations

`Aruba::troubleshooting()->deviceOperations()`

| Call | Returns |
|---|---|
| `Aruba::troubleshooting()->deviceOperations()->listDeviceOperation()` | a builder over `OperationGetRespItem` records (GET `/network-troubleshooting/v1/device-operations`) |
| `Aruba::troubleshooting()->deviceOperations()->createDeviceOperation()` | `OperationPostResp` or null (POST `/network-troubleshooting/v1/device-operations`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\TroubleshootingOperations\ListDeviceOperationsRequest` | GET | `/network-troubleshooting/v1/device-operations` | `Collection` of `OperationGetRespItem` |
| `Troubleshooting\TroubleshootingOperations\CreateDeviceOperationsRequest` | POST | `/network-troubleshooting/v1/device-operations` | `OperationPostResp` or null |

### VLANs & Networks: Vlan Range

`Aruba::configuration()->vlanRanges()`

| Call | Returns |
|---|---|
| `Aruba::configuration()->vlanRanges()->createLayer2VlanRange()` | `Successful200` or null (POST `/network-config/v1alpha1/layer2-vlan-range`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\VlanRange\CreateLayer2VlanRangeRequest` | POST | `/network-config/v1alpha1/layer2-vlan-range` | `Successful200` or null |

### Configuration: profile types

`Aruba::configuration()->{type}()`

Every type below is a `ProfileResource`: a builder over `Profile` records with `get()`, `all()`, `first()`, `find($name)`, `store($name, $attributes)`, `update($name, $attributes)`, `replace($name, $attributes)`, `delete($name)`, `local($scopeId, $deviceFunction)` and `library()`, sending GET `/network-config/v1alpha1/{type}` and POST, GET, PUT, PATCH and DELETE `/network-config/v1alpha1/{type}/{name}`.

| Call | Docs group | Type |
|---|---|---|
| `Aruba::configuration()->aaaProfile()` | Security: Aaa Profile | `aaa-profile` |
| `Aruba::configuration()->advancedIntelligentForwarding()` | Routing & Overlays: Advanced Intelligent Forwarding | `advanced-intelligent-forwarding` |
| `Aruba::configuration()->airgroupPolicies()` | Services: Airgroup Policy | `airgroup-policies` |
| `Aruba::configuration()->airgroupServers()` | Services: Airgroup Servers | `airgroup-servers` |
| `Aruba::configuration()->airgroupServiceDefinitions()` | Services: Airgroup Service Definition | `airgroup-service-definitions` |
| `Aruba::configuration()->alg()` | Wireless: Alg | `alg` |
| `Aruba::configuration()->aliases()` | Named Object: Alias | `aliases` |
| `Aruba::configuration()->apPortProfiles()` | Interfaces: Ap Port Profile | `ap-port-profiles` |
| `Aruba::configuration()->apSystem()` | System: Ap System | `ap-system` |
| `Aruba::configuration()->apUplinks()` | Interfaces: Ap Uplink | `ap-uplinks` |
| `Aruba::configuration()->appBandwidthContracts()` | Application Experience: App Bandwidth Contract | `app-bandwidth-contracts` |
| `Aruba::configuration()->arc()` | Application Experience: App Recog Control | `arc` |
| `Aruba::configuration()->aspathLists()` | Routing & Overlays: Aspath List | `aspath-lists` |
| `Aruba::configuration()->authProfiles()` | Central NAC: Cda Auth Profile | `auth-profiles` |
| `Aruba::configuration()->authServerGlobalConfig()` | Security: Auth Server Global | `auth-server-global-config` |
| `Aruba::configuration()->authServers()` | Security: Auth Server | `auth-servers` |
| `Aruba::configuration()->authSurvivability()` | Security: Auth Survivability | `auth-survivability` |
| `Aruba::configuration()->authzPolicies()` | Central NAC: Cda Authz Policy | `authz-policies` |
| `Aruba::configuration()->bcnRptReqProfiles()` | Security: 802dot11k Bcn Rpt Req | `bcn-rpt-req-profiles` |
| `Aruba::configuration()->bfd()` | Routing & Overlays: Bfd | `bfd` |
| `Aruba::configuration()->bgp()` | Routing & Overlays: Bgp | `bgp` |
| `Aruba::configuration()->captivePortal()` | Security: Aaa Captive Portal | `captive-portal` |
| `Aruba::configuration()->cdp()` | Interfaces: Cdp | `cdp` |
| `Aruba::configuration()->certificateRcp()` | Security: Certificate Rcp | `certificate-rcp` |
| `Aruba::configuration()->certificateStore()` | Security: Certificate Store | `certificate-store` |
| `Aruba::configuration()->certificateUsage()` | Security: Ap Certificate Usage | `certificate-usage` |
| `Aruba::configuration()->certificates()` | Security: Certificate | `certificates` |
| `Aruba::configuration()->clientInsight()` | Telemetry: Client Insight | `client-insight` |
| `Aruba::configuration()->clientIptracker()` | Telemetry: Client Iptracker | `client-iptracker` |
| `Aruba::configuration()->clientIptrackerInterface()` | Telemetry: Client Iptracker Interface | `client-iptracker-interface` |
| `Aruba::configuration()->communityLists()` | Routing & Overlays: Community List | `community-lists` |
| `Aruba::configuration()->configCheckpoint()` | Config Management: Config Checkpoint | `config-checkpoint` |
| `Aruba::configuration()->containerNetworks()` | System: Container Network | `container-networks` |
| `Aruba::configuration()->containers()` | System: Container | `containers` |
| `Aruba::configuration()->copp()` | Security: Copp | `copp` |
| `Aruba::configuration()->countermon()` | System: Countermon | `countermon` |
| `Aruba::configuration()->customMessages()` | Central NAC: Cda Portal Custom Message | `custom-messages` |
| `Aruba::configuration()->dap()` | Application Experience: Dap | `dap` |
| `Aruba::configuration()->dapApplication()` | Application Experience: Dap Application | `dap-application` |
| `Aruba::configuration()->dapSla()` | Application Experience: Dap Sla | `dap-sla` |
| `Aruba::configuration()->dbObserver()` | System: Db Observer | `db-observer` |
| `Aruba::configuration()->ddns()` | System: Ddns | `ddns` |
| `Aruba::configuration()->defaultCustomMessages()` | Central NAC: Cda Portal Default Custom Message | `default-custom-messages` |
| `Aruba::configuration()->deviceCertificates()` | Security: Device Certificate | `device-certificates` |
| `Aruba::configuration()->deviceProfile()` | Interfaces: Device Profile | `device-profile` |
| `Aruba::configuration()->devicefingerprinting()` | Telemetry: Devicefingerprinting | `devicefingerprinting` |
| `Aruba::configuration()->devicefingerprintingInterface()` | Telemetry: Devicefingerprinting Interface | `devicefingerprinting-interface` |
| `Aruba::configuration()->devicefingerprintingProfile()` | Telemetry: Devicefingerprinting Profile | `devicefingerprinting-profile` |
| `Aruba::configuration()->dhcpClient()` | Interfaces: Dhcp Client | `dhcp-client` |
| `Aruba::configuration()->dhcpPool()` | Network Services: Dhcp Pool | `dhcp-pool` |
| `Aruba::configuration()->dhcpRelay()` | Network Services: Dhcp Relay | `dhcp-relay` |
| `Aruba::configuration()->dhcpServer()` | Network Services: Dhcp Server | `dhcp-server` |
| `Aruba::configuration()->dhcpSnooping()` | Network Services: Dhcp Snooping | `dhcp-snooping` |
| `Aruba::configuration()->dhcpSnoopingInterface()` | Network Services: Dhcp Snooping Interface | `dhcp-snooping-interface` |
| `Aruba::configuration()->dns()` | System: Dns | `dns` |
| `Aruba::configuration()->dot11kProfiles()` | Security: 802dot11k | `dot11k-profiles` |
| `Aruba::configuration()->dot1xauth()` | Security: Aaa Dot1xauth | `dot1xauth` |
| `Aruba::configuration()->dot1xsupp()` | Security: Aaa Dot1xsupp | `dot1xsupp` |
| `Aruba::configuration()->dsm()` | Miscellaneous: Dsm | `dsm` |
| `Aruba::configuration()->dumpServer()` | System: Dump Server | `dump-server` |
| `Aruba::configuration()->dynamicArpInspectionInterface()` | Network Services: Dynamic Arp Inspection Interface | `dynamic-arp-inspection-interface` |
| `Aruba::configuration()->erps()` | VLANs & Networks: Erps | `erps` |
| `Aruba::configuration()->estProfiles()` | Security: Est | `est-profiles` |
| `Aruba::configuration()->evpn()` | Routing & Overlays: Evpn | `evpn` |
| `Aruba::configuration()->externalStorage()` | Network Services: External Storage | `external-storage` |
| `Aruba::configuration()->faultMonitor()` | Interfaces: Fault Monitor | `fault-monitor` |
| `Aruba::configuration()->firewall()` | Security: Firewall | `firewall` |
| `Aruba::configuration()->flowTracking()` | Telemetry: Flow Tracking | `flow-tracking` |
| `Aruba::configuration()->gatewayClusters()` | High Availability: Gw Cluster | `gateway-clusters` |
| `Aruba::configuration()->gwCertificateUsage()` | Security: Gw Certificate Usage | `gw-certificate-usage` |
| `Aruba::configuration()->gwClusterIntentConfig()` | Gateway Clustering Orchestration: Gw Cluster Intent | `gw-cluster-intent-config` |
| `Aruba::configuration()->gwPortProfiles()` | Interfaces: Gw Port Profile | `gw-port-profiles` |
| `Aruba::configuration()->gwSystem()` | System: Gw System | `gw-system` |
| `Aruba::configuration()->hardwareModules()` | System: Hardware Module Profile | `hardware-modules` |
| `Aruba::configuration()->httpProxyServers()` | System: Http Proxy | `http-proxy-servers` |
| `Aruba::configuration()->identityStores()` | Central NAC: Cda Identity Store | `identity-stores` |
| `Aruba::configuration()->ids()` | Wireless: Ids | `ids` |
| `Aruba::configuration()->interfaceProfiles()` | Interfaces: Interface Profile | `interface-profiles` |
| `Aruba::configuration()->internalUser()` | Security: Internal User | `internal-user` |
| `Aruba::configuration()->ipRouting()` | Routing & Overlays: Ip Routing | `ip-routing` |
| `Aruba::configuration()->ipSourceInterfaces()` | System: Ip Source Interface | `ip-source-interfaces` |
| `Aruba::configuration()->ipSourceLockdown()` | Network Services: Ip Lockdown | `ip-source-lockdown` |
| `Aruba::configuration()->ipSourceLockdownInterface()` | Network Services: Ip Lockdown Interface | `ip-source-lockdown-interface` |
| `Aruba::configuration()->ipfixFlowExporter()` | Telemetry: Ipfix Flow Exporter | `ipfix-flow-exporter` |
| `Aruba::configuration()->ipm()` | System: Ipm | `ipm` |
| `Aruba::configuration()->ipsla()` | Network Services: Ipsla | `ipsla` |
| `Aruba::configuration()->jobScheduler()` | System: Job Scheduler | `job-scheduler` |
| `Aruba::configuration()->keychains()` | Security: Keychain | `keychains` |
| `Aruba::configuration()->l3Route()` | Routing & Overlays: L3 Route | `l3-route` |
| `Aruba::configuration()->layer2Vlan()` | VLANs & Networks: Vlan | `layer2-vlan` |
| `Aruba::configuration()->lldp()` | Interfaces: Lldp | `lldp` |
| `Aruba::configuration()->localManagement()` | System: Local Management | `local-management` |
| `Aruba::configuration()->location()` | Services: Location | `location` |
| `Aruba::configuration()->logging()` | System: Logging | `logging` |
| `Aruba::configuration()->loopProtect()` | VLANs & Networks: Loop Protect | `loop-protect` |
| `Aruba::configuration()->loopbackInterfaces()` | Interfaces: Interface Loopback | `loopback-interfaces` |
| `Aruba::configuration()->macLockout()` | Security: Mac Lockout | `mac-lockout` |
| `Aruba::configuration()->macauth()` | Security: Aaa Macauth | `macauth` |
| `Aruba::configuration()->macsec()` | Security: Macsec | `macsec` |
| `Aruba::configuration()->managementServer()` | System: Feature Pack | `management-server` |
| `Aruba::configuration()->managementUserGroups()` | System: Management User Group | `management-user-groups` |
| `Aruba::configuration()->managementUsers()` | System: Management User | `management-users` |
| `Aruba::configuration()->mesh()` | Wireless: Mesh | `mesh` |
| `Aruba::configuration()->messageProviders()` | Central NAC: Cda Message Provider | `message-providers` |
| `Aruba::configuration()->mgmdGlobal()` | Network Services: Mgmd | `mgmd-global` |
| `Aruba::configuration()->mgmtInterfaces()` | Interfaces: Interface Management | `mgmt-interfaces` |
| `Aruba::configuration()->mirrorEndpoint()` | Interfaces: Mirror Endpoint | `mirror-endpoint` |
| `Aruba::configuration()->mirrors()` | Interfaces: Mirror | `mirrors` |
| `Aruba::configuration()->mka()` | Security: Mka | `mka` |
| `Aruba::configuration()->mpls()` | Routing & Overlays: Mpls | `mpls` |
| `Aruba::configuration()->mpskLocal()` | Wireless: Mpsk Local | `mpsk-local` |
| `Aruba::configuration()->msdp()` | Routing & Overlays: Msdp | `msdp` |
| `Aruba::configuration()->multicastDns()` | Network Services: Multicast Dns | `multicast-dns` |
| `Aruba::configuration()->multicastGlobal()` | Routing & Overlays: Multicast | `multicast-global` |
| `Aruba::configuration()->multicastStaticRoute()` | Routing & Overlays: Multicast Static Route | `multicast-static-route` |
| `Aruba::configuration()->mvrp()` | VLANs & Networks: Mvrp | `mvrp` |
| `Aruba::configuration()->naeAgents()` | System: Nae Agent | `nae-agents` |
| `Aruba::configuration()->naeLite()` | Network Services: Nae Lite | `nae-lite` |
| `Aruba::configuration()->naeScripts()` | System: Nae Script | `nae-scripts` |
| `Aruba::configuration()->namedConditions()` | Named Object: Named Condition | `named-conditions` |
| `Aruba::configuration()->namedVlan()` | VLANs & Networks: Named Vlan | `named-vlan` |
| `Aruba::configuration()->ndSnooping()` | Network Services: Nd Snooping | `nd-snooping` |
| `Aruba::configuration()->ndSnoopingInterface()` | Network Services: Nd Snooping Interface | `nd-snooping-interface` |
| `Aruba::configuration()->netGroups()` | Security: Net Group | `net-groups` |
| `Aruba::configuration()->netServices()` | Named Object: Net Service | `net-services` |
| `Aruba::configuration()->nexthopGroups()` | Routing & Overlays: Nexthop Group | `nexthop-groups` |
| `Aruba::configuration()->ntp()` | System: Ntp | `ntp` |
| `Aruba::configuration()->objectGroups()` | Roles & Policy: Object Group | `object-groups` |
| `Aruba::configuration()->ospfv2()` | Routing & Overlays: Ospfv2 | `ospfv2` |
| `Aruba::configuration()->ospfv3()` | Routing & Overlays: Ospfv3 | `ospfv3` |
| `Aruba::configuration()->overlayWlan()` | Miscellaneous: Overlay Wlan | `overlay-wlan` |
| `Aruba::configuration()->overrides()` | Central NAC: Cda Portal Overrides Profile | `overrides` |
| `Aruba::configuration()->packetCapture()` | System: Packet Capture | `packet-capture` |
| `Aruba::configuration()->passpoint()` | Wireless: Passpoint | `passpoint` |
| `Aruba::configuration()->passpointIdentity()` | Security: Passpoint Identity | `passpoint-identity` |
| `Aruba::configuration()->pimRouter()` | Routing & Overlays: Pim | `pim-router` |
| `Aruba::configuration()->policies()` | Roles & Policy: Policy | `policies` |
| `Aruba::configuration()->portSecurity()` | Security: Port Security | `port-security` |
| `Aruba::configuration()->portals()` | Central NAC: Cda Portal Profile | `portals` |
| `Aruba::configuration()->portchannels()` | Interfaces: Interface Portchannel | `portchannels` |
| `Aruba::configuration()->prefixLists()` | Routing & Overlays: Prefix List | `prefix-lists` |
| `Aruba::configuration()->psm()` | Extensions: Psm | `psm` |
| `Aruba::configuration()->ptp()` | Network Services: Ptp | `ptp` |
| `Aruba::configuration()->qosGlobal()` | Network Services: Qos Global | `qos-global` |
| `Aruba::configuration()->qosQueues()` | Network Services: Qos Queue | `qos-queues` |
| `Aruba::configuration()->qosSchedules()` | Network Services: Qos Schedule | `qos-schedules` |
| `Aruba::configuration()->qosThresholds()` | Network Services: Qos Threshold Profile | `qos-thresholds` |
| `Aruba::configuration()->radios()` | Wireless: Radio | `radios` |
| `Aruba::configuration()->radiusModifiers()` | Security: Radius Modifiers | `radius-modifiers` |
| `Aruba::configuration()->remoteManagement()` | System: Remote Management | `remote-management` |
| `Aruba::configuration()->rip()` | Routing & Overlays: Rip | `rip` |
| `Aruba::configuration()->rmonAlarms()` | System: Rmon Alarm | `rmon-alarms` |
| `Aruba::configuration()->roleAcls()` | Roles & Policy: Role Acl | `role-acls` |
| `Aruba::configuration()->roleGpids()` | Roles & Policy: Role Gpid | `role-gpids` |
| `Aruba::configuration()->roles()` | Roles & Policy: Role | `roles` |
| `Aruba::configuration()->routeMaps()` | Routing & Overlays: Routemap | `route-maps` |
| `Aruba::configuration()->rrmIeProfiles()` | Security: 802dot11k Rrm Ie | `rrm-ie-profiles` |
| `Aruba::configuration()->serverGroups()` | Security: Auth Server Group | `server-groups` |
| `Aruba::configuration()->sflow()` | Interfaces: Sflow | `sflow` |
| `Aruba::configuration()->skins()` | Central NAC: Cda Portal Skin Profile | `skins` |
| `Aruba::configuration()->smartlink()` | VLANs & Networks: Smartlink | `smartlink` |
| `Aruba::configuration()->snmp()` | System: Snmp | `snmp` |
| `Aruba::configuration()->snmpTrap()` | System: Snmp Trap | `snmp-trap` |
| `Aruba::configuration()->sourceIpBindings()` | Network Services: Ip Binding | `source-ip-bindings` |
| `Aruba::configuration()->speedTest()` | System: Speed Test | `speed-test` |
| `Aruba::configuration()->splunkInstances()` | Extensions: Extension Splunk | `splunk-instances` |
| `Aruba::configuration()->stacks()` | High Availability: Switch Stack | `stacks` |
| `Aruba::configuration()->statefulDot1xProfiles()` | Security: Aaa Stateful Dot1x | `stateful-dot1x-profiles` |
| `Aruba::configuration()->staticMacs()` | Interfaces: Static Mac | `static-macs` |
| `Aruba::configuration()->staticNeighbor()` | VLANs & Networks: Static Neighbor | `static-neighbor` |
| `Aruba::configuration()->staticRoute()` | Routing & Overlays: Static Route | `static-route` |
| `Aruba::configuration()->staticTag()` | Central NAC: Cda Static Tag | `static-tag` |
| `Aruba::configuration()->stp()` | VLANs & Networks: Stp | `stp` |
| `Aruba::configuration()->stpGw()` | VLANs & Networks: Gw Stp | `stp-gw` |
| `Aruba::configuration()->subInterfaces()` | Interfaces: Interface Subinterface | `sub-interfaces` |
| `Aruba::configuration()->swPortProfiles()` | Interfaces: Sw Port Profile | `sw-port-profiles` |
| `Aruba::configuration()->switchChassis()` | System: Switch Chassis | `switch-chassis` |
| `Aruba::configuration()->switchProfiles()` | System: Switch Profiles | `switch-profiles` |
| `Aruba::configuration()->switchSystem()` | System: Switch System | `switch-system` |
| `Aruba::configuration()->sysmon()` | System: Sysmon | `sysmon` |
| `Aruba::configuration()->systemInfo()` | System: System Info | `system-info` |
| `Aruba::configuration()->telemetry()` | System: Telemetry | `telemetry` |
| `Aruba::configuration()->timeRanges()` | System: Timerange | `time-ranges` |
| `Aruba::configuration()->trackingObject()` | Routing & Overlays: Track Object | `tracking-object` |
| `Aruba::configuration()->trafficInsight()` | Telemetry: Traffic Insight | `traffic-insight` |
| `Aruba::configuration()->tunnel()` | Tunnels: Interface Tunnel | `tunnel` |
| `Aruba::configuration()->tunnelGroups()` | Tunnels: Interface Tunnel Group | `tunnel-groups` |
| `Aruba::configuration()->ubt()` | Security: Ubt | `ubt` |
| `Aruba::configuration()->udpBroadcastForwarders()` | Network Services: Udp Broadcast Forwarder | `udp-broadcast-forwarders` |
| `Aruba::configuration()->ufd()` | Interfaces: Ufd | `ufd` |
| `Aruba::configuration()->usb()` | IoT: Usb | `usb` |
| `Aruba::configuration()->vlanInterfaces()` | Interfaces: Interface Vlan | `vlan-interfaces` |
| `Aruba::configuration()->vrfs()` | Routing & Overlays: Vrf | `vrfs` |
| `Aruba::configuration()->vrrp()` | VLANs & Networks: Vrrp Interface | `vrrp` |
| `Aruba::configuration()->vrrpGlobal()` | VLANs & Networks: Vrrp | `vrrp-global` |
| `Aruba::configuration()->vsfTemplates()` | High Availability: Vsf Template | `vsf-templates` |
| `Aruba::configuration()->vsphereInstances()` | Extensions: Extension Vsphere | `vsphere-instances` |
| `Aruba::configuration()->vsxConfig()` | Miscellaneous: Vsx Pair | `vsx-config` |
| `Aruba::configuration()->vsxProfiles()` | High Availability: Vsx | `vsx-profiles` |
| `Aruba::configuration()->wlanSsids()` | Wireless: Wlan | `wlan-ssids` |
| `Aruba::configuration()->profile($profileType, $recordKey)` | any | as given |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Config\Profile\GetProfilesRequest` | GET | `/network-config/v1alpha1/{profile-type}` | `Collection` of `Profile` |
| `Config\Profile\GetProfileRequest` | GET | `/network-config/v1alpha1/{profile-type}/{name}` | `Profile` or null |
| `Config\Profile\CreateProfileRequest` | POST | `/network-config/v1alpha1/{profile-type}/{name}` | array or null |
| `Config\Profile\ReplaceProfileRequest` | PUT | `/network-config/v1alpha1/{profile-type}/{name}` | array or null |
| `Config\Profile\UpdateProfileRequest` | PATCH | `/network-config/v1alpha1/{profile-type}/{name}` | array or null |
| `Config\Profile\DeleteProfileRequest` | DELETE | `/network-config/v1alpha1/{profile-type}/{name}` | array or null |

## Classic Central

### ACP Audit Trail: audit

`Aruba::classic()->auditLogs()->platform()`

| Call | Returns |
|---|---|
| `Aruba::classic()->auditLogs()->platform()` | a builder over `AuditLog` records (GET `/platform/auditlogs/v1/logs`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AuditLogs\Audit\GetAuditLogsRequest` | GET | `/platform/auditlogs/v1/logs` | `Collection` of `AuditLog` |
| `AuditLogs\Audit\GetAuditLogDetailsRequest` | GET | `/platform/auditlogs/v1/logs/{id}` | array or null |

### ACP OFC Api Handler: Flowhandler

`Aruba::classic()->syslog()`

| Call | Returns |
|---|---|
| `Aruba::classic()->syslog()->enableWildcardFlow()` | the response as an array, or null (POST `/ofcapi/v1/syslog/flow`) |
| `Aruba::classic()->syslog()->checkStatus($serialId)` | `OFCFlowStatus` or null (GET `/ofcapi/v1/syslog/flow/status/{serial_id}`) |
| `Aruba::classic()->syslog()->checkStatusList()` | `FlowStatusList` or null (POST `/ofcapi/v1/syslog/flows/status/device_list`) |
| `Aruba::classic()->syslog()->enableWildcardFlowList($enable)` | `Flowlist` or null (POST `/ofcapi/v1/syslog/flows/{enable}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Syslog\Flowhandler\EnableWildcardFlowRequest` | POST | `/ofcapi/v1/syslog/flow` | array or null |
| `Syslog\Flowhandler\CheckStatusRequest` | GET | `/ofcapi/v1/syslog/flow/status/{serial_id}` | `OFCFlowStatus` or null |
| `Syslog\Flowhandler\CheckStatusListRequest` | POST | `/ofcapi/v1/syslog/flows/status/device_list` | `FlowStatusList` or null |
| `Syslog\Flowhandler\EnableWildcardFlowListRequest` | POST | `/ofcapi/v1/syslog/flows/{enable}` | `Flowlist` or null |

### AIOps: AI Insight Details

`Aruba::classic()->aiOps()->insightDetails()`

| Call | Returns |
|---|---|
| `Aruba::classic()->aiOps()->insightDetails()->getAiopsV2InsightsApApSerialIdInsightIdExport($apSerial, $insightId, $from, $to)` | `InsightExport` or null (GET `/aiops/v2/insights/ap/{ap_serial}/id/{insight_id}/export`) |
| `Aruba::classic()->aiOps()->insightDetails()->getAiopsV2InsightsClientStaMacIdInsightIdExport($staMac, $insightId, $from, $to)` | `InsightExport` or null (GET `/aiops/v2/insights/client/{sta_mac}/id/{insight_id}/export`) |
| `Aruba::classic()->aiOps()->insightDetails()->getAiopsV2InsightsGatewayGwSerialIdInsightIdExport($gwSerial, $insightId, $from, $to)` | `InsightExport` or null (GET `/aiops/v2/insights/gateway/{gw_serial}/id/{insight_id}/export`) |
| `Aruba::classic()->aiOps()->insightDetails()->getAiopsV2InsightsGlobalIdInsightIdExport($insightId, $from, $to)` | `InsightExport` or null (GET `/aiops/v2/insights/global/id/{insight_id}/export`) |
| `Aruba::classic()->aiOps()->insightDetails()->getAiopsV2InsightsSiteSiteIdIdInsightIdExport($siteId, $insightId, $from, $to)` | `InsightExport` or null (GET `/aiops/v2/insights/site/{site_id}/id/{insight_id}/export`) |
| `Aruba::classic()->aiOps()->insightDetails()->getAiopsV2InsightsSwitchSwSerialIdInsightIdExport($swSerial, $insightId, $from, $to)` | `InsightExport` or null (GET `/aiops/v2/insights/switch/{sw_serial}/id/{insight_id}/export`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AiOps\AIInsightDetails\GetAiopsV2InsightsApApSerialIdInsightIdExportRequest` | GET | `/aiops/v2/insights/ap/{ap_serial}/id/{insight_id}/export` | `InsightExport` or null |
| `AiOps\AIInsightDetails\GetAiopsV2InsightsClientStaMacIdInsightIdExportRequest` | GET | `/aiops/v2/insights/client/{sta_mac}/id/{insight_id}/export` | `InsightExport` or null |
| `AiOps\AIInsightDetails\GetAiopsV2InsightsGatewayGwSerialIdInsightIdExportRequest` | GET | `/aiops/v2/insights/gateway/{gw_serial}/id/{insight_id}/export` | `InsightExport` or null |
| `AiOps\AIInsightDetails\GetAiopsV2InsightsGlobalIdInsightIdExportRequest` | GET | `/aiops/v2/insights/global/id/{insight_id}/export` | `InsightExport` or null |
| `AiOps\AIInsightDetails\GetAiopsV2InsightsSiteSiteIdIdInsightIdExportRequest` | GET | `/aiops/v2/insights/site/{site_id}/id/{insight_id}/export` | `InsightExport` or null |
| `AiOps\AIInsightDetails\GetAiopsV2InsightsSwitchSwSerialIdInsightIdExportRequest` | GET | `/aiops/v2/insights/switch/{sw_serial}/id/{insight_id}/export` | `InsightExport` or null |

### AIOps: AI Insights List

`Aruba::classic()->aiOps()->insights()`

| Call | Returns |
|---|---|
| `Aruba::classic()->aiOps()->insights()` | a builder over `InsightsListItem` records (GET `/aiops/v2/insights/global/list`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->aiOps()->insights()->getAiopsV2InsightsApApSerialList($apSerial)` | a builder over `InsightsListItem` records (GET `/aiops/v2/insights/ap/{ap_serial}/list`) |
| `Aruba::classic()->aiOps()->insights()->getAiopsV2InsightsClientStaMacList($staMac)` | a builder over `InsightsListItem` records (GET `/aiops/v2/insights/client/{sta_mac}/list`) |
| `Aruba::classic()->aiOps()->insights()->getAiopsV2InsightsGatewayGwSerialList($gwSerial)` | a builder over `InsightsListItem` records (GET `/aiops/v2/insights/gateway/{gw_serial}/list`) |
| `Aruba::classic()->aiOps()->insights()->getAiopsV2InsightsSiteSiteIdList($siteId)` | a builder over `InsightsListItem` records (GET `/aiops/v2/insights/site/{site_id}/list`) |
| `Aruba::classic()->aiOps()->insights()->getAiopsV2InsightsSwitchSwSerialList($swSerial)` | a builder over `InsightsListItem` records (GET `/aiops/v2/insights/switch/{sw_serial}/list`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AiOps\AIInsightsList\GetAiopsV2InsightsApApSerialListRequest` | GET | `/aiops/v2/insights/ap/{ap_serial}/list` | `Collection` of `InsightsListItem` |
| `AiOps\AIInsightsList\GetAiopsV2InsightsClientStaMacListRequest` | GET | `/aiops/v2/insights/client/{sta_mac}/list` | `Collection` of `InsightsListItem` |
| `AiOps\AIInsightsList\GetAiopsV2InsightsGatewayGwSerialListRequest` | GET | `/aiops/v2/insights/gateway/{gw_serial}/list` | `Collection` of `InsightsListItem` |
| `AiOps\AIInsightsList\GetAiopsV2InsightsGlobalListRequest` | GET | `/aiops/v2/insights/global/list` | `Collection` of `InsightsListItem` |
| `AiOps\AIInsightsList\GetAiopsV2InsightsSiteSiteIdListRequest` | GET | `/aiops/v2/insights/site/{site_id}/list` | `Collection` of `InsightsListItem` |
| `AiOps\AIInsightsList\GetAiopsV2InsightsSwitchSwSerialListRequest` | GET | `/aiops/v2/insights/switch/{sw_serial}/list` | `Collection` of `InsightsListItem` |

### AIOps: Wi-Fi Connectivity Dashboard

`Aruba::classic()->aiOps()->connectivity()`

| Call | Returns |
|---|---|
| `Aruba::classic()->aiOps()->connectivity()->getAiopsV1ConnectivityGlobalStageStageExport($stage, $from, $to)` | `ConnectivityExport` or null (GET `/aiops/v1/connectivity/global/stage/{stage}/export`) |
| `Aruba::classic()->aiOps()->connectivity()->getAiopsV1ConnectivityGroupGroupStageStageExport($group, $stage, $from, $to)` | `ConnectivityExport` or null (GET `/aiops/v1/connectivity/group/{group}/stage/{stage}/export`) |
| `Aruba::classic()->aiOps()->connectivity()->getAiopsV1ConnectivitySiteSiteIdStageStageExport($siteId, $stage, $from, $to)` | `ConnectivityExport` or null (GET `/aiops/v1/connectivity/site/{site_id}/stage/{stage}/export`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivityGlobalStageStageExportRequest` | GET | `/aiops/v1/connectivity/global/stage/{stage}/export` | `ConnectivityExport` or null |
| `AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivityGroupGroupStageStageExportRequest` | GET | `/aiops/v1/connectivity/group/{group}/stage/{stage}/export` | `ConnectivityExport` or null |
| `AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivitySiteSiteIdStageStageExportRequest` | GET | `/aiops/v1/connectivity/site/{site_id}/stage/{stage}/export` | `ConnectivityExport` or null |

### AirMatch: AP

`Aruba::classic()->airMatch()->accessPoints()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->accessPoints()->apUpgradeSamplingGetReq()` | a builder over `Sampling` records (GET `/ap_nbr_graph/v1/Ap/LiveUpgrade/Sampling`) |
| `Aruba::classic()->airMatch()->accessPoints()->apNeighborsGetReq($apserialnum)` | a builder over records as arrays (GET `/ap_nbr_graph/v1/Ap/NeighborList/{apserialnum}`) |
| `Aruba::classic()->airMatch()->accessPoints()->getApInfoBySerial($apSerial)` | `FeasApInfo` or null (GET `/feasibility/v1/ap_info/{ap_serial}`) |
| `Aruba::classic()->airMatch()->accessPoints()->getAllDeviceConfig()` | a builder over `DeviceCfg` records (GET `/feasibility/v1/device_config`) |
| `Aruba::classic()->airMatch()->accessPoints()->getDeviceConfig($apSerial)` | `DeviceCfg` or null (GET `/feasibility/v1/device_config/{ap_serial}`) |
| `Aruba::classic()->airMatch()->accessPoints()->setDeviceConfig($apSerial)` | the response as an array, or null (PUT `/feasibility/v1/device_config/{ap_serial}`) |
| `Aruba::classic()->airMatch()->accessPoints()->getDeviceConfigGet($apSerial)` | `DeviceCfg` or null (GET `/receiver/v1/device_config/{ap_serial}`) |
| `Aruba::classic()->airMatch()->accessPoints()->setDeviceConfigPut($apSerial)` | the response as an array, or null (PUT `/receiver/v1/device_config_set/{ap_serial}`) |
| `Aruba::classic()->airMatch()->accessPoints()->getAllDeviceConfigGet()` | a builder over `DeviceCfg` records (GET `/receiver/v1/devices_config_all`) |
| `Aruba::classic()->airMatch()->accessPoints()->getAdvancedStatAp()` | `AdvancedApStats` or null (GET `/telemetry/v1/adv_ap_stats`) |
| `Aruba::classic()->airMatch()->accessPoints()->getApInfoByEthMac($apEthMac)` | `ApInfo` or null (GET `/telemetry/v1/ap_info/{ap_eth_mac}`) |
| `Aruba::classic()->airMatch()->accessPoints()->getAllApInfo()` | a builder over `ApInfo` records (GET `/telemetry/v1/ap_info_all`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\AP\ApUpgradeSamplingGetReqRequest` | GET | `/ap_nbr_graph/v1/Ap/LiveUpgrade/Sampling` | `Collection` of `Sampling` |
| `AirMatch\AP\ApNeighborsGetReqRequest` | GET | `/ap_nbr_graph/v1/Ap/NeighborList/{apserialnum}` | `Collection` of arrays |
| `AirMatch\AP\GetApInfoBySerialRequest` | GET | `/feasibility/v1/ap_info/{ap_serial}` | `FeasApInfo` or null |
| `AirMatch\AP\GetAllDeviceConfigRequest` | GET | `/feasibility/v1/device_config` | `Collection` of `DeviceCfg` |
| `AirMatch\AP\GetDeviceConfigRequest` | GET | `/feasibility/v1/device_config/{ap_serial}` | `DeviceCfg` or null |
| `AirMatch\AP\SetDeviceConfigRequest` | PUT | `/feasibility/v1/device_config/{ap_serial}` | array or null |
| `AirMatch\AP\GETGetDeviceConfigRequest` | GET | `/receiver/v1/device_config/{ap_serial}` | `DeviceCfg` or null |
| `AirMatch\AP\PUTSetDeviceConfigRequest` | PUT | `/receiver/v1/device_config_set/{ap_serial}` | array or null |
| `AirMatch\AP\GETGetAllDeviceConfigRequest` | GET | `/receiver/v1/devices_config_all` | `Collection` of `DeviceCfg` |
| `AirMatch\AP\GetAdvancedStatApRequest` | GET | `/telemetry/v1/adv_ap_stats` | `AdvancedApStats` or null |
| `AirMatch\AP\GetApInfoByEthMacRequest` | GET | `/telemetry/v1/ap_info/{ap_eth_mac}` | `ApInfo` or null |
| `AirMatch\AP\GetAllApInfoRequest` | GET | `/telemetry/v1/ap_info_all` | `Collection` of `ApInfo` |

### AirMatch: Deployer

`Aruba::classic()->airMatch()->deployer()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->deployer()->getPendingDeployments()` | the response as an array, or null (GET `/deployer/v1/pending_deployments`) |
| `Aruba::classic()->airMatch()->deployer()->testConfig($disallowActionMsg)` | the response as an array, or null (POST `/deployer/v1/test_config_update`) |
| `Aruba::classic()->airMatch()->deployer()->trigerComputationComplete()` | the response as an array, or null (POST `/deployer/v1/trigger_computation_complete`) |
| `Aruba::classic()->airMatch()->deployer()->testActionMsg($mac, $opmode, $cbw, $chan, $eirp)` | the response as an array, or null (POST `/deployer/v1/trigger_test_action_msg`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\Deployer\GetPendingDeploymentsRequest` | GET | `/deployer/v1/pending_deployments` | array or null |
| `AirMatch\Deployer\TestConfigRequest` | POST | `/deployer/v1/test_config_update` | array or null |
| `AirMatch\Deployer\TrigerComputationCompleteRequest` | POST | `/deployer/v1/trigger_computation_complete` | array or null |
| `AirMatch\Deployer\TestActionMsgRequest` | POST | `/deployer/v1/trigger_test_action_msg` | array or null |

### AirMatch: Miscellaneous

`Aruba::classic()->airMatch()->service()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->service()` | a builder over `ServiceCfg` records (GET `/receiver/v1/service_config_all`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->airMatch()->service()->getServiceConfig()` | `ServiceCfg` or null (GET `/receiver/v1/service_config`) |
| `Aruba::classic()->airMatch()->service()->getAdvStateDeployment()` | `AdvancedDeploymentStats` or null (GET `/solver/v1/advanced_deployment_stats`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\Miscellaneous\GetServiceConfigRequest` | GET | `/receiver/v1/service_config` | `ServiceCfg` or null |
| `AirMatch\Miscellaneous\GetAllServiceConfigRequest` | GET | `/receiver/v1/service_config_all` | `Collection` of `ServiceCfg` |
| `AirMatch\Miscellaneous\GetAdvStateDeploymentRequest` | GET | `/solver/v1/advanced_deployment_stats` | `AdvancedDeploymentStats` or null |

### AirMatch: RF domain

`Aruba::classic()->airMatch()->rfDomains()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->rfDomains()` | a builder over `RfDomain` records (GET `/ap_nbr_graph/v1/partition`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->airMatch()->rfDomains()->partitionPostReq()` | the response as an array, or null (POST `/ap_nbr_graph/v1/partition`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\RFDomain\PartitionGetReqRequest` | GET | `/ap_nbr_graph/v1/partition` | `Collection` of `RfDomain` |
| `AirMatch\RFDomain\PartitionPostReqRequest` | POST | `/ap_nbr_graph/v1/partition` | array or null |

### AirMatch: Radio

`Aruba::classic()->airMatch()->radio()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->radio()->radioNeighborsGetReq($radiomac)` | a builder over records as arrays (GET `/ap_nbr_graph/v1/Radio/NeighborList/{radiomac}`) |
| `Aruba::classic()->airMatch()->radio()->getRadioBoardLimit($radioMac)` | the response as an array, or null (GET `/feasibility/v1/board_limit/{radioMac}`) |
| `Aruba::classic()->airMatch()->radio()->getAdvancedStatEirpFeasibleRange()` | the response as an array, or null (GET `/receiver/v1/adv_eirp_range`) |
| `Aruba::classic()->airMatch()->radio()->getAdvancedStatEirp()` | `AdvancedApEirpDistribution` or null (GET `/telemetry/v1/adv_eirp_distrubution`) |
| `Aruba::classic()->airMatch()->radio()->getAdvancedStatEirpReason()` | `AdvancedApEirpDistribution` or null (GET `/telemetry/v1/adv_eirp_reason`) |
| `Aruba::classic()->airMatch()->radio()->getAdvStatNbr()` | `AdvancedStatNbr` or null (GET `/telemetry/v1/adv_stat_nbr`) |
| `Aruba::classic()->airMatch()->radio()->getAdvancedStatRadio()` | `AdvancedStatRadio` or null (GET `/telemetry/v1/adv_stat_radio`) |
| `Aruba::classic()->airMatch()->radio()->getHistoryByRadioMac($radioMac, $band)` | `RadioHistoryList` or null (GET `/telemetry/v1/history/{radio_mac}/{band}`) |
| `Aruba::classic()->airMatch()->radio()->getNbrPathlossByNbrBand($radioMac, $nbrMac, $band)` | `NbrPathloss` or null (GET `/telemetry/v1/nbr_pathloss/{radio_mac}/{nbr_mac}/{band}`) |
| `Aruba::classic()->airMatch()->radio()->getAllNbrPathloss($band)` | a builder over `NbrPathloss` records (GET `/telemetry/v1/nbr_pathloss_all/{band}`) |
| `Aruba::classic()->airMatch()->radio()->getRadioAllNbrPathloss($radioMac, $band)` | a builder over `NbrPathloss` records (GET `/telemetry/v1/nbr_pathloss_radio/{radio_mac}/{band}`) |
| `Aruba::classic()->airMatch()->radio()->getPriorityRfEventsByRadioMac($radioMac)` | a builder over `PriorityRfEvents` records (GET `/telemetry/v1/priority_rf_events/{radio_mac}`) |
| `Aruba::classic()->airMatch()->radio()->getAllPriorityRfEvents()` | a builder over `PriorityRfEvents` records (GET `/telemetry/v1/priority_rf_events_all`) |
| `Aruba::classic()->airMatch()->radio()->getRepRadioByRadioMac($radioMac)` | `ReportRadio` or null (GET `/telemetry/v1/reporting_radio/{radio_mac}`) |
| `Aruba::classic()->airMatch()->radio()->getAllRepRadio()` | a builder over `ReportRadio` records (GET `/telemetry/v1/reporting_radio_all`) |
| `Aruba::classic()->airMatch()->radio()->getRfEventsByRadioMac($radioMac)` | a builder over `RfEvents` records (GET `/telemetry/v1/rf_events/{radio_mac}`) |
| `Aruba::classic()->airMatch()->radio()->getAllRfEvents()` | a builder over `RfEvents` records (GET `/telemetry/v1/rf_events_all`) |
| `Aruba::classic()->airMatch()->radio()->getAllStaticRadios()` | a builder over `StaticRadio` records (GET `/telemetry/v1/static_radio_all`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\Radio\RadioNeighborsGetReqRequest` | GET | `/ap_nbr_graph/v1/Radio/NeighborList/{radiomac}` | `Collection` of arrays |
| `AirMatch\Radio\GetRadioBoardLimitRequest` | GET | `/feasibility/v1/board_limit/{radioMac}` | array or null |
| `AirMatch\Radio\GetAdvancedStatEirpFeasibleRangeRequest` | GET | `/receiver/v1/adv_eirp_range` | array or null |
| `AirMatch\Radio\GetAdvancedStatEirpRequest` | GET | `/telemetry/v1/adv_eirp_distrubution` | `AdvancedApEirpDistribution` or null |
| `AirMatch\Radio\GetAdvancedStatEirpReasonRequest` | GET | `/telemetry/v1/adv_eirp_reason` | `AdvancedApEirpDistribution` or null |
| `AirMatch\Radio\GetAdvStatNbrRequest` | GET | `/telemetry/v1/adv_stat_nbr` | `AdvancedStatNbr` or null |
| `AirMatch\Radio\GetAdvancedStatRadioRequest` | GET | `/telemetry/v1/adv_stat_radio` | `AdvancedStatRadio` or null |
| `AirMatch\Radio\GetHistoryByRadioMacRequest` | GET | `/telemetry/v1/history/{radio_mac}/{band}` | `RadioHistoryList` or null |
| `AirMatch\Radio\GetNbrPathlossByNbrBandRequest` | GET | `/telemetry/v1/nbr_pathloss/{radio_mac}/{nbr_mac}/{band}` | `NbrPathloss` or null |
| `AirMatch\Radio\GetAllNbrPathlossRequest` | GET | `/telemetry/v1/nbr_pathloss_all/{band}` | `Collection` of `NbrPathloss` |
| `AirMatch\Radio\GetRadioAllNbrPathlossRequest` | GET | `/telemetry/v1/nbr_pathloss_radio/{radio_mac}/{band}` | `Collection` of `NbrPathloss` |
| `AirMatch\Radio\GetPriorityRfEventsByRadioMacRequest` | GET | `/telemetry/v1/priority_rf_events/{radio_mac}` | `Collection` of `PriorityRfEvents` |
| `AirMatch\Radio\GetAllPriorityRfEventsRequest` | GET | `/telemetry/v1/priority_rf_events_all` | `Collection` of `PriorityRfEvents` |
| `AirMatch\Radio\GetRepRadioByRadioMacRequest` | GET | `/telemetry/v1/reporting_radio/{radio_mac}` | `ReportRadio` or null |
| `AirMatch\Radio\GetAllRepRadioRequest` | GET | `/telemetry/v1/reporting_radio_all` | `Collection` of `ReportRadio` |
| `AirMatch\Radio\GetRfEventsByRadioMacRequest` | GET | `/telemetry/v1/rf_events/{radio_mac}` | `Collection` of `RfEvents` |
| `AirMatch\Radio\GetAllRfEventsRequest` | GET | `/telemetry/v1/rf_events_all` | `Collection` of `RfEvents` |
| `AirMatch\Radio\GetAllStaticRadiosRequest` | GET | `/telemetry/v1/static_radio_all` | `Collection` of `StaticRadio` |

### AirMatch: Radio feasibility

`Aruba::classic()->airMatch()->radioFeasibility()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->radioFeasibility()` | a builder over `RadioFeas` records (GET `/feasibility/v1/radio_feasibility`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->airMatch()->radioFeasibility()->getFeasRadioInfo($radioMac)` | the response as an array, or null (GET `/feasibility/v1/radio_info/{radioMac}`) |
| `Aruba::classic()->airMatch()->radioFeasibility()->getRadioFeasByRadioMac($radioMac)` | `RadioFeas` or null (GET `/receiver/v1/radio_feasibility/{radioMac}`) |
| `Aruba::classic()->airMatch()->radioFeasibility()->getAllRadioFeas()` | a builder over `RadioFeas` records (GET `/receiver/v1/radio_feasibility_all`) |
| `Aruba::classic()->airMatch()->radioFeasibility()->updateFeasibility($radioMac)` | the response as an array, or null (PUT `/receiver/v1/radio_feasibility_update/{radio_mac}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\RadioFeasibility\GetAllRadioFeasRequest` | GET | `/feasibility/v1/radio_feasibility` | `Collection` of `RadioFeas` |
| `AirMatch\RadioFeasibility\GetRadioFeasByRadioMacRequest` | GET | `/feasibility/v1/radio_feasibility/{radioMac}` | `RadioFeas` or null |
| `AirMatch\RadioFeasibility\GetFeasRadioInfoRequest` | GET | `/feasibility/v1/radio_info/{radioMac}` | array or null |
| `AirMatch\RadioFeasibility\GETGetRadioFeasByRadioMacRequest` | GET | `/receiver/v1/radio_feasibility/{radioMac}` | `RadioFeas` or null |
| `AirMatch\RadioFeasibility\GETGetAllRadioFeasRequest` | GET | `/receiver/v1/radio_feasibility_all` | `Collection` of `RadioFeas` |
| `AirMatch\RadioFeasibility\UpdateFeasibilityRequest` | PUT | `/receiver/v1/radio_feasibility_update/{radio_mac}` | array or null |

### AirMatch: Schedule

`Aruba::classic()->airMatch()->schedule()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->schedule()` | a builder over `Job` records (GET `/scheduler/v1/job-list`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->airMatch()->schedule()->getDeployJobs()` | a builder over `DeployJobs` records (GET `/scheduler/v1/deploy-jobs`) |
| `Aruba::classic()->airMatch()->schedule()->triggerRunnow($runnowType)` | the response as an array, or null (POST `/scheduler/v1/runnow`) |
| `Aruba::classic()->airMatch()->schedule()->getSchedule()` | `Schedule` or null (GET `/scheduler/v1/schedule`) |
| `Aruba::classic()->airMatch()->schedule()->tenantSvcConfigUpdate()` | the response as an array, or null (POST `/scheduler/v1/svc-config-update`) |
| `Aruba::classic()->airMatch()->schedule()->getTenantTzDeployHrInfo()` | a builder over `TenantTzDeployHrDict` records (GET `/scheduler/v1/tenant-tz-deploy-hr-info`) |
| `Aruba::classic()->airMatch()->schedule()->triggerSolverJob()` | the response as an array, or null (POST `/scheduler/v1/trigger-solver-job`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\Schedule\GetDeployJobsRequest` | GET | `/scheduler/v1/deploy-jobs` | `Collection` of `DeployJobs` |
| `AirMatch\Schedule\GetJobListRequest` | GET | `/scheduler/v1/job-list` | `Collection` of `Job` |
| `AirMatch\Schedule\TriggerRunnowRequest` | POST | `/scheduler/v1/runnow` | array or null |
| `AirMatch\Schedule\GetScheduleRequest` | GET | `/scheduler/v1/schedule` | `Schedule` or null |
| `AirMatch\Schedule\TenantSvcConfigUpdateRequest` | POST | `/scheduler/v1/svc-config-update` | array or null |
| `AirMatch\Schedule\GetTenantTzDeployHrInfoRequest` | GET | `/scheduler/v1/tenant-tz-deploy-hr-info` | `Collection` of `TenantTzDeployHrDict` |
| `AirMatch\Schedule\TriggerSolverJobRequest` | POST | `/scheduler/v1/trigger-solver-job` | array or null |

### AirMatch: Solution

`Aruba::classic()->airMatch()->solution()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->solution()` | a builder over `RadioPlan` records (GET `/solver/v1/radio_plan`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->airMatch()->solution()->optimizationGetReq()` | `Optimization` or null (GET `/solver/v1/optimization`) |
| `Aruba::classic()->airMatch()->solution()->optimizationPostReq()` | the response as an array, or null (POST `/solver/v1/optimization`) |
| `Aruba::classic()->airMatch()->solution()->getOptimizationPerPartition($rfId, $partitionId)` | `Optimization` or null (GET `/solver/v1/optimization_partition/{rf_id}/{partition_id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\Solution\OptimizationGetReqRequest` | GET | `/solver/v1/optimization` | `Optimization` or null |
| `AirMatch\Solution\OptimizationPostReqRequest` | POST | `/solver/v1/optimization` | array or null |
| `AirMatch\Solution\GetOptimizationPerPartitionRequest` | GET | `/solver/v1/optimization_partition/{rf_id}/{partition_id}` | `Optimization` or null |
| `AirMatch\Solution\GetAllRadioPlanRequest` | GET | `/solver/v1/radio_plan` | `Collection` of `RadioPlan` |
| `AirMatch\Solution\GetRadioPlanByRadioMacRequest` | GET | `/solver/v1/radio_plan/{radio_mac}` | `RadioPlan` or null |

### AirMatch: Telemetry

`Aruba::classic()->airMatch()->telemetry()`

| Call | Returns |
|---|---|
| `Aruba::classic()->airMatch()->telemetry()->bootstrap($bootstrapType)` | the response as an array, or null (POST `/telemetry/v1/bootstrap`) |
| `Aruba::classic()->airMatch()->telemetry()->purge($purgeType)` | the response as an array, or null (POST `/telemetry/v1/purge`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AirMatch\Telemetry\BootstrapRequest` | POST | `/telemetry/v1/bootstrap` | array or null |
| `AirMatch\Telemetry\PurgeRequest` | POST | `/telemetry/v1/purge` | array or null |

### AppRF: AppRF IAP Meta Info

`Aruba::classic()->appRf()`

| Call | Returns |
|---|---|
| `Aruba::classic()->appRf()->getTopNStats()` | `ApprfTopNStats` or null (GET `/apprf/datapoints/v2/topn_stats`) |
| `Aruba::classic()->appRf()->appcategoriesGet()` | `ApprfTopNAppCat` or null (GET `/apprf/v1/appcategories`) |
| `Aruba::classic()->appRf()->applicationsGet()` | `ApprfTopNApp` or null (GET `/apprf/v1/applications`) |
| `Aruba::classic()->appRf()->appcategoryMappingGet()` | `IdToName` or null (GET `/apprf/v1/metainfo/iap/appcategory/id_to_name`) |
| `Aruba::classic()->appRf()->applicationMappingGet()` | `IdToName` or null (GET `/apprf/v1/metainfo/iap/application/id_to_name`) |
| `Aruba::classic()->appRf()->webcategoryMappingGet()` | `IdToName` or null (GET `/apprf/v1/metainfo/iap/webcategory/id_to_name`) |
| `Aruba::classic()->appRf()->webreputationMappingGet()` | `IdToName` or null (GET `/apprf/v1/metainfo/iap/webreputation/id_to_name`) |
| `Aruba::classic()->appRf()->webcategoriesGet()` | `ApprfTopNWebId` or null (GET `/apprf/v1/webcategories`) |
| `Aruba::classic()->appRf()->webreputationsGet()` | `ApprfTopNWebRep` or null (GET `/apprf/v1/webreputations`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AppRf\AppRFIAPMetaInfo\GetTopNStatsRequest` | GET | `/apprf/datapoints/v2/topn_stats` | `ApprfTopNStats` or null |
| `AppRf\AppRFIAPMetaInfo\AppcategoriesGetRequest` | GET | `/apprf/v1/appcategories` | `ApprfTopNAppCat` or null |
| `AppRf\AppRFIAPMetaInfo\ApplicationsGetRequest` | GET | `/apprf/v1/applications` | `ApprfTopNApp` or null |
| `AppRf\AppRFIAPMetaInfo\AppcategoryMappingGetRequest` | GET | `/apprf/v1/metainfo/iap/appcategory/id_to_name` | `IdToName` or null |
| `AppRf\AppRFIAPMetaInfo\ApplicationMappingGetRequest` | GET | `/apprf/v1/metainfo/iap/application/id_to_name` | `IdToName` or null |
| `AppRf\AppRFIAPMetaInfo\WebcategoryMappingGetRequest` | GET | `/apprf/v1/metainfo/iap/webcategory/id_to_name` | `IdToName` or null |
| `AppRf\AppRFIAPMetaInfo\WebreputationMappingGetRequest` | GET | `/apprf/v1/metainfo/iap/webreputation/id_to_name` | `IdToName` or null |
| `AppRf\AppRFIAPMetaInfo\WebcategoriesGetRequest` | GET | `/apprf/v1/webcategories` | `ApprfTopNWebId` or null |
| `AppRf\AppRFIAPMetaInfo\WebreputationsGetRequest` | GET | `/apprf/v1/webreputations` | `ApprfTopNWebRep` or null |

### Audit Event Logs: audit

`Aruba::classic()->auditLogs()->events()`

| Call | Returns |
|---|---|
| `Aruba::classic()->auditLogs()->events()` | a builder over `Event` records (GET `/auditlogs/v1/events`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->auditLogs()->events()->getAuditDetails($id)` | the response as an array, or null (GET `/auditlogs/v1/event_details/{id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `AuditLogs\Audit\GetAuditDetailsRequest` | GET | `/auditlogs/v1/event_details/{id}` | array or null |
| `AuditLogs\Audit\GetAuditsRequest` | GET | `/auditlogs/v1/events` | `Collection` of `Event` |

### Authentication & Policy: Authentications and Sessions

`Aruba::classic()->cloudAuth()->sessions()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->sessions()` | a builder over `AuthRecord` records (GET `/cloudAuth/api/v1/auth/air_pass/list`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->cloudAuth()->sessions()->readAuthCloudIdentityList()` | a builder over `AuthRecord` records (GET `/cloudAuth/api/v1/auth/cloud_identity/list`) |
| `Aruba::classic()->cloudAuth()->sessions()->readAuthDetailsRecord($requestId)` | `AccessRecord` or null (GET `/cloudAuth/api/v1/auth/{request_id}`) |
| `Aruba::classic()->cloudAuth()->sessions()->readSessionAirPassList()` | a builder over `SessionRecord` records (GET `/cloudAuth/api/v1/session/air_pass/list`) |
| `Aruba::classic()->cloudAuth()->sessions()->readCloudIdentitySessionList()` | a builder over `SessionRecord` records (GET `/cloudAuth/api/v1/session/cloud_identity/list`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\AuthenticationsAndSessions\ReadAuthAirPassListRequest` | GET | `/cloudAuth/api/v1/auth/air_pass/list` | `Collection` of `AuthRecord` |
| `CloudAuth\AuthenticationsAndSessions\ReadAuthCloudIdentityListRequest` | GET | `/cloudAuth/api/v1/auth/cloud_identity/list` | `Collection` of `AuthRecord` |
| `CloudAuth\AuthenticationsAndSessions\ReadAuthDetailsRecordRequest` | GET | `/cloudAuth/api/v1/auth/{request_id}` | `AccessRecord` or null |
| `CloudAuth\AuthenticationsAndSessions\ReadSessionAirPassListRequest` | GET | `/cloudAuth/api/v1/session/air_pass/list` | `Collection` of `SessionRecord` |
| `CloudAuth\AuthenticationsAndSessions\ReadCloudIdentitySessionListRequest` | GET | `/cloudAuth/api/v1/session/cloud_identity/list` | `Collection` of `SessionRecord` |

### Authentication & Policy: Client Policy

`Aruba::classic()->cloudAuth()->clientPolicy()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->clientPolicy()->clientPolicy()` | `ClientPolicy` or null (GET `/cloudAuth/api/v1/client_policy`) |
| `Aruba::classic()->cloudAuth()->clientPolicy()->updateClientPolicy()` | the response as an array, or null (PUT `/cloudAuth/api/v1/client_policy`) |
| `Aruba::classic()->cloudAuth()->clientPolicy()->resetClientPolicy($deleteMAC)` | the response as an array, or null (PUT `/cloudauth/api/v3/client_policy/reset`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\ClientPolicy\GetClientPolicyRequest` | GET | `/cloudAuth/api/v1/client_policy` | `ClientPolicy` or null |
| `CloudAuth\ClientPolicy\EditClientPolicyRequest` | PUT | `/cloudAuth/api/v1/client_policy` | array or null |
| `CloudAuth\ClientPolicy\ResetClientPolicyRequest` | PUT | `/cloudauth/api/v3/client_policy/reset` | array or null |

### Authentication & Policy: Download

`Aruba::classic()->cloudAuth()->downloads()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->downloads()->mpskCsv($ssid)` | the response as an array, or null (GET `/cloudAuth/api/v2/download/mpsk`) |
| `Aruba::classic()->cloudAuth()->downloads()->macCsv()` | the response as an array, or null (GET `/cloudauth/api/v3/bulk/mac`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\Download\MpskRequest` | GET | `/cloudAuth/api/v2/download/mpsk` | array or null |
| `CloudAuth\Download\MacRequest` | GET | `/cloudauth/api/v3/bulk/mac` | array or null |

### Authentication & Policy: File Upload

`Aruba::classic()->cloudAuth()->uploads()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->uploads()->upload($uploadType)` | `UploadStatus` or null (POST `/cloudauth/api/v3/bulk/{upload_type}`) |
| `Aruba::classic()->cloudAuth()->uploads()->errors($uploadType)` | the response as an array, or null (GET `/cloudauth/api/v3/bulk/{upload_type}/error`) |
| `Aruba::classic()->cloudAuth()->uploads()->status($uploadType)` | `UploadStatus` or null (GET `/cloudauth/api/v3/bulk/{upload_type}/status`) |
| `Aruba::classic()->cloudAuth()->uploads()->terminate($uploadType)` | `UploadStatus` or null (PUT `/cloudauth/api/v3/bulk/{upload_type}/terminate`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\FileUpload\Uploadv3Request` | POST | `/cloudauth/api/v3/bulk/{upload_type}` | `UploadStatus` or null |
| `CloudAuth\FileUpload\ErrorBulkRequest` | GET | `/cloudauth/api/v3/bulk/{upload_type}/error` | array or null |
| `CloudAuth\FileUpload\StatusBulkRequest` | GET | `/cloudauth/api/v3/bulk/{upload_type}/status` | `UploadStatus` or null |
| `CloudAuth\FileUpload\TerminateBulkRequest` | PUT | `/cloudauth/api/v3/bulk/{upload_type}/terminate` | `UploadStatus` or null |

### Authentication & Policy: MAC Registration

`Aruba::classic()->cloudAuth()->macRegistrations()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->macRegistrations()` | a builder over `ClientEntry` records (GET `/cloudauth/api/v3/client/mac/registration`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()`, `update()`, `delete()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\MACRegistration\GetRegistrationRequest` | GET | `/cloudauth/api/v3/client/mac/registration` | `Collection` of `ClientEntry` |
| `CloudAuth\MACRegistration\AddRegistrationRequest` | POST | `/cloudauth/api/v3/client/mac/registration` | array or null |
| `CloudAuth\MACRegistration\DeleteRegistrationRequest` | DELETE | `/cloudauth/api/v3/client/mac/registration/{mac_address}` | array or null |
| `CloudAuth\MACRegistration\EditRegistrationRequest` | PATCH | `/cloudauth/api/v3/client/mac/registration/{mac_address}` | array or null |

### Authentication & Policy: MPSK Networks Configs

`Aruba::classic()->cloudAuth()->mpsk()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->mpsk()` | a builder over `MPSKNetworkConfig` records (GET `/cloudAuth/api/v2/mpsk`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `replace()`, `delete()` |
| `Aruba::classic()->cloudAuth()->mpsk()->namedMpsks($mpskId)` | a builder over `NamedMPSKConfig` records (GET `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK`) |
| `Aruba::classic()->cloudAuth()->mpsk()->addNamedMpsk($mpskId)` | `NamedMPSKConfig` or null (POST `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK`) |
| `Aruba::classic()->cloudAuth()->mpsk()->deleteNamedMpsk($mpskId, $namedMpskId)` | status or null (DELETE `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}`) |
| `Aruba::classic()->cloudAuth()->mpsk()->findNamedMpsk($mpskId, $namedMpskId)` | `NamedMPSKConfig` or null (GET `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}`) |
| `Aruba::classic()->cloudAuth()->mpsk()->updateNamedMpsk($mpskId, $namedMpskId)` | the response as an array, or null (PATCH `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}`) |
| `Aruba::classic()->cloudAuth()->mpsk()->replaceNamedMpsk($mpskId, $namedMpskId)` | the response as an array, or null (PUT `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}`) |
| `Aruba::classic()->cloudAuth()->mpsk()->usage()` | `MPSKUsage` or null (GET `/cloudAuth/api/v2/usage/mpsk`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\MPSKNetworksConfigs\GetMpskRequest` | GET | `/cloudAuth/api/v2/mpsk` | `Collection` of `MPSKNetworkConfig` |
| `CloudAuth\MPSKNetworksConfigs\AddMpskRequest` | POST | `/cloudAuth/api/v2/mpsk` | `MPSKNetworkConfig` or null |
| `CloudAuth\MPSKNetworksConfigs\DeleteMpskRequest` | DELETE | `/cloudAuth/api/v2/mpsk/{mpsk_id}` | array or null |
| `CloudAuth\MPSKNetworksConfigs\GETGetMpskRequest` | GET | `/cloudAuth/api/v2/mpsk/{mpsk_id}` | `MPSKNetworkConfig` or null |
| `CloudAuth\MPSKNetworksConfigs\EditMpskRequest` | PUT | `/cloudAuth/api/v2/mpsk/{mpsk_id}` | array or null |
| `CloudAuth\MPSKNetworksConfigs\GetNamedmpskRequest` | GET | `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK` | `Collection` of `NamedMPSKConfig` |
| `CloudAuth\MPSKNetworksConfigs\AddNamedmpskRequest` | POST | `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK` | `NamedMPSKConfig` or null |
| `CloudAuth\MPSKNetworksConfigs\DeleteNamedmpskRequest` | DELETE | `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}` | array or null |
| `CloudAuth\MPSKNetworksConfigs\GETGetNamedmpskRequest` | GET | `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}` | `NamedMPSKConfig` or null |
| `CloudAuth\MPSKNetworksConfigs\PatchNamedmpskRequest` | PATCH | `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}` | array or null |
| `CloudAuth\MPSKNetworksConfigs\EditNamedmpskRequest` | PUT | `/cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}` | array or null |
| `CloudAuth\MPSKNetworksConfigs\MpskRequest` | GET | `/cloudAuth/api/v2/usage/mpsk` | `MPSKUsage` or null |

### Authentication & Policy: User Management

`Aruba::classic()->cloudAuth()->userCertificates()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->userCertificates()` | a builder over `CGCertDetails` records (GET `/cloudauth/api/v3/user/certificate`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->cloudAuth()->userCertificates()->revokeDeviceCertificate()` | `RevokeCertRes` or null (POST `/cloudauth/api/v3/user/certificate/revocation`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\UserManagement\FetchUserCertificatesRequest` | GET | `/cloudauth/api/v3/user/certificate` | `Collection` of `CGCertDetails` |
| `CloudAuth\UserManagement\RevokeDeviceCertificateRequest` | POST | `/cloudauth/api/v3/user/certificate/revocation` | `RevokeCertRes` or null |

### Authentication & Policy: User Policy

`Aruba::classic()->cloudAuth()->userPolicy()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->userPolicy()->userPolicy()` | `UserPolicy` or null (GET `/cloudAuth/api/v1/user_policy`) |
| `Aruba::classic()->cloudAuth()->userPolicy()->updateUserPolicy()` | the response as an array, or null (PUT `/cloudAuth/api/v1/user_policy`) |
| `Aruba::classic()->cloudAuth()->userPolicy()->resetUserPolicy($deleteMPSK)` | the response as an array, or null (PUT `/cloudauth/api/v3/user_policy/reset`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\UserPolicy\GetUserPolicyRequest` | GET | `/cloudAuth/api/v1/user_policy` | `UserPolicy` or null |
| `CloudAuth\UserPolicy\EditUserPolicyRequest` | PUT | `/cloudAuth/api/v1/user_policy` | array or null |
| `CloudAuth\UserPolicy\ResetUserPolicyRequest` | PUT | `/cloudauth/api/v3/user_policy/reset` | array or null |

### Authentication & Policy: Wi-Fi Easy Connect

`Aruba::classic()->cloudAuth()->dppRegistrations()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudAuth()->dppRegistrations()` | a builder over `DPPClient` records (GET `/cloudAuth/api/v1/dpp_registration`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()`, `replace()`, `delete()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAuth\WiFiEasyConnect\GetDppRegistrationRequest` | GET | `/cloudAuth/api/v1/dpp_registration` | `Collection` of `DPPClient` |
| `CloudAuth\WiFiEasyConnect\AddDppRegistrationRequest` | POST | `/cloudAuth/api/v1/dpp_registration` | array or null |
| `CloudAuth\WiFiEasyConnect\DeleteDppRegistrationRequest` | DELETE | `/cloudAuth/api/v1/dpp_registration/{id}` | array or null |
| `CloudAuth\WiFiEasyConnect\EditDppRegistrationRequest` | PUT | `/cloudAuth/api/v1/dpp_registration/{id}` | array or null |

### Ble Beacon Service: BleBeaconService

`Aruba::classic()->bleBeacons()`

| Call | Returns |
|---|---|
| `Aruba::classic()->bleBeacons()->deleteDeviceBeacon($iotRadioMac, $profileId)` | status or null (DELETE `/ble_beacon/{iot_radio_mac}/{profile_id}`) |
| `Aruba::classic()->bleBeacons()->updateDeviceBeacon($iotRadioMac, $profileId)` | the response as an array, or null (POST `/ble_beacon/{iot_radio_mac}/{profile_id}`) |
| `Aruba::classic()->bleBeacons()->retrieveBeaconProfile()` | a builder over `BleBeaconProfileItem` records (GET `/ble_beacon_profiles`) |
| `Aruba::classic()->bleBeacons()->retrieveDesireBeacon($groupName)` | a builder over `Beacons` records (GET `/ble_cfg_beacons/{group_name}`) |
| `Aruba::classic()->bleBeacons()->retrieveActualBeacon($groupName)` | a builder over `Beacons` records (GET `/ble_run_beacons/{group_name}`) |
| `Aruba::classic()->bleBeacons()->createBeaconProfile($groupName, $profileName, $configMethod, $radioInstance)` | the response as an array, or null (POST `/cfg_beacon_profiles/{group_name}`) |
| `Aruba::classic()->bleBeacons()->profileDelete($groupName, $profileId)` | status or null (DELETE `/delete_beacon_profiles/{group_name}/{profile_id}`) |
| `Aruba::classic()->bleBeacons()->editBeaconProfile($groupName, $profileId)` | the response as an array, or null (POST `/edit_beacon_profiles/{group_name}/{profile_id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `BleBeacons\BleBeaconService\DeleteDeviceBeaconRequest` | DELETE | `/ble_beacon/{iot_radio_mac}/{profile_id}` | array or null |
| `BleBeacons\BleBeaconService\UpdateDeviceBeaconRequest` | POST | `/ble_beacon/{iot_radio_mac}/{profile_id}` | array or null |
| `BleBeacons\BleBeaconService\RetrieveBeaconProfileRequest` | GET | `/ble_beacon_profiles` | `Collection` of `BleBeaconProfileItem` |
| `BleBeacons\BleBeaconService\RetrieveDesireBeaconRequest` | GET | `/ble_cfg_beacons/{group_name}` | `Collection` of `Beacons` |
| `BleBeacons\BleBeaconService\RetrieveActualBeaconRequest` | GET | `/ble_run_beacons/{group_name}` | `Collection` of `Beacons` |
| `BleBeacons\BleBeaconService\CreateBeaconProfileRequest` | POST | `/cfg_beacon_profiles/{group_name}` | array or null |
| `BleBeacons\BleBeaconService\ProfileDeleteRequest` | DELETE | `/delete_beacon_profiles/{group_name}/{profile_id}` | array or null |
| `BleBeacons\BleBeaconService\EditBeaconProfileRequest` | POST | `/edit_beacon_profiles/{group_name}/{profile_id}` | array or null |

### Client Match: Status

`Aruba::classic()->clientMatch()`

| Call | Returns |
|---|---|
| `Aruba::classic()->clientMatch()->getBandsteer6ghzEnableV1TenantId($tenantId)` | `Response` or null (GET `/bandsteer-6ghz-enable/v1/{tenant_id}`) |
| `Aruba::classic()->clientMatch()->postBandsteer6ghzEnableV1TenantId($tenantId)` | `Response` or null (POST `/bandsteer-6ghz-enable/v1/{tenant_id}`) |
| `Aruba::classic()->clientMatch()->getCmEnabledV1TenantId($tenantId)` | `Response` or null (GET `/cm-enabled/v1/{tenant_id}`) |
| `Aruba::classic()->clientMatch()->postCmEnabledV1TenantId($tenantId)` | `Response` or null (POST `/cm-enabled/v1/{tenant_id}`) |
| `Aruba::classic()->clientMatch()->getLoadbalEnableV1TenantId($tenantId)` | `Response` or null (GET `/loadbal-enable/v1/{tenant_id}`) |
| `Aruba::classic()->clientMatch()->postLoadbalEnableV1TenantId($tenantId)` | `Response` or null (POST `/loadbal-enable/v1/{tenant_id}`) |
| `Aruba::classic()->clientMatch()->getUnsteerableV1TenantId($tenantId)` | `Response` or null (GET `/unsteerable/v1/{tenant_id}`) |
| `Aruba::classic()->clientMatch()->deleteUnsteerableV1TenantIdClientMac($tenantId, $clientMac)` | status or null (DELETE `/unsteerable/v1/{tenant_id}/{client_mac}`) |
| `Aruba::classic()->clientMatch()->getUnsteerableV1TenantIdClientMac($tenantId, $clientMac)` | `Response` or null (GET `/unsteerable/v1/{tenant_id}/{client_mac}`) |
| `Aruba::classic()->clientMatch()->postUnsteerableV1TenantIdClientMac($tenantId, $clientMac)` | `Response` or null (POST `/unsteerable/v1/{tenant_id}/{client_mac}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `ClientMatch\Status\GetBandsteer6ghzEnableV1TenantIdRequest` | GET | `/bandsteer-6ghz-enable/v1/{tenant_id}` | `Response` or null |
| `ClientMatch\Status\PostBandsteer6ghzEnableV1TenantIdRequest` | POST | `/bandsteer-6ghz-enable/v1/{tenant_id}` | `Response` or null |
| `ClientMatch\Status\GetCmEnabledV1TenantIdRequest` | GET | `/cm-enabled/v1/{tenant_id}` | `Response` or null |
| `ClientMatch\Status\PostCmEnabledV1TenantIdRequest` | POST | `/cm-enabled/v1/{tenant_id}` | `Response` or null |
| `ClientMatch\Status\GetLoadbalEnableV1TenantIdRequest` | GET | `/loadbal-enable/v1/{tenant_id}` | `Response` or null |
| `ClientMatch\Status\PostLoadbalEnableV1TenantIdRequest` | POST | `/loadbal-enable/v1/{tenant_id}` | `Response` or null |
| `ClientMatch\Status\GetUnsteerableV1TenantIdRequest` | GET | `/unsteerable/v1/{tenant_id}` | `Response` or null |
| `ClientMatch\Status\DeleteUnsteerableV1TenantIdClientMacRequest` | DELETE | `/unsteerable/v1/{tenant_id}/{client_mac}` | array or null |
| `ClientMatch\Status\GetUnsteerableV1TenantIdClientMacRequest` | GET | `/unsteerable/v1/{tenant_id}/{client_mac}` | `Response` or null |
| `ClientMatch\Status\PostUnsteerableV1TenantIdClientMacRequest` | POST | `/unsteerable/v1/{tenant_id}/{client_mac}` | `Response` or null |

### Cloud Connect: Cloud Connect

`Aruba::classic()->cloudConnect()`

| Call | Returns |
|---|---|
| `Aruba::classic()->cloudConnect()->getArubaCloudVpnConnectConfigSummary()` | a builder over `ConfigSummaryItem` records (GET `/cloud-connect/config-summary`) |
| `Aruba::classic()->cloudConnect()->getArubaCloudVpnConnectTopologyEps()` | a builder over `ConfigSummaryItem` records (GET `/cloud-connect/topology-eps`) |
| `Aruba::classic()->cloudConnect()->getArubaCloudVpnConnectTopologyScan()` | `TopologyScanSchema` or null (GET `/cloud-connect/topology-scan`) |
| `Aruba::classic()->cloudConnect()->getCloudConnectV1AllTunnelPolicyConfigs()` | `ArubaCloudVpnConnectAllTunnelConfigs` or null (GET `/cloud-connect/v1/all-tunnel-policy-configs`) |
| `Aruba::classic()->cloudConnect()->deleteCloudConnectV1CustomAccountAccountName($accountName)` | status or null (DELETE `/cloud-connect/v1/custom-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->getCloudConnectV1CustomAccountAccountName($accountName)` | the response as an array, or null (GET `/cloud-connect/v1/custom-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->postCloudConnectV1CustomAccountAccountName($accountName)` | the response as an array, or null (POST `/cloud-connect/v1/custom-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->putCloudConnectV1CustomAccountAccountName($accountName)` | the response as an array, or null (PUT `/cloud-connect/v1/custom-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->deleteArubaCloudVpnConnectConfigId3($nodeId)` | `ConfigSummarySchema` or null (DELETE `/cloud-connect/v1/node_list/{node_id}/config/aws`) |
| `Aruba::classic()->cloudConnect()->postArubaCloudVpnConnectConfigId3($nodeId)` | `ConfigSummarySchema` or null (POST `/cloud-connect/v1/node_list/{node_id}/config/aws`) |
| `Aruba::classic()->cloudConnect()->putArubaCloudVpnConnectConfigId3($nodeId)` | `ConfigSummarySchema` or null (PUT `/cloud-connect/v1/node_list/{node_id}/config/aws`) |
| `Aruba::classic()->cloudConnect()->deleteArubaCloudVpnConnectConfigId4($nodeId)` | `ConfigSummarySchema` or null (DELETE `/cloud-connect/v1/node_list/{node_id}/config/azure`) |
| `Aruba::classic()->cloudConnect()->postArubaCloudVpnConnectConfigId4($nodeId)` | `ConfigSummarySchema` or null (POST `/cloud-connect/v1/node_list/{node_id}/config/azure`) |
| `Aruba::classic()->cloudConnect()->putArubaCloudVpnConnectConfigId4($nodeId)` | `ConfigSummarySchema` or null (PUT `/cloud-connect/v1/node_list/{node_id}/config/azure`) |
| `Aruba::classic()->cloudConnect()->deleteArubaCloudVpnConnectConfigId1($nodeId)` | `ConfigSummarySchema` or null (DELETE `/cloud-connect/v1/node_list/{node_id}/config/custom`) |
| `Aruba::classic()->cloudConnect()->postArubaCloudVpnConnectConfigId1($nodeId)` | `ConfigSummarySchema` or null (POST `/cloud-connect/v1/node_list/{node_id}/config/custom`) |
| `Aruba::classic()->cloudConnect()->putArubaCloudVpnConnectConfigId1($nodeId)` | `ConfigSummarySchema` or null (PUT `/cloud-connect/v1/node_list/{node_id}/config/custom`) |
| `Aruba::classic()->cloudConnect()->deleteArubaCloudVpnConnectConfigId5($nodeId)` | `ConfigSummarySchema` or null (DELETE `/cloud-connect/v1/node_list/{node_id}/config/prisma`) |
| `Aruba::classic()->cloudConnect()->postArubaCloudVpnConnectConfigId5($nodeId)` | `ConfigSummarySchema` or null (POST `/cloud-connect/v1/node_list/{node_id}/config/prisma`) |
| `Aruba::classic()->cloudConnect()->putArubaCloudVpnConnectConfigId5($nodeId)` | `ConfigSummarySchema` or null (PUT `/cloud-connect/v1/node_list/{node_id}/config/prisma`) |
| `Aruba::classic()->cloudConnect()->deleteArubaCloudVpnConnectConfigId2($nodeId)` | `ConfigSummarySchema` or null (DELETE `/cloud-connect/v1/node_list/{node_id}/config/zscaler`) |
| `Aruba::classic()->cloudConnect()->postArubaCloudVpnConnectConfigId2($nodeId)` | `ConfigSummarySchema` or null (POST `/cloud-connect/v1/node_list/{node_id}/config/zscaler`) |
| `Aruba::classic()->cloudConnect()->putArubaCloudVpnConnectConfigId2($nodeId)` | `ConfigSummarySchema` or null (PUT `/cloud-connect/v1/node_list/{node_id}/config/zscaler`) |
| `Aruba::classic()->cloudConnect()->deleteCloudConnectV1PrismaAccountAccountName($accountName)` | status or null (DELETE `/cloud-connect/v1/prisma-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->getCloudConnectV1PrismaAccountAccountName($accountName)` | the response as an array, or null (GET `/cloud-connect/v1/prisma-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->postCloudConnectV1PrismaAccountAccountName($accountName)` | the response as an array, or null (POST `/cloud-connect/v1/prisma-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->putCloudConnectV1PrismaAccountAccountName($accountName)` | the response as an array, or null (PUT `/cloud-connect/v1/prisma-account/{account_name}`) |
| `Aruba::classic()->cloudConnect()->getCloudConnectV1TunnelPolicyConfigMetadata()` | `ArubaCloudVpnConnectTunnelMetadataWrapper` or null (GET `/cloud-connect/v1/tunnel-policy-config-metadata`) |
| `Aruba::classic()->cloudConnect()->deleteCloudConnectV1TunnelPolicyConfigPolicyName($policyName)` | status or null (DELETE `/cloud-connect/v1/tunnel-policy-config/{policy_name}`) |
| `Aruba::classic()->cloudConnect()->getCloudConnectV1TunnelPolicyConfigPolicyName($policyName)` | `ArubaCloudVpnConnectTunnelPolicyConfig` or null (GET `/cloud-connect/v1/tunnel-policy-config/{policy_name}`) |
| `Aruba::classic()->cloudConnect()->postCloudConnectV1TunnelPolicyConfigPolicyName($policyName)` | the response as an array, or null (POST `/cloud-connect/v1/tunnel-policy-config/{policy_name}`) |
| `Aruba::classic()->cloudConnect()->putCloudConnectV1TunnelPolicyConfigPolicyName($policyName)` | the response as an array, or null (PUT `/cloud-connect/v1/tunnel-policy-config/{policy_name}`) |
| `Aruba::classic()->cloudConnect()->getArubaCloudVpnConnectVlanCfg()` | a builder over `VlanIpListItem` records (GET `/cloud-connect/vlan-cfg`) |
| `Aruba::classic()->cloudConnect()->getArubaCloudVpnConnectZscalerNodeScan()` | `ZscalerZenNodesSchema` or null (GET `/cloud-connect/zscaler/node-scan`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudConnect\CloudConnect\GetArubaCloudVpnConnectConfigSummaryRequest` | GET | `/cloud-connect/config-summary` | `Collection` of `ConfigSummaryItem` |
| `CloudConnect\CloudConnect\GetArubaCloudVpnConnectTopologyEpsRequest` | GET | `/cloud-connect/topology-eps` | `Collection` of `ConfigSummaryItem` |
| `CloudConnect\CloudConnect\GetArubaCloudVpnConnectTopologyScanRequest` | GET | `/cloud-connect/topology-scan` | `TopologyScanSchema` or null |
| `CloudConnect\CloudConnect\GetCloudConnectV1AllTunnelPolicyConfigsRequest` | GET | `/cloud-connect/v1/all-tunnel-policy-configs` | `ArubaCloudVpnConnectAllTunnelConfigs` or null |
| `CloudConnect\CloudConnect\DeleteCloudConnectV1CustomAccountAccountNameRequest` | DELETE | `/cloud-connect/v1/custom-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\GetCloudConnectV1CustomAccountAccountNameRequest` | GET | `/cloud-connect/v1/custom-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\PostCloudConnectV1CustomAccountAccountNameRequest` | POST | `/cloud-connect/v1/custom-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\PutCloudConnectV1CustomAccountAccountNameRequest` | PUT | `/cloud-connect/v1/custom-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId3Request` | DELETE | `/cloud-connect/v1/node_list/{node_id}/config/aws` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId3Request` | POST | `/cloud-connect/v1/node_list/{node_id}/config/aws` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId3Request` | PUT | `/cloud-connect/v1/node_list/{node_id}/config/aws` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId4Request` | DELETE | `/cloud-connect/v1/node_list/{node_id}/config/azure` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId4Request` | POST | `/cloud-connect/v1/node_list/{node_id}/config/azure` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId4Request` | PUT | `/cloud-connect/v1/node_list/{node_id}/config/azure` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId1Request` | DELETE | `/cloud-connect/v1/node_list/{node_id}/config/custom` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId1Request` | POST | `/cloud-connect/v1/node_list/{node_id}/config/custom` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId1Request` | PUT | `/cloud-connect/v1/node_list/{node_id}/config/custom` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId5Request` | DELETE | `/cloud-connect/v1/node_list/{node_id}/config/prisma` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId5Request` | POST | `/cloud-connect/v1/node_list/{node_id}/config/prisma` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId5Request` | PUT | `/cloud-connect/v1/node_list/{node_id}/config/prisma` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId2Request` | DELETE | `/cloud-connect/v1/node_list/{node_id}/config/zscaler` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId2Request` | POST | `/cloud-connect/v1/node_list/{node_id}/config/zscaler` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId2Request` | PUT | `/cloud-connect/v1/node_list/{node_id}/config/zscaler` | `ConfigSummarySchema` or null |
| `CloudConnect\CloudConnect\DeleteCloudConnectV1PrismaAccountAccountNameRequest` | DELETE | `/cloud-connect/v1/prisma-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\GetCloudConnectV1PrismaAccountAccountNameRequest` | GET | `/cloud-connect/v1/prisma-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\PostCloudConnectV1PrismaAccountAccountNameRequest` | POST | `/cloud-connect/v1/prisma-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\PutCloudConnectV1PrismaAccountAccountNameRequest` | PUT | `/cloud-connect/v1/prisma-account/{account_name}` | array or null |
| `CloudConnect\CloudConnect\GetCloudConnectV1TunnelPolicyConfigMetadataRequest` | GET | `/cloud-connect/v1/tunnel-policy-config-metadata` | `ArubaCloudVpnConnectTunnelMetadataWrapper` or null |
| `CloudConnect\CloudConnect\DeleteCloudConnectV1TunnelPolicyConfigPolicyNameRequest` | DELETE | `/cloud-connect/v1/tunnel-policy-config/{policy_name}` | array or null |
| `CloudConnect\CloudConnect\GetCloudConnectV1TunnelPolicyConfigPolicyNameRequest` | GET | `/cloud-connect/v1/tunnel-policy-config/{policy_name}` | `ArubaCloudVpnConnectTunnelPolicyConfig` or null |
| `CloudConnect\CloudConnect\PostCloudConnectV1TunnelPolicyConfigPolicyNameRequest` | POST | `/cloud-connect/v1/tunnel-policy-config/{policy_name}` | array or null |
| `CloudConnect\CloudConnect\PutCloudConnectV1TunnelPolicyConfigPolicyNameRequest` | PUT | `/cloud-connect/v1/tunnel-policy-config/{policy_name}` | array or null |
| `CloudConnect\CloudConnect\GetArubaCloudVpnConnectVlanCfgRequest` | GET | `/cloud-connect/vlan-cfg` | `Collection` of `VlanIpListItem` |
| `CloudConnect\CloudConnect\GetArubaCloudVpnConnectZscalerNodeScanRequest` | GET | `/cloud-connect/zscaler/node-scan` | `ZscalerZenNodesSchema` or null |

### Configuration: AOS-S

`Aruba::classic()->configuration()->aosSwitch()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->aosSwitch()->getDevicePorts($deviceSerial)` | the response as an array, or null (GET `/configuration/v1/aos_switch/ports/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setDevicePorts($deviceSerial)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/ports/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->getGroupPorts($groupName)` | the response as an array, or null (GET `/configuration/v1/aos_switch/ports/groups/{group_name}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setGroupPorts($groupName)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/ports/groups/{group_name}`) |
| `Aruba::classic()->configuration()->aosSwitch()->getDeviceAdmin($deviceSerial)` | `AdminDetails` or null (GET `/configuration/v1/aos_switch/system/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setDeviceAdmin($deviceSerial)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/system/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->getGroupAdmin($groupName)` | `AdminDetails` or null (GET `/configuration/v1/aos_switch/system/groups/{group_name}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setGroupAdmin($groupName)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/system/groups/{group_name}`) |
| `Aruba::classic()->configuration()->aosSwitch()->getDeviceSystemTime($deviceSerial)` | `DeviceSystemTime` or null (GET `/configuration/v1/aos_switch/system_time/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setDeviceSystemTime($deviceSerial)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/system_time/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->getGroupSystemTime($groupName)` | `GroupSystemTime` or null (GET `/configuration/v1/aos_switch/system_time/groups/{group_name}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setGroupSystemTime($groupName)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/system_time/groups/{group_name}`) |
| `Aruba::classic()->configuration()->aosSwitch()->getDeviceVlans($deviceSerial)` | the response as an array, or null (GET `/configuration/v1/aos_switch/vlans/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setDeviceVlans($deviceSerial)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/vlans/devices/{device_serial}`) |
| `Aruba::classic()->configuration()->aosSwitch()->getGroupVlans($groupName)` | the response as an array, or null (GET `/configuration/v1/aos_switch/vlans/groups/{group_name}`) |
| `Aruba::classic()->configuration()->aosSwitch()->setGroupVlans($groupName)` | the response as an array, or null (PUT `/configuration/v1/aos_switch/vlans/groups/{group_name}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\AOSS\GetDevicePortsRequest` | GET | `/configuration/v1/aos_switch/ports/devices/{device_serial}` | array or null |
| `Configuration\AOSS\SetDevicePortsRequest` | PUT | `/configuration/v1/aos_switch/ports/devices/{device_serial}` | array or null |
| `Configuration\AOSS\GetGroupPortsRequest` | GET | `/configuration/v1/aos_switch/ports/groups/{group_name}` | array or null |
| `Configuration\AOSS\SetGroupPortsRequest` | PUT | `/configuration/v1/aos_switch/ports/groups/{group_name}` | array or null |
| `Configuration\AOSS\GetDeviceAdminRequest` | GET | `/configuration/v1/aos_switch/system/devices/{device_serial}` | `AdminDetails` or null |
| `Configuration\AOSS\SetDeviceAdminRequest` | PUT | `/configuration/v1/aos_switch/system/devices/{device_serial}` | array or null |
| `Configuration\AOSS\GetGroupAdminRequest` | GET | `/configuration/v1/aos_switch/system/groups/{group_name}` | `AdminDetails` or null |
| `Configuration\AOSS\SetGroupAdminRequest` | PUT | `/configuration/v1/aos_switch/system/groups/{group_name}` | array or null |
| `Configuration\AOSS\GetDeviceSystemTimeRequest` | GET | `/configuration/v1/aos_switch/system_time/devices/{device_serial}` | `DeviceSystemTime` or null |
| `Configuration\AOSS\SetDeviceSystemTimeRequest` | PUT | `/configuration/v1/aos_switch/system_time/devices/{device_serial}` | array or null |
| `Configuration\AOSS\GetGroupSystemTimeRequest` | GET | `/configuration/v1/aos_switch/system_time/groups/{group_name}` | `GroupSystemTime` or null |
| `Configuration\AOSS\SetGroupSystemTimeRequest` | PUT | `/configuration/v1/aos_switch/system_time/groups/{group_name}` | array or null |
| `Configuration\AOSS\GetDeviceVlansRequest` | GET | `/configuration/v1/aos_switch/vlans/devices/{device_serial}` | array or null |
| `Configuration\AOSS\SetDeviceVlansRequest` | PUT | `/configuration/v1/aos_switch/vlans/devices/{device_serial}` | array or null |
| `Configuration\AOSS\GetGroupVlansRequest` | GET | `/configuration/v1/aos_switch/vlans/groups/{group_name}` | array or null |
| `Configuration\AOSS\SetGroupVlansRequest` | PUT | `/configuration/v1/aos_switch/vlans/groups/{group_name}` | array or null |

### Configuration: AP Configuration

`Aruba::classic()->configuration()->accessPoints()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->accessPoints()->getConfigurationClis($groupNameOrGuidOrSerialNumber)` | a builder over records as arrays (GET `/configuration/v1/ap_cli/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateConfigurationClis($groupNameOrGuidOrSerialNumber)` | the response as an array, or null (POST `/configuration/v1/ap_cli/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->getApSettingsClis($serialNumber)` | a builder over records as arrays (GET `/configuration/v1/ap_settings_cli/{serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateApSettingsClis($serialNumber)` | the response as an array, or null (POST `/configuration/v1/ap_settings_cli/{serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->getArmConfig($groupNameOrGuidOrSerialNumber)` | `ArmData` or null (GET `/configuration/v1/arm/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateArmConfig($groupNameOrGuidOrSerialNumber)` | the response as an array, or null (POST `/configuration/v1/arm/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->getDeviceSshCredential($serialNumberOrGuid)` | `APCredential` or null (GET `/configuration/v1/device/ssh_credential/{serial_number_or_guid}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateDeviceSshCredential($serialNumberOrGuid)` | the response as an array, or null (POST `/configuration/v1/device/ssh_credential/{serial_number_or_guid}`) |
| `Aruba::classic()->configuration()->accessPoints()->getDirtyDiff($groupNameOrGuidOrSerialNumber)` | a builder over `DirtyDiff` records (GET `/configuration/v1/dirty_diff/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->deleteDot11aRadioProfile($groupNameOrGuidOrSerialNumber, $name)` | status or null (DELETE `/configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}`) |
| `Aruba::classic()->configuration()->accessPoints()->getDot11aRadioConfigByName($groupNameOrGuidOrSerialNumber, $name)` | `RadioProfile` or null (GET `/configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateDot11aRadioProfile($groupNameOrGuidOrSerialNumber, $name)` | the response as an array, or null (POST `/configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}`) |
| `Aruba::classic()->configuration()->accessPoints()->getAllDot11aRadioProfile($groupNameOrGuidOrSerialNumber)` | a builder over `RadioProfile` records (GET `/configuration/v1/dot11a_radio_profiles/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->deleteDot11gRadioProfile($groupNameOrGuidOrSerialNumber, $name)` | status or null (DELETE `/configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}`) |
| `Aruba::classic()->configuration()->accessPoints()->getDot11gRadioConfigByName($groupNameOrGuidOrSerialNumber, $name)` | `RadioProfile` or null (GET `/configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateDot11gRadioProfile($groupNameOrGuidOrSerialNumber, $name)` | the response as an array, or null (POST `/configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}`) |
| `Aruba::classic()->configuration()->accessPoints()->getAllDot11gRadioProfile($groupNameOrGuidOrSerialNumber)` | a builder over `RadioProfile` records (GET `/configuration/v1/dot11g_radio_profiles/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->getGroupSshCredential($groupName)` | `APCredential` or null (GET `/configuration/v1/group/ssh_credential/{group_name}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateGroupSshCredential($groupName)` | the response as an array, or null (POST `/configuration/v1/group/ssh_credential/{group_name}`) |
| `Aruba::classic()->configuration()->accessPoints()->getSwarmVariables($groupNameOrGuidOrSerialNumber)` | a builder over `ApVariables` records (GET `/configuration/v1/iap_variables/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateSwarmVariables($groupNameOrGuidOrSerialNumber)` | the response as an array, or null (POST `/configuration/v1/iap_variables/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->getSystemConfig($groupNameOrGuidOrSerialNumber)` | the response as an array, or null (GET `/configuration/v1/system_config/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->accessPoints()->updateSystemConfig($groupNameOrGuidOrSerialNumber)` | the response as an array, or null (POST `/configuration/v1/system_config/{group_name_or_guid_or_serial_number}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\APConfiguration\GetConfigurationClisRequest` | GET | `/configuration/v1/ap_cli/{group_name_or_guid_or_serial_number}` | `Collection` of arrays |
| `Configuration\APConfiguration\UpdateConfigurationClisRequest` | POST | `/configuration/v1/ap_cli/{group_name_or_guid_or_serial_number}` | array or null |
| `Configuration\APConfiguration\GetApSettingsClisRequest` | GET | `/configuration/v1/ap_settings_cli/{serial_number}` | `Collection` of arrays |
| `Configuration\APConfiguration\UpdateApSettingsClisRequest` | POST | `/configuration/v1/ap_settings_cli/{serial_number}` | array or null |
| `Configuration\APConfiguration\GetArmConfigRequest` | GET | `/configuration/v1/arm/{group_name_or_guid_or_serial_number}` | `ArmData` or null |
| `Configuration\APConfiguration\UpdateArmConfigRequest` | POST | `/configuration/v1/arm/{group_name_or_guid_or_serial_number}` | array or null |
| `Configuration\APConfiguration\GetDeviceSshCredentialRequest` | GET | `/configuration/v1/device/ssh_credential/{serial_number_or_guid}` | `APCredential` or null |
| `Configuration\APConfiguration\UpdateDeviceSshCredentialRequest` | POST | `/configuration/v1/device/ssh_credential/{serial_number_or_guid}` | array or null |
| `Configuration\APConfiguration\GetDirtyDiffRequest` | GET | `/configuration/v1/dirty_diff/{group_name_or_guid_or_serial_number}` | `Collection` of `DirtyDiff` |
| `Configuration\APConfiguration\DeleteDot11aRadioProfileRequest` | DELETE | `/configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}` | array or null |
| `Configuration\APConfiguration\GetDot11aRadioConfigByNameRequest` | GET | `/configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}` | `RadioProfile` or null |
| `Configuration\APConfiguration\UpdateDot11aRadioProfileRequest` | POST | `/configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}` | array or null |
| `Configuration\APConfiguration\GetAllDot11aRadioProfileRequest` | GET | `/configuration/v1/dot11a_radio_profiles/{group_name_or_guid_or_serial_number}` | `Collection` of `RadioProfile` |
| `Configuration\APConfiguration\DeleteDot11gRadioProfileRequest` | DELETE | `/configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}` | array or null |
| `Configuration\APConfiguration\GetDot11gRadioConfigByNameRequest` | GET | `/configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}` | `RadioProfile` or null |
| `Configuration\APConfiguration\UpdateDot11gRadioProfileRequest` | POST | `/configuration/v1/dot11g_radio_profile/{group_name_or_guid_or_serial_number}/{name}` | array or null |
| `Configuration\APConfiguration\GetAllDot11gRadioProfileRequest` | GET | `/configuration/v1/dot11g_radio_profiles/{group_name_or_guid_or_serial_number}` | `Collection` of `RadioProfile` |
| `Configuration\APConfiguration\GetGroupSshCredentialRequest` | GET | `/configuration/v1/group/ssh_credential/{group_name}` | `APCredential` or null |
| `Configuration\APConfiguration\UpdateGroupSshCredentialRequest` | POST | `/configuration/v1/group/ssh_credential/{group_name}` | array or null |
| `Configuration\APConfiguration\GetSwarmVariablesRequest` | GET | `/configuration/v1/iap_variables/{group_name_or_guid_or_serial_number}` | `Collection` of `ApVariables` |
| `Configuration\APConfiguration\UpdateSwarmVariablesRequest` | POST | `/configuration/v1/iap_variables/{group_name_or_guid_or_serial_number}` | array or null |
| `Configuration\APConfiguration\GetSystemConfigRequest` | GET | `/configuration/v1/system_config/{group_name_or_guid_or_serial_number}` | array or null |
| `Configuration\APConfiguration\UpdateSystemConfigRequest` | POST | `/configuration/v1/system_config/{group_name_or_guid_or_serial_number}` | array or null |

### Configuration: AP Settings

`Aruba::classic()->configuration()->apSettings()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->apSettings()->getApSettings($serialNumber)` | the response as an array, or null (GET `/configuration/v2/ap_settings/{serial_number}`) |
| `Aruba::classic()->configuration()->apSettings()->updateApSettings($serialNumber)` | the response as an array, or null (POST `/configuration/v2/ap_settings/{serial_number}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\APSettings\GetApSettingsRequest` | GET | `/configuration/v2/ap_settings/{serial_number}` | array or null |
| `Configuration\APSettings\UpdateApSettingsRequest` | POST | `/configuration/v2/ap_settings/{serial_number}` | array or null |

### Configuration: Captive portal logo

`Aruba::classic()->configuration()->captivePortalLogos()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->captivePortalLogos()->getCpLogos()` | a builder over `CaptivePortalLogoInfo` records (GET `/configuration/v1/cplogo`) |
| `Aruba::classic()->configuration()->captivePortalLogos()->uploadCpLogo()` | `CaptivePortalLogoInfo` or null (POST `/configuration/v1/cplogo`) |
| `Aruba::classic()->configuration()->captivePortalLogos()->deleteCpLogo($checksum)` | status or null (DELETE `/configuration/v1/cplogo/{checksum}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\CaptivePortalLogo\GetCpLogosRequest` | GET | `/configuration/v1/cplogo` | `Collection` of `CaptivePortalLogoInfo` |
| `Configuration\CaptivePortalLogo\UploadCpLogoRequest` | POST | `/configuration/v1/cplogo` | `CaptivePortalLogoInfo` or null |
| `Configuration\CaptivePortalLogo\DeleteCpLogoRequest` | DELETE | `/configuration/v1/cplogo/{checksum}` | array or null |

### Configuration: Certificates

`Aruba::classic()->configuration()->certificates()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->certificates()->getCertificates()` | a builder over `CertificateInfo` records (GET `/configuration/v1/certificates`) |
| `Aruba::classic()->configuration()->certificates()->uploadCertificate()` | `CertificateInfo` or null (POST `/configuration/v1/certificates`) |
| `Aruba::classic()->configuration()->certificates()->deleteCertificate($certificate)` | status or null (DELETE `/configuration/v1/certificates/{certificate}`) |
| `Aruba::classic()->configuration()->certificates()->mspUpdateCertificate()` | `CertificateInfo` or null (PUT `/configuration/v1/msp/certificate`) |
| `Aruba::classic()->configuration()->certificates()->updateCertificateForNonMspCustomer()` | `CertificateInfo` or null (PUT `/configuration/v1/non_msp/certificate`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\Certificates\GetCertificatesRequest` | GET | `/configuration/v1/certificates` | `Collection` of `CertificateInfo` |
| `Configuration\Certificates\UploadCertificateRequest` | POST | `/configuration/v1/certificates` | `CertificateInfo` or null |
| `Configuration\Certificates\DeleteCertificateRequest` | DELETE | `/configuration/v1/certificates/{certificate}` | array or null |
| `Configuration\Certificates\MspUpdateCertificateRequest` | PUT | `/configuration/v1/msp/certificate` | `CertificateInfo` or null |
| `Configuration\Certificates\UpdateCertificateForNonMspCustomerRequest` | PUT | `/configuration/v1/non_msp/certificate` | `CertificateInfo` or null |

### Configuration: Configuration Mode

`Aruba::classic()->configuration()->configurationMode()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->configurationMode()->getCustConfigMode()` | a builder over `CustConfigMode` records (GET `/configuration/v1/mode`) |
| `Aruba::classic()->configuration()->configurationMode()->setCustConfigMode()` | the response as an array, or null (POST `/configuration/v1/mode`) |
| `Aruba::classic()->configuration()->configurationMode()->getDeviceConfigMode()` | a builder over `DeviceConfigMode` records (GET `/configuration/v1/mode/device`) |
| `Aruba::classic()->configuration()->configurationMode()->setDeviceConfigMode()` | the response as an array, or null (POST `/configuration/v1/mode/device`) |
| `Aruba::classic()->configuration()->configurationMode()->getDeviceSerialsConfigMode()` | a builder over `DeviceConfigMode` records (GET `/configuration/v1/mode/devices`) |
| `Aruba::classic()->configuration()->configurationMode()->getGroupConfigMode()` | a builder over `GroupConfigMode` records (GET `/configuration/v1/mode/group`) |
| `Aruba::classic()->configuration()->configurationMode()->setGroupConfigMode()` | the response as an array, or null (POST `/configuration/v1/mode/group`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\ConfigurationMode\GetCustConfigModeRequest` | GET | `/configuration/v1/mode` | `Collection` of `CustConfigMode` |
| `Configuration\ConfigurationMode\SetCustConfigModeRequest` | POST | `/configuration/v1/mode` | array or null |
| `Configuration\ConfigurationMode\GetDeviceConfigModeRequest` | GET | `/configuration/v1/mode/device` | `Collection` of `DeviceConfigMode` |
| `Configuration\ConfigurationMode\SetDeviceConfigModeRequest` | POST | `/configuration/v1/mode/device` | array or null |
| `Configuration\ConfigurationMode\GetDeviceSerialsConfigModeRequest` | GET | `/configuration/v1/mode/devices` | `Collection` of `DeviceConfigMode` |
| `Configuration\ConfigurationMode\GetGroupConfigModeRequest` | GET | `/configuration/v1/mode/group` | `Collection` of `GroupConfigMode` |
| `Configuration\ConfigurationMode\SetGroupConfigModeRequest` | POST | `/configuration/v1/mode/group` | array or null |

### Configuration: Configuration backup and restore

`Aruba::classic()->configuration()->snapshots()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->snapshots()->createSnapshotsForMultipleGroups()` | the response as an array, or null (POST `/configuration/v1/groups/snapshot/backups`) |
| `Aruba::classic()->configuration()->snapshots()->createSnapshotForGroup($group)` | the response as an array, or null (POST `/configuration/v1/groups/snapshot/{group}`) |
| `Aruba::classic()->configuration()->snapshots()->getLastRestoreLogsForGroup($group)` | the response as an array, or null (GET `/configuration/v1/groups/{group}/last_restore_log`) |
| `Aruba::classic()->configuration()->snapshots()->getSnapshotsForGroup($group)` | a builder over `SnapshotInfo` records (GET `/configuration/v1/groups/{group}/snapshots`) |
| `Aruba::classic()->configuration()->snapshots()->updateDoNotDelete($group)` | the response as an array, or null (PATCH `/configuration/v1/groups/{group}/snapshots`) |
| `Aruba::classic()->configuration()->snapshots()->getBackupLogForSnapshot($group, $snapshot)` | the response as an array, or null (GET `/configuration/v1/groups/{group}/snapshots/{snapshot}/backup_log`) |
| `Aruba::classic()->configuration()->snapshots()->getBackupStatusForSnapshot($group, $snapshot)` | the response as an array, or null (GET `/configuration/v1/groups/{group}/snapshots/{snapshot}/backup_status`) |
| `Aruba::classic()->configuration()->snapshots()->restoreSnapshotForGroup($group, $snapshot, $deviceType)` | the response as an array, or null (POST `/configuration/v1/groups/{group}/snapshots/{snapshot}/restore`) |
| `Aruba::classic()->configuration()->snapshots()->getRestoreStatusForSnapshot($group, $snapshot)` | the response as an array, or null (GET `/configuration/v1/groups/{group}/snapshots/{snapshot}/restore_status`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\ConfigurationBackupAndRestore\CreateSnapshotsForMultipleGroupsRequest` | POST | `/configuration/v1/groups/snapshot/backups` | array or null |
| `Configuration\ConfigurationBackupAndRestore\CreateSnapshotForGroupRequest` | POST | `/configuration/v1/groups/snapshot/{group}` | array or null |
| `Configuration\ConfigurationBackupAndRestore\GetLastRestoreLogsForGroupRequest` | GET | `/configuration/v1/groups/{group}/last_restore_log` | array or null |
| `Configuration\ConfigurationBackupAndRestore\GetSnapshotsForGroupRequest` | GET | `/configuration/v1/groups/{group}/snapshots` | `Collection` of `SnapshotInfo` |
| `Configuration\ConfigurationBackupAndRestore\UpdateDoNotDeleteRequest` | PATCH | `/configuration/v1/groups/{group}/snapshots` | array or null |
| `Configuration\ConfigurationBackupAndRestore\GetBackupLogForSnapshotRequest` | GET | `/configuration/v1/groups/{group}/snapshots/{snapshot}/backup_log` | array or null |
| `Configuration\ConfigurationBackupAndRestore\GetBackupStatusForSnapshotRequest` | GET | `/configuration/v1/groups/{group}/snapshots/{snapshot}/backup_status` | array or null |
| `Configuration\ConfigurationBackupAndRestore\RestoreSnapshotForGroupRequest` | POST | `/configuration/v1/groups/{group}/snapshots/{snapshot}/restore` | array or null |
| `Configuration\ConfigurationBackupAndRestore\GetRestoreStatusForSnapshotRequest` | GET | `/configuration/v1/groups/{group}/snapshots/{snapshot}/restore_status` | array or null |

### Configuration: Devices

`Aruba::classic()->configuration()->devices()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->devices()->getGroupsTemplateDetails($deviceType)` | the response as an array, or null (GET `/configuration/v1/devices/groups/template`) |
| `Aruba::classic()->configuration()->devices()->moveDevices()` | the response as an array, or null (POST `/configuration/v1/devices/move`) |
| `Aruba::classic()->configuration()->devices()->getDevicesTemplateDetails($deviceSerials)` | the response as an array, or null (GET `/configuration/v1/devices/template`) |
| `Aruba::classic()->configuration()->devices()->getDeviceConfigurationDetails($deviceSerial)` | the response as an array, or null (GET `/configuration/v1/devices/{device_serial}/config_details`) |
| `Aruba::classic()->configuration()->devices()->getDeviceConfiguration($deviceSerial)` | the response as an array, or null (GET `/configuration/v1/devices/{device_serial}/configuration`) |
| `Aruba::classic()->configuration()->devices()->getDeviceGroup($deviceSerial)` | `Group` or null (GET `/configuration/v1/devices/{device_serial}/group`) |
| `Aruba::classic()->configuration()->devices()->recoverMdDevice($deviceSerial)` | the response as an array, or null (POST `/configuration/v1/devices/{device_serial}/recover_device`) |
| `Aruba::classic()->configuration()->devices()->getDeviceVariabilisedTemplate($deviceSerial)` | the response as an array, or null (GET `/configuration/v1/devices/{device_serial}/variablised_template`) |
| `Aruba::classic()->configuration()->devices()->getHashTemplateDetails($templateHash, $excludeHash, $deviceType)` | the response as an array, or null (GET `/configuration/v1/devices/{template_hash}/template`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\Devices\GetGroupsTemplateDetailsRequest` | GET | `/configuration/v1/devices/groups/template` | array or null |
| `Configuration\Devices\MoveDevicesRequest` | POST | `/configuration/v1/devices/move` | array or null |
| `Configuration\Devices\GetDevicesTemplateDetailsRequest` | GET | `/configuration/v1/devices/template` | array or null |
| `Configuration\Devices\GetDeviceConfigurationDetailsRequest` | GET | `/configuration/v1/devices/{device_serial}/config_details` | array or null |
| `Configuration\Devices\GetDeviceConfigurationRequest` | GET | `/configuration/v1/devices/{device_serial}/configuration` | array or null |
| `Configuration\Devices\GetDeviceGroupRequest` | GET | `/configuration/v1/devices/{device_serial}/group` | `Group` or null |
| `Configuration\Devices\RecoverMdDeviceRequest` | POST | `/configuration/v1/devices/{device_serial}/recover_device` | array or null |
| `Configuration\Devices\GetDeviceVariabilisedTemplateRequest` | GET | `/configuration/v1/devices/{device_serial}/variablised_template` | array or null |
| `Configuration\Devices\GetHashTemplateDetailsRequest` | GET | `/configuration/v1/devices/{template_hash}/template` | array or null |

### Configuration: Groups

`Aruba::classic()->configuration()->groups()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->groups()` | a builder over records as arrays (GET `/configuration/v2/groups`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()`, `delete()` |
| `Aruba::classic()->configuration()->groups()->properties()` | a builder over `ApiGroupsGetGroupsPropertiesItem` records (GET `/configuration/v1/groups/properties`) |
| `Aruba::classic()->configuration()->groups()->preProvision()` | the response as an array, or null (POST `/configuration/v1/preassign`) |
| `Aruba::classic()->configuration()->groups()->createWithoutProperties()` | the response as an array, or null (POST `/configuration/v2/groups`) |
| `Aruba::classic()->configuration()->groups()->cloneGroup()` | the response as an array, or null (POST `/configuration/v2/groups/clone`) |
| `Aruba::classic()->configuration()->groups()->templateInfo()` | a builder over `ApiGroupsGetGroupsTemplateDataItem` records (GET `/configuration/v2/groups/template_info`) |
| `Aruba::classic()->configuration()->groups()->updateProperties($group)` | the response as an array, or null (PATCH `/configuration/v2/groups/{group}/properties`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\Groups\GetGroupsPropertiesRequest` | GET | `/configuration/v1/groups/properties` | `Collection` of `ApiGroupsGetGroupsPropertiesItem` |
| `Configuration\Groups\DeleteGroupRequest` | DELETE | `/configuration/v1/groups/{group}` | array or null |
| `Configuration\Groups\PreProvisionGroupRequest` | POST | `/configuration/v1/preassign` | array or null |
| `Configuration\Groups\GetGroupsRequest` | GET | `/configuration/v2/groups` | `Collection` of arrays |
| `Configuration\Groups\CreateGroupRequest` | POST | `/configuration/v2/groups` | array or null |
| `Configuration\Groups\CloneGroupRequest` | POST | `/configuration/v2/groups/clone` | array or null |
| `Configuration\Groups\GetGroupsTemplateDataRequest` | GET | `/configuration/v2/groups/template_info` | `Collection` of `ApiGroupsGetGroupsTemplateDataItem` |
| `Configuration\Groups\UpdateGroupPropertiesRequest` | PATCH | `/configuration/v2/groups/{group}/properties` | array or null |
| `Configuration\Groups\CreateGroupV3Request` | POST | `/configuration/v3/groups` | array or null |

### Configuration: MSP Templates

`Aruba::classic()->configuration()->mspTemplates()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->mspTemplates()->getMspCustomerTemplates()` | a builder over `CustomerTemplate` records (GET `/configuration/v1/msp/templates`) |
| `Aruba::classic()->configuration()->mspTemplates()->getEndCustomerTemplates($cid)` | a builder over `CustomerTemplate` records (GET `/configuration/v1/msp/templates/customer/{cid}`) |
| `Aruba::classic()->configuration()->mspTemplates()->deleteEndCustomerTemplate($cid, $deviceType, $version, $model)` | status or null (DELETE `/configuration/v1/msp/templates/customer/{cid}/{device_type}/{version}/{model}`) |
| `Aruba::classic()->configuration()->mspTemplates()->getEndCustomerTemplateText($cid, $deviceType, $version, $model)` | the response as an array, or null (GET `/configuration/v1/msp/templates/customer/{cid}/{device_type}/{version}/{model}`) |
| `Aruba::classic()->configuration()->mspTemplates()->getMspTmplEndCustDifferGroups($cid, $deviceType, $version, $model)` | a builder over `TemplateCustGroupDiffers` records (GET `/configuration/v1/msp/templates/differences/customer/{cid}/{device_type}/{version}/{model}`) |
| `Aruba::classic()->configuration()->mspTemplates()->getMspTmplDifferCustsGroups($deviceType, $version, $model)` | a builder over `TemplateCustGroupDiffers` records (GET `/configuration/v1/msp/templates/differences/{device_type}/{version}/{model}`) |
| `Aruba::classic()->configuration()->mspTemplates()->deleteMspCustomerTemplate($deviceType, $version, $model)` | status or null (DELETE `/configuration/v1/msp/templates/{device_type}/{version}/{model}`) |
| `Aruba::classic()->configuration()->mspTemplates()->getMspCustomerTemplateText($deviceType, $version, $model)` | the response as an array, or null (GET `/configuration/v1/msp/templates/{device_type}/{version}/{model}`) |
| `Aruba::classic()->configuration()->mspTemplates()->setMspCustomerTemplate($deviceType, $version, $model)` | the response as an array, or null (PUT `/configuration/v2/msp/templates`) |
| `Aruba::classic()->configuration()->mspTemplates()->setEndCustomerTemplate($cid, $deviceType, $version, $model)` | the response as an array, or null (PUT `/configuration/v2/msp/templates/customer/{cid}`) |
| `Aruba::classic()->configuration()->mspTemplates()->applyEndCustomerTemplate($cid, $deviceType, $version, $model)` | the response as an array, or null (POST `/configuration/v2/msp/templates/end_customers/{cid}/{device_type}/{version}/{model}/groups`) |
| `Aruba::classic()->configuration()->mspTemplates()->applyMspCustomerTemplate($deviceType, $version, $model)` | the response as an array, or null (POST `/configuration/v2/msp/templates/end_customers/{device_type}/{version}/{model}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\MSPTemplates\GetMspCustomerTemplatesRequest` | GET | `/configuration/v1/msp/templates` | `Collection` of `CustomerTemplate` |
| `Configuration\MSPTemplates\GetEndCustomerTemplatesRequest` | GET | `/configuration/v1/msp/templates/customer/{cid}` | `Collection` of `CustomerTemplate` |
| `Configuration\MSPTemplates\DeleteEndCustomerTemplateRequest` | DELETE | `/configuration/v1/msp/templates/customer/{cid}/{device_type}/{version}/{model}` | array or null |
| `Configuration\MSPTemplates\GetEndCustomerTemplateTextRequest` | GET | `/configuration/v1/msp/templates/customer/{cid}/{device_type}/{version}/{model}` | array or null |
| `Configuration\MSPTemplates\GetMspTmplEndCustDifferGroupsRequest` | GET | `/configuration/v1/msp/templates/differences/customer/{cid}/{device_type}/{version}/{model}` | `Collection` of `TemplateCustGroupDiffers` |
| `Configuration\MSPTemplates\GetMspTmplDifferCustsGroupsRequest` | GET | `/configuration/v1/msp/templates/differences/{device_type}/{version}/{model}` | `Collection` of `TemplateCustGroupDiffers` |
| `Configuration\MSPTemplates\DeleteMspCustomerTemplateRequest` | DELETE | `/configuration/v1/msp/templates/{device_type}/{version}/{model}` | array or null |
| `Configuration\MSPTemplates\GetMspCustomerTemplateTextRequest` | GET | `/configuration/v1/msp/templates/{device_type}/{version}/{model}` | array or null |
| `Configuration\MSPTemplates\SetMspCustomerTemplateRequest` | PUT | `/configuration/v2/msp/templates` | array or null |
| `Configuration\MSPTemplates\SetEndCustomerTemplateRequest` | PUT | `/configuration/v2/msp/templates/customer/{cid}` | array or null |
| `Configuration\MSPTemplates\ApplyEndCustomerTemplateRequest` | POST | `/configuration/v2/msp/templates/end_customers/{cid}/{device_type}/{version}/{model}/groups` | array or null |
| `Configuration\MSPTemplates\ApplyMspCustomerTemplateRequest` | POST | `/configuration/v2/msp/templates/end_customers/{device_type}/{version}/{model}` | array or null |

### Configuration: NB UI Group Configuration

`Aruba::classic()->configuration()->country()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->country()->setGroupConfigCountryCode()` | the response as an array, or null (PUT `/configuration/v1/country`) |
| `Aruba::classic()->configuration()->country()->getGroupCountry($group)` | the response as an array, or null (GET `/configuration/v1/{group}/country`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\NBUIGroupConfiguration\SetGroupConfigCountryCodeRequest` | PUT | `/configuration/v1/country` | array or null |
| `Configuration\NBUIGroupConfiguration\GetGroupCountryRequest` | GET | `/configuration/v1/{group}/country` | array or null |

### Configuration: Save Commit

`Aruba::classic()->configuration()->saveCommit()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->saveCommit()->getDeviceSerialsAutoCommitState()` | a builder over `GetDeviceAutoCommitState` records (GET `/configuration/v1/auto_commit_state/devices`) |
| `Aruba::classic()->configuration()->saveCommit()->setDeviceSerialsAutoCommitState()` | the response as an array, or null (POST `/configuration/v1/auto_commit_state/devices`) |
| `Aruba::classic()->configuration()->saveCommit()->getGroupsAutoCommitState()` | a builder over `GetGroupAutoCommitState` records (GET `/configuration/v1/auto_commit_state/groups`) |
| `Aruba::classic()->configuration()->saveCommit()->setGroupsAutoCommitState()` | the response as an array, or null (POST `/configuration/v1/auto_commit_state/groups`) |
| `Aruba::classic()->configuration()->saveCommit()->commitDeviceConfig()` | the response as an array, or null (POST `/configuration/v1/commit/devices`) |
| `Aruba::classic()->configuration()->saveCommit()->commitGroupConfig()` | the response as an array, or null (POST `/configuration/v1/commit/groups`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\SaveCommit\GetDeviceSerialsAutoCommitStateRequest` | GET | `/configuration/v1/auto_commit_state/devices` | `Collection` of `GetDeviceAutoCommitState` |
| `Configuration\SaveCommit\SetDeviceSerialsAutoCommitStateRequest` | POST | `/configuration/v1/auto_commit_state/devices` | array or null |
| `Configuration\SaveCommit\GetGroupsAutoCommitStateRequest` | GET | `/configuration/v1/auto_commit_state/groups` | `Collection` of `GetGroupAutoCommitState` |
| `Configuration\SaveCommit\SetGroupsAutoCommitStateRequest` | POST | `/configuration/v1/auto_commit_state/groups` | array or null |
| `Configuration\SaveCommit\CommitDeviceConfigRequest` | POST | `/configuration/v1/commit/devices` | array or null |
| `Configuration\SaveCommit\CommitGroupConfigRequest` | POST | `/configuration/v1/commit/groups` | array or null |

### Configuration: Swarm Config

`Aruba::classic()->configuration()->swarmConfig()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->swarmConfig()->getSwarmConfig($guid)` | the response as an array, or null (GET `/configuration/v2/swarm_config/{guid}`) |
| `Aruba::classic()->configuration()->swarmConfig()->updateSwarmConfig($guid)` | the response as an array, or null (POST `/configuration/v2/swarm_config/{guid}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\SwarmConfig\GetSwarmConfigRequest` | GET | `/configuration/v2/swarm_config/{guid}` | array or null |
| `Configuration\SwarmConfig\UpdateSwarmConfigRequest` | POST | `/configuration/v2/swarm_config/{guid}` | array or null |

### Configuration: Templates

`Aruba::classic()->configuration()->templates()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->templates()->getTemplates($group)` | a builder over `Template` records (GET `/configuration/v1/groups/{group}/templates`) |
| `Aruba::classic()->configuration()->templates()->updateTemplate($group, $name)` | the response as an array, or null (PATCH `/configuration/v1/groups/{group}/templates`) |
| `Aruba::classic()->configuration()->templates()->createTemplate($group, $name, $deviceType, $version, $model)` | the response as an array, or null (POST `/configuration/v1/groups/{group}/templates`) |
| `Aruba::classic()->configuration()->templates()->deleteTemplate($group, $template)` | status or null (DELETE `/configuration/v1/groups/{group}/templates/{template}`) |
| `Aruba::classic()->configuration()->templates()->getTemplate($group, $template)` | the response as an array, or null (GET `/configuration/v1/groups/{group}/templates/{template}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\Templates\GetTemplatesRequest` | GET | `/configuration/v1/groups/{group}/templates` | `Collection` of `Template` |
| `Configuration\Templates\UpdateTemplateRequest` | PATCH | `/configuration/v1/groups/{group}/templates` | array or null |
| `Configuration\Templates\CreateTemplateRequest` | POST | `/configuration/v1/groups/{group}/templates` | array or null |
| `Configuration\Templates\DeleteTemplateRequest` | DELETE | `/configuration/v1/groups/{group}/templates/{template}` | array or null |
| `Configuration\Templates\GetTemplateRequest` | GET | `/configuration/v1/groups/{group}/templates/{template}` | array or null |

### Configuration: Variables

`Aruba::classic()->configuration()->variables()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->variables()->getAllDevicesTemplateVariables()` | the response as an array, or null (GET `/configuration/v1/devices/template_variables`) |
| `Aruba::classic()->configuration()->variables()->updateAllDevicesTemplateVariables()` | the response as an array, or null (PATCH `/configuration/v1/devices/template_variables`) |
| `Aruba::classic()->configuration()->variables()->createAllDevicesTemplateVariables()` | the response as an array, or null (POST `/configuration/v1/devices/template_variables`) |
| `Aruba::classic()->configuration()->variables()->replaceAllDevicesTemplateVariables()` | the response as an array, or null (PUT `/configuration/v1/devices/template_variables`) |
| `Aruba::classic()->configuration()->variables()->deleteDeviceTemplateVariables($deviceSerial)` | status or null (DELETE `/configuration/v1/devices/{device_serial}/template_variables`) |
| `Aruba::classic()->configuration()->variables()->getDeviceTemplateVariables($deviceSerial)` | the response as an array, or null (GET `/configuration/v1/devices/{device_serial}/template_variables`) |
| `Aruba::classic()->configuration()->variables()->updateDeviceTemplateVariables($deviceSerial)` | the response as an array, or null (PATCH `/configuration/v1/devices/{device_serial}/template_variables`) |
| `Aruba::classic()->configuration()->variables()->createDeviceTemplateVariables($deviceSerial)` | the response as an array, or null (POST `/configuration/v1/devices/{device_serial}/template_variables`) |
| `Aruba::classic()->configuration()->variables()->replaceDeviceTemplateVariables($deviceSerial)` | the response as an array, or null (PUT `/configuration/v1/devices/{device_serial}/template_variables`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\Variables\GetAllDevicesTemplateVariablesRequest` | GET | `/configuration/v1/devices/template_variables` | array or null |
| `Configuration\Variables\UpdateAllDevicesTemplateVariablesRequest` | PATCH | `/configuration/v1/devices/template_variables` | array or null |
| `Configuration\Variables\CreateAllDevicesTemplateVariablesRequest` | POST | `/configuration/v1/devices/template_variables` | array or null |
| `Configuration\Variables\ReplaceAllDevicesTemplateVariablesRequest` | PUT | `/configuration/v1/devices/template_variables` | array or null |
| `Configuration\Variables\DeleteDeviceTemplateVariablesRequest` | DELETE | `/configuration/v1/devices/{device_serial}/template_variables` | array or null |
| `Configuration\Variables\GetDeviceTemplateVariablesRequest` | GET | `/configuration/v1/devices/{device_serial}/template_variables` | array or null |
| `Configuration\Variables\UpdateDeviceTemplateVariablesRequest` | PATCH | `/configuration/v1/devices/{device_serial}/template_variables` | array or null |
| `Configuration\Variables\CreateDeviceTemplateVariablesRequest` | POST | `/configuration/v1/devices/{device_serial}/template_variables` | array or null |
| `Configuration\Variables\ReplaceDeviceTemplateVariablesRequest` | PUT | `/configuration/v1/devices/{device_serial}/template_variables` | array or null |

### Configuration: Variables firewall

`Aruba::classic()->configuration()->variablesFirewall()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->variablesFirewall()` | a builder over records as arrays (GET `/configuration/v1/variables_firewall/groups`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()`, `delete()` |
| `Aruba::classic()->configuration()->variablesFirewall()->getVfwVariables()` | a builder over records as arrays (GET `/configuration/v1/variables_firewall/variables`) |
| `Aruba::classic()->configuration()->variablesFirewall()->updateVfwVariables()` | the response as an array, or null (POST `/configuration/v1/variables_firewall/variables`) |
| `Aruba::classic()->configuration()->variablesFirewall()->deleteVfwVariable($variable)` | status or null (DELETE `/configuration/v1/variables_firewall/variables/{variable}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\VariablesFirewall\GetVfwGroupsRequest` | GET | `/configuration/v1/variables_firewall/groups` | `Collection` of arrays |
| `Configuration\VariablesFirewall\UpdateVfwGroupsRequest` | POST | `/configuration/v1/variables_firewall/groups` | array or null |
| `Configuration\VariablesFirewall\DeleteVfwGroupRequest` | DELETE | `/configuration/v1/variables_firewall/groups/{group}` | array or null |
| `Configuration\VariablesFirewall\GetVfwVariablesRequest` | GET | `/configuration/v1/variables_firewall/variables` | `Collection` of arrays |
| `Configuration\VariablesFirewall\UpdateVfwVariablesRequest` | POST | `/configuration/v1/variables_firewall/variables` | array or null |
| `Configuration\VariablesFirewall\DeleteVfwVariableRequest` | DELETE | `/configuration/v1/variables_firewall/variables/{variable}` | array or null |

### Configuration: WLAN Configuration

`Aruba::classic()->configuration()->wlans()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->wlans()->getHotspotList($groupNameOrGuidOrSerialNumber)` | `FullHotspotListData` or null (GET `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->wlans()->getHotspotTemplates($groupNameOrGuidOrSerialNumber)` | `FullHotspotTemplatetData` or null (GET `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/template`) |
| `Aruba::classic()->configuration()->wlans()->deleteHotspot($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName)` | status or null (DELETE `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}`) |
| `Aruba::classic()->configuration()->wlans()->getHotspot($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName)` | `FullHotspotData` or null (GET `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}`) |
| `Aruba::classic()->configuration()->wlans()->createHotspot($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName)` | the response as an array, or null (POST `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}`) |
| `Aruba::classic()->configuration()->wlans()->updateHotspot($groupNameOrGuidOrSerialNumber, $hotspotName, $modeName)` | the response as an array, or null (PUT `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}`) |
| `Aruba::classic()->configuration()->wlans()->getHotspotListByModeName($groupNameOrGuidOrSerialNumber, $modeName)` | `FullHotspotListData` or null (GET `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{mode_name}`) |
| `Aruba::classic()->configuration()->wlans()->getWlanList($groupNameOrGuidOrSerialNumber)` | `FullWlanListData` or null (GET `/configuration/full_wlan/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->wlans()->getAccessRuleServices($groupNameOrGuidOrSerialNumber)` | `AccessRuleServices` or null (GET `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/access_rule_services`) |
| `Aruba::classic()->configuration()->wlans()->getWlanTemplate($groupNameOrGuidOrSerialNumber)` | `FullWlanData` or null (GET `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/template`) |
| `Aruba::classic()->configuration()->wlans()->deleteWlan($groupNameOrGuidOrSerialNumber, $wlanName)` | status or null (DELETE `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->getWlan($groupNameOrGuidOrSerialNumber, $wlanName)` | `FullWlanData` or null (GET `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->createWlan($groupNameOrGuidOrSerialNumber, $wlanName)` | the response as an array, or null (POST `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->updateWlan($groupNameOrGuidOrSerialNumber, $wlanName)` | the response as an array, or null (PUT `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->getProtocolMap($groupNameOrGuid)` | `ProtocolMap` or null (GET `/configuration/full_wlan/{group_name_or_guid}/protocol_map`) |
| `Aruba::classic()->configuration()->wlans()->getWlanListGet($groupNameOrGuidOrSerialNumber)` | `WlanListData` or null (GET `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}`) |
| `Aruba::classic()->configuration()->wlans()->getAccessRuleServicesGet($groupNameOrGuidOrSerialNumber)` | `AccessRuleServices` or null (GET `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}/access_rule_services`) |
| `Aruba::classic()->configuration()->wlans()->getWlanTemplateGet($groupNameOrGuidOrSerialNumber)` | `WlanData` or null (GET `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}/template`) |
| `Aruba::classic()->configuration()->wlans()->deleteWlanDelete($groupNameOrGuidOrSerialNumber, $wlanName)` | status or null (DELETE `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->getProtocolMapGet($groupNameOrGuid)` | `ProtocolMap` or null (GET `/configuration/v1/wlan/{group_name_or_guid}/protocol_map`) |
| `Aruba::classic()->configuration()->wlans()->getWlanV2($groupNameOrGuidOrSerialNumber, $wlanName)` | `WlanData` or null (GET `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->cleanUpAndUpdateWlan($groupNameOrGuidOrSerialNumber, $wlanName)` | the response as an array, or null (PATCH `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->createWlanV2($groupNameOrGuidOrSerialNumber, $wlanName)` | the response as an array, or null (POST `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |
| `Aruba::classic()->configuration()->wlans()->updateWlanV2($groupNameOrGuidOrSerialNumber, $wlanName)` | the response as an array, or null (PUT `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\WLANConfiguration\GetHotspotListRequest` | GET | `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}` | `FullHotspotListData` or null |
| `Configuration\WLANConfiguration\GetHotspotTemplatesRequest` | GET | `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/template` | `FullHotspotTemplatetData` or null |
| `Configuration\WLANConfiguration\DeleteHotspotRequest` | DELETE | `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}` | array or null |
| `Configuration\WLANConfiguration\GetHotspotRequest` | GET | `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}` | `FullHotspotData` or null |
| `Configuration\WLANConfiguration\CreateHotspotRequest` | POST | `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}` | array or null |
| `Configuration\WLANConfiguration\UpdateHotspotRequest` | PUT | `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{hotspot_name}/{mode_name}` | array or null |
| `Configuration\WLANConfiguration\GetHotspotListByModeNameRequest` | GET | `/configuration/full_hotspot/{group_name_or_guid_or_serial_number}/{mode_name}` | `FullHotspotListData` or null |
| `Configuration\WLANConfiguration\GetWlanListRequest` | GET | `/configuration/full_wlan/{group_name_or_guid_or_serial_number}` | `FullWlanListData` or null |
| `Configuration\WLANConfiguration\GetAccessRuleServicesRequest` | GET | `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/access_rule_services` | `AccessRuleServices` or null |
| `Configuration\WLANConfiguration\GetWlanTemplateRequest` | GET | `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/template` | `FullWlanData` or null |
| `Configuration\WLANConfiguration\DeleteWlanRequest` | DELETE | `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | array or null |
| `Configuration\WLANConfiguration\GetWlanRequest` | GET | `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | `FullWlanData` or null |
| `Configuration\WLANConfiguration\CreateWlanRequest` | POST | `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | array or null |
| `Configuration\WLANConfiguration\UpdateWlanRequest` | PUT | `/configuration/full_wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | array or null |
| `Configuration\WLANConfiguration\GetProtocolMapRequest` | GET | `/configuration/full_wlan/{group_name_or_guid}/protocol_map` | `ProtocolMap` or null |
| `Configuration\WLANConfiguration\GETGetWlanListRequest` | GET | `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}` | `WlanListData` or null |
| `Configuration\WLANConfiguration\GETGetAccessRuleServicesRequest` | GET | `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}/access_rule_services` | `AccessRuleServices` or null |
| `Configuration\WLANConfiguration\GETGetWlanTemplateRequest` | GET | `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}/template` | `WlanData` or null |
| `Configuration\WLANConfiguration\DELETEDeleteWlanRequest` | DELETE | `/configuration/v1/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | array or null |
| `Configuration\WLANConfiguration\GETGetProtocolMapRequest` | GET | `/configuration/v1/wlan/{group_name_or_guid}/protocol_map` | `ProtocolMap` or null |
| `Configuration\WLANConfiguration\GetWlanV2Request` | GET | `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | `WlanData` or null |
| `Configuration\WLANConfiguration\CleanUpAndUpdateWlanRequest` | PATCH | `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | array or null |
| `Configuration\WLANConfiguration\CreateWlanV2Request` | POST | `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | array or null |
| `Configuration\WLANConfiguration\UpdateWlanV2Request` | PUT | `/configuration/v2/wlan/{group_name_or_guid_or_serial_number}/{wlan_name}` | array or null |

### Configuration: denylist clients

`Aruba::classic()->configuration()->denylist()`

| Call | Returns |
|---|---|
| `Aruba::classic()->configuration()->denylist()->deleteBlacklistClients($deviceId)` | the response as an array, or null (DELETE `/configuration/v1/swarm/{device_id}/blacklisting`) |
| `Aruba::classic()->configuration()->denylist()->getBlacklistClients($deviceId)` | the response as an array, or null (GET `/configuration/v1/swarm/{device_id}/blacklisting`) |
| `Aruba::classic()->configuration()->denylist()->addBlacklistClients($deviceId)` | the response as an array, or null (POST `/configuration/v1/swarm/{device_id}/blacklisting`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Configuration\DenylistClients\DeleteBlacklistClientsRequest` | DELETE | `/configuration/v1/swarm/{device_id}/blacklisting` | array or null |
| `Configuration\DenylistClients\GetBlacklistClientsRequest` | GET | `/configuration/v1/swarm/{device_id}/blacklisting` | array or null |
| `Configuration\DenylistClients\AddBlacklistClientsRequest` | POST | `/configuration/v1/swarm/{device_id}/blacklisting` | array or null |

### DPS Monitoring: DPS

`Aruba::classic()->dps()`

| Call | Returns |
|---|---|
| `Aruba::classic()->dps()->getDpsPoliciesCompliancePercentage($clusterId)` | a builder over `DpsPolicyCompliancePercentageInternalData` records (GET `/datapoints/v1/cluster/{cluster_id}/sdwan_policies/compliance_percentage`) |
| `Aruba::classic()->dps()->getDpsPoliciesKpiStats($clusterId)` | a builder over `DpsKPIInternalData` records (GET `/datapoints/v1/cluster/{cluster_id}/sdwan_policies/kpi`) |
| `Aruba::classic()->dps()->getDpsPoliciesStatus($clusterId)` | a builder over `DpsPoliciesStatusInternalData` records (GET `/datapoints/v1/cluster/{cluster_id}/sdwan_policies/status`) |
| `Aruba::classic()->dps()->getDpsPoliciesEventLogs($clusterId, $policyName)` | a builder over records as arrays (GET `/datapoints/v1/cluster/{cluster_id}/sdwan_policy/event_logs/{policy_name}`) |
| `Aruba::classic()->dps()->getDpsPolicyStats($clusterId, $policyName)` | a builder over `DpsPolicyStatsInternalData` records (GET `/datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats/{policy_name}`) |
| `Aruba::classic()->dps()->getDpsPolicyStatsHigherWindow($clusterId, $policyName)` | a builder over `DpsPolicyStatsHigherWindowInternalData` records (GET `/datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats_higher_window/{policy_name}`) |
| `Aruba::classic()->dps()->getDpsSitePolicyStats($siteName)` | a builder over `DpsSitePolicyStatsInternalData` records (GET `/datapoints/v1/sdwan_site/site_policy_stats/{site_name}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Dps\DPS\GetDpsPoliciesCompliancePercentageRequest` | GET | `/datapoints/v1/cluster/{cluster_id}/sdwan_policies/compliance_percentage` | `Collection` of `DpsPolicyCompliancePercentageInternalData` |
| `Dps\DPS\GetDpsPoliciesKpiStatsRequest` | GET | `/datapoints/v1/cluster/{cluster_id}/sdwan_policies/kpi` | `Collection` of `DpsKPIInternalData` |
| `Dps\DPS\GetDpsPoliciesStatusRequest` | GET | `/datapoints/v1/cluster/{cluster_id}/sdwan_policies/status` | `Collection` of `DpsPoliciesStatusInternalData` |
| `Dps\DPS\GetDpsPoliciesEventLogsRequest` | GET | `/datapoints/v1/cluster/{cluster_id}/sdwan_policy/event_logs/{policy_name}` | `Collection` of arrays |
| `Dps\DPS\GetDpsPolicyStatsRequest` | GET | `/datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats/{policy_name}` | `Collection` of `DpsPolicyStatsInternalData` |
| `Dps\DPS\GetDpsPolicyStatsHigherWindowRequest` | GET | `/datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats_higher_window/{policy_name}` | `Collection` of `DpsPolicyStatsHigherWindowInternalData` |
| `Dps\DPS\GetDpsSitePolicyStatsRequest` | GET | `/datapoints/v1/sdwan_site/site_policy_stats/{site_name}` | `Collection` of `DpsSitePolicyStatsInternalData` |

### Device Management: ActionCommand

`Aruba::classic()->deviceManagement()`

| Call | Returns |
|---|---|
| `Aruba::classic()->deviceManagement()->sendDisconnectUser($serial)` | `ActionCommand` or null (POST `/device_management/v1/device/{serial}/action/disconnect_user`) |
| `Aruba::classic()->deviceManagement()->sendSpeedTest($serial)` | `ActionCommand` or null (POST `/device_management/v1/device/{serial}/action/speedtest`) |
| `Aruba::classic()->deviceManagement()->sendCommandToDevice($serial, $command)` | `ActionCommand` or null (POST `/device_management/v1/device/{serial}/action/{command}`) |
| `Aruba::classic()->deviceManagement()->sendMultiLineCmd($serial, $command, $port)` | `ActionCommand` or null (POST `/device_management/v1/device/{serial}/action/{command}/port/{port}`) |
| `Aruba::classic()->deviceManagement()->delMdMmMapping($deviceSerial)` | status or null (DELETE `/device_management/v1/mobility_master/{device_serial}`) |
| `Aruba::classic()->deviceManagement()->getMdMmMapping($deviceSerial)` | `MobilityDeviceMMInfo` or null (GET `/device_management/v1/mobility_master/{device_serial}`) |
| `Aruba::classic()->deviceManagement()->staticMdMmAssign($deviceSerial, $mmName)` | the response as an array, or null (POST `/device_management/v1/mobility_master/{device_serial}/{mm_name}`) |
| `Aruba::classic()->deviceManagement()->getCommandStatus($taskId)` | `CommandStatus` or null (GET `/device_management/v1/status/{task_id}`) |
| `Aruba::classic()->deviceManagement()->sendCommandToSwarm($swarmId, $command)` | `ActionCommand` or null (POST `/device_management/v1/swarm/{swarm_id}/action/{command}`) |
| `Aruba::classic()->deviceManagement()->sendMultiLineCmdV2($serial, $command)` | `ActionCommand` or null (POST `/device_management/v2/device/{serial}/action/{command}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `DeviceManagement\ActionCommand\SendDisconnectUserRequest` | POST | `/device_management/v1/device/{serial}/action/disconnect_user` | `ActionCommand` or null |
| `DeviceManagement\ActionCommand\SendSpeedTestRequest` | POST | `/device_management/v1/device/{serial}/action/speedtest` | `ActionCommand` or null |
| `DeviceManagement\ActionCommand\SendCommandToDeviceRequest` | POST | `/device_management/v1/device/{serial}/action/{command}` | `ActionCommand` or null |
| `DeviceManagement\ActionCommand\SendMultiLineCmdRequest` | POST | `/device_management/v1/device/{serial}/action/{command}/port/{port}` | `ActionCommand` or null |
| `DeviceManagement\ActionCommand\DelMdMmMappingRequest` | DELETE | `/device_management/v1/mobility_master/{device_serial}` | array or null |
| `DeviceManagement\ActionCommand\GetMdMmMappingRequest` | GET | `/device_management/v1/mobility_master/{device_serial}` | `MobilityDeviceMMInfo` or null |
| `DeviceManagement\ActionCommand\StaticMdMmAssignRequest` | POST | `/device_management/v1/mobility_master/{device_serial}/{mm_name}` | array or null |
| `DeviceManagement\ActionCommand\GetCommandStatusRequest` | GET | `/device_management/v1/status/{task_id}` | `CommandStatus` or null |
| `DeviceManagement\ActionCommand\SendCommandToSwarmRequest` | POST | `/device_management/v1/swarm/{swarm_id}/action/{command}` | `ActionCommand` or null |
| `DeviceManagement\ActionCommand\SendMultiLineCmdV2Request` | POST | `/device_management/v2/device/{serial}/action/{command}` | `ActionCommand` or null |

### Device Replacement: Cancel Replacement

`Aruba::classic()->deviceReplacement()`

| Call | Returns |
|---|---|
| `Aruba::classic()->deviceReplacement()->handleCancelReplacement()` | `CancelReplacement` or null (POST `/v1/cancel_replacement`) |
| `Aruba::classic()->deviceReplacement()->handleCheckCompliance()` | `ComplianceCheck` or null (POST `/v1/check_compliance`) |
| `Aruba::classic()->deviceReplacement()->handleDevicesCount()` | `DeviceCount` or null (GET `/v1/device_count`) |
| `Aruba::classic()->deviceReplacement()->handleGetDeviceStatus($deviceSerial)` | `DeviceStatus` or null (GET `/v1/device_status`) |
| `Aruba::classic()->deviceReplacement()->handleDevicesUnderReplacement()` | `DevicesUnderReplacement` or null (GET `/v1/devices`) |
| `Aruba::classic()->deviceReplacement()->handleInitiateReplacement()` | `InitiateReplacement` or null (POST `/v1/initiate_replacement`) |
| `Aruba::classic()->deviceReplacement()->handleMspCustomers()` | `MspCustomers` or null (GET `/v1/msp_customers`) |
| `Aruba::classic()->deviceReplacement()->handleMspDevicesCount()` | `DeviceCount` or null (GET `/v1/msp_replacement_count`) |
| `Aruba::classic()->deviceReplacement()->handleMspReplacementDetails()` | `MspReplacementDetails` or null (GET `/v1/msp_replacement_details`) |
| `Aruba::classic()->deviceReplacement()->handleGetOfflineDevices()` | a builder over `OfflineDevicesItem` records (GET `/v1/offline_devices`) |
| `Aruba::classic()->deviceReplacement()->handleReplaceRequest()` | `RequestReplacement` or null (POST `/v1/request_replacement`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `DeviceReplacement\CancelReplacement\HandleCancelReplacementRequest` | POST | `/v1/cancel_replacement` | `CancelReplacement` or null |
| `DeviceReplacement\CancelReplacement\HandleCheckComplianceRequest` | POST | `/v1/check_compliance` | `ComplianceCheck` or null |
| `DeviceReplacement\CancelReplacement\HandleDevicesCountRequest` | GET | `/v1/device_count` | `DeviceCount` or null |
| `DeviceReplacement\CancelReplacement\HandleGetDeviceStatusRequest` | GET | `/v1/device_status` | `DeviceStatus` or null |
| `DeviceReplacement\CancelReplacement\HandleDevicesUnderReplacementRequest` | GET | `/v1/devices` | `DevicesUnderReplacement` or null |
| `DeviceReplacement\CancelReplacement\HandleInitiateReplacementRequest` | POST | `/v1/initiate_replacement` | `InitiateReplacement` or null |
| `DeviceReplacement\CancelReplacement\HandleMspCustomersRequest` | GET | `/v1/msp_customers` | `MspCustomers` or null |
| `DeviceReplacement\CancelReplacement\HandleMspDevicesCountRequest` | GET | `/v1/msp_replacement_count` | `DeviceCount` or null |
| `DeviceReplacement\CancelReplacement\HandleMspReplacementDetailsRequest` | GET | `/v1/msp_replacement_details` | `MspReplacementDetails` or null |
| `DeviceReplacement\CancelReplacement\HandleGetOfflineDevicesRequest` | GET | `/v1/offline_devices` | `Collection` of `OfflineDevicesItem` |
| `DeviceReplacement\CancelReplacement\HandleReplaceRequestRequest` | POST | `/v1/request_replacement` | `RequestReplacement` or null |

### Device Routing - BGP: Neighbor

`Aruba::classic()->routing()->bgp()`

| Call | Returns |
|---|---|
| `Aruba::classic()->routing()->bgp()` | a builder over `NeighborRespItem` records (GET `/routing/v1/bgp/neighbor`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->routing()->bgp()->getRoutingV1BgpNeighborDetail($device, $address)` | `NbrDetailsResp` or null (GET `/routing/v1/bgp/neighbor/detail`) |
| `Aruba::classic()->routing()->bgp()->putRoutingV1BgpNeighborReset($device, $address)` | the response as an array, or null (PUT `/routing/v1/bgp/neighbor/reset`) |
| `Aruba::classic()->routing()->bgp()->getRoutingV1BgpNeighborRouteAdvertised()` | a builder over `NbrRouteAdvtRespItem` records (GET `/routing/v1/bgp/neighbor/route/advertised`) |
| `Aruba::classic()->routing()->bgp()->getRoutingV1BgpNeighborRouteLearned()` | a builder over `NbrRouteLearnRespItem` records (GET `/routing/v1/bgp/neighbor/route/learned`) |
| `Aruba::classic()->routing()->bgp()->getRoutingV1BgpRoute()` | a builder over `RouteRespItem` records (GET `/routing/v1/bgp/route`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Routing\Neighbor\GetRoutingV1BgpNeighborRequest` | GET | `/routing/v1/bgp/neighbor` | `Collection` of `NeighborRespItem` |
| `Routing\Neighbor\GetRoutingV1BgpNeighborDetailRequest` | GET | `/routing/v1/bgp/neighbor/detail` | `NbrDetailsResp` or null |
| `Routing\Neighbor\PutRoutingV1BgpNeighborResetRequest` | PUT | `/routing/v1/bgp/neighbor/reset` | array or null |
| `Routing\Neighbor\GetRoutingV1BgpNeighborRouteAdvertisedRequest` | GET | `/routing/v1/bgp/neighbor/route/advertised` | `Collection` of `NbrRouteAdvtRespItem` |
| `Routing\Neighbor\GetRoutingV1BgpNeighborRouteLearnedRequest` | GET | `/routing/v1/bgp/neighbor/route/learned` | `Collection` of `NbrRouteLearnRespItem` |
| `Routing\Neighbor\GetRoutingV1BgpRouteRequest` | GET | `/routing/v1/bgp/route` | `Collection` of `RouteRespItem` |

### Device Routing - OSPF: Area

`Aruba::classic()->routing()->ospf()`

| Call | Returns |
|---|---|
| `Aruba::classic()->routing()->ospf()` | a builder over `AreaRespItem` records (GET `/routing/v1/ospf/area`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->routing()->ospf()->getRoutingV1OspfDatabase()` | a builder over `DatabaseRespItem` records (GET `/routing/v1/ospf/database`) |
| `Aruba::classic()->routing()->ospf()->getRoutingV1OspfInterface()` | a builder over `InterfaceRespItem` records (GET `/routing/v1/ospf/interface`) |
| `Aruba::classic()->routing()->ospf()->getRoutingV1OspfNeighbor()` | a builder over `NeighborRespItem` records (GET `/routing/v1/ospf/neighbor`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Routing\Area\GetRoutingV1OspfAreaRequest` | GET | `/routing/v1/ospf/area` | `Collection` of `AreaRespItem` |
| `Routing\Area\GetRoutingV1OspfDatabaseRequest` | GET | `/routing/v1/ospf/database` | `Collection` of `DatabaseRespItem` |
| `Routing\Area\GetRoutingV1OspfInterfaceRequest` | GET | `/routing/v1/ospf/interface` | `Collection` of `InterfaceRespItem` |
| `Routing\Area\GetRoutingV1OspfNeighborRequest` | GET | `/routing/v1/ospf/neighbor` | `Collection` of `NeighborRespItem` |

### Device Routing - Overlay: Connection

`Aruba::classic()->routing()->overlay()`

| Call | Returns |
|---|---|
| `Aruba::classic()->routing()->overlay()` | a builder over `ConnRespItem` records (GET `/routing/v1/overlay/connection`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->routing()->overlay()->putRoutingV1OverlayConnectionReset($device)` | the response as an array, or null (PUT `/routing/v1/overlay/connection/reset`) |
| `Aruba::classic()->routing()->overlay()->getRoutingV1OverlayInterface()` | a builder over `InterfaceRespItem` records (GET `/routing/v1/overlay/interface`) |
| `Aruba::classic()->routing()->overlay()->getRoutingV1OverlayRouteAdvertised()` | a builder over `AdvtRouteRespItem` records (GET `/routing/v1/overlay/route/advertised`) |
| `Aruba::classic()->routing()->overlay()->getRoutingV1OverlayRouteLearned()` | a builder over `RecvRouteRespItem` records (GET `/routing/v1/overlay/route/learned`) |
| `Aruba::classic()->routing()->overlay()->getRoutingV1OverlayRouteLearnedBest()` | a builder over `BestRecvRouteRespItem` records (GET `/routing/v1/overlay/route/learned/best`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Routing\Connection\GetRoutingV1OverlayConnectionRequest` | GET | `/routing/v1/overlay/connection` | `Collection` of `ConnRespItem` |
| `Routing\Connection\PutRoutingV1OverlayConnectionResetRequest` | PUT | `/routing/v1/overlay/connection/reset` | array or null |
| `Routing\Connection\GetRoutingV1OverlayInterfaceRequest` | GET | `/routing/v1/overlay/interface` | `Collection` of `InterfaceRespItem` |
| `Routing\Connection\GetRoutingV1OverlayRouteAdvertisedRequest` | GET | `/routing/v1/overlay/route/advertised` | `Collection` of `AdvtRouteRespItem` |
| `Routing\Connection\GetRoutingV1OverlayRouteLearnedRequest` | GET | `/routing/v1/overlay/route/learned` | `Collection` of `RecvRouteRespItem` |
| `Routing\Connection\GetRoutingV1OverlayRouteLearnedBestRequest` | GET | `/routing/v1/overlay/route/learned/best` | `Collection` of `BestRecvRouteRespItem` |

### Device Routing - RIP: Neighbor

`Aruba::classic()->routing()->rip()`

| Call | Returns |
|---|---|
| `Aruba::classic()->routing()->rip()` | a builder over `NeighborRespItem` records (GET `/routing/v1/rip/neighbor`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->routing()->rip()->getRoutingV1RipInterface()` | a builder over `InterfaceRespItem` records (GET `/routing/v1/rip/interface`) |
| `Aruba::classic()->routing()->rip()->getRoutingV1RipNeighborRoute()` | a builder over `NbrRouteRespItem` records (GET `/routing/v1/rip/neighbor/route`) |
| `Aruba::classic()->routing()->rip()->getRoutingV1RipRoute()` | a builder over `RouteRespItem` records (GET `/routing/v1/rip/route`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Routing\Neighbor\GetRoutingV1RipInterfaceRequest` | GET | `/routing/v1/rip/interface` | `Collection` of `InterfaceRespItem` |
| `Routing\Neighbor\GetRoutingV1RipNeighborRequest` | GET | `/routing/v1/rip/neighbor` | `Collection` of `NeighborRespItem` |
| `Routing\Neighbor\GetRoutingV1RipNeighborRouteRequest` | GET | `/routing/v1/rip/neighbor/route` | `Collection` of `NbrRouteRespItem` |
| `Routing\Neighbor\GetRoutingV1RipRouteRequest` | GET | `/routing/v1/rip/route` | `Collection` of `RouteRespItem` |

### Device Routing - RouteTable: Route

`Aruba::classic()->routing()->routes()`

| Call | Returns |
|---|---|
| `Aruba::classic()->routing()->routes()` | a builder over `RouteRespItem` records (GET `/routing/v0/route`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->routing()->routes()->getRoutingV1Route()` | a builder over `RouteRespItem` records (GET `/routing/v1/route`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Routing\Route\GetRoutingV0RouteRequest` | GET | `/routing/v0/route` | `Collection` of `RouteRespItem` |
| `Routing\Route\GetRoutingV1RouteRequest` | GET | `/routing/v1/route` | `Collection` of `RouteRespItem` |

### Firmware: Firmware Management

`Aruba::classic()->firmware()`

| Call | Returns |
|---|---|
| `Aruba::classic()->firmware()` | a builder over `FirmwareDeviceDetails` records (GET `/firmware/v1/devices`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->firmware()->getFirmwareModelFamiliesList()` | a builder over records as arrays (GET `/firmware/v1/models`) |
| `Aruba::classic()->firmware()->getTenantsDetails($tenantId, $deviceType)` | `Tenant` or null (GET `/firmware/v1/msp/tenants/{tenant_id}`) |
| `Aruba::classic()->firmware()->upgradeFirmwareMsp()` | the response as an array, or null (POST `/firmware/v1/msp/upgrade`) |
| `Aruba::classic()->firmware()->cancelUpgradeMsp()` | the response as an array, or null (POST `/firmware/v1/msp/upgrade/cancel`) |
| `Aruba::classic()->firmware()->deleteFirmwareComplianceMsp()` | the response as an array, or null (DELETE `/firmware/v1/msp/upgrade/compliance_version`) |
| `Aruba::classic()->firmware()->getFirmwareComplianceMsp($deviceType)` | `FirmwareComplianceResp` or null (GET `/firmware/v1/msp/upgrade/compliance_version`) |
| `Aruba::classic()->firmware()->setFirmwareComplianceMsp()` | the response as an array, or null (POST `/firmware/v1/msp/upgrade/compliance_version`) |
| `Aruba::classic()->firmware()->upgradeFirmwareCustomer($customerId)` | `UpgradeStatus` or null (POST `/firmware/v1/msp/upgrade/customers/{customer_id}`) |
| `Aruba::classic()->firmware()->cancelUpgradeCustomer($customerId)` | the response as an array, or null (POST `/firmware/v1/msp/upgrade/customers/{customer_id}/cancel`) |
| `Aruba::classic()->firmware()->deleteFirmwareComplianceMspTenant($customerId, $deviceType)` | status or null (DELETE `/firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version`) |
| `Aruba::classic()->firmware()->getFirmwareComplianceMspTenant($customerId, $deviceType)` | `FirmwareComplianceResp` or null (GET `/firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version`) |
| `Aruba::classic()->firmware()->setFirmwareComplianceMspTenant($customerId)` | the response as an array, or null (POST `/firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version`) |
| `Aruba::classic()->firmware()->getFirmwareStatus()` | `CommandStatus` or null (GET `/firmware/v1/status`) |
| `Aruba::classic()->firmware()->getSwarmsFirmwareDetails()` | a builder over `FirmwareSwarmDetails` records (GET `/firmware/v1/swarms`) |
| `Aruba::classic()->firmware()->getSwarmFirmwareDetails($swarmId)` | `FirmwareSwarmDetails` or null (GET `/firmware/v1/swarms/{swarm_id}`) |
| `Aruba::classic()->firmware()->upgradeFirmware()` | `UpgradeStatus` or null (POST `/firmware/v1/upgrade`) |
| `Aruba::classic()->firmware()->cancelUpgrade()` | `CancelUpgradeStatus` or null (POST `/firmware/v1/upgrade/cancel`) |
| `Aruba::classic()->firmware()->deleteFirmwareCompliance($deviceType)` | status or null (DELETE `/firmware/v1/upgrade/compliance_version`) |
| `Aruba::classic()->firmware()->getFirmwareCompliance($deviceType)` | `FirmwareComplianceResp` or null (GET `/firmware/v1/upgrade/compliance_version`) |
| `Aruba::classic()->firmware()->setFirmwareCompliance()` | `UpgradeStatus` or null (POST `/firmware/v1/upgrade/compliance_version`) |
| `Aruba::classic()->firmware()->getFirmwareVersionList()` | a builder over `FirmwareVersion` records (GET `/firmware/v1/versions`) |
| `Aruba::classic()->firmware()->isImageAvailable($firmwareVersion, $deviceType)` | `ImageAvailable` or null (GET `/firmware/v1/versions/{firmware_version}`) |
| `Aruba::classic()->firmware()->cancelUpgradeMspV2()` | the response as an array, or null (POST `/firmware/v2/msp/upgrade/cancel`) |
| `Aruba::classic()->firmware()->cancelUpgradeCustomerV2($customerId)` | the response as an array, or null (POST `/firmware/v2/msp/upgrade/customers/{customer_id}/cancel`) |
| `Aruba::classic()->firmware()->setFirmwareComplianceCustomer()` | the response as an array, or null (POST `/firmware/v2/upgrade/compliance_version`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Firmware\FirmwareManagement\GetDevicesFirmwareDetailsRequest` | GET | `/firmware/v1/devices` | `Collection` of `FirmwareDeviceDetails` |
| `Firmware\FirmwareManagement\GetDeviceFirmwareDetailsRequest` | GET | `/firmware/v1/devices/{serial}` | `FirmwareDeviceDetails` or null |
| `Firmware\FirmwareManagement\GetFirmwareModelFamiliesListRequest` | GET | `/firmware/v1/models` | `Collection` of arrays |
| `Firmware\FirmwareManagement\GetTenantsDetailsRequest` | GET | `/firmware/v1/msp/tenants/{tenant_id}` | `Tenant` or null |
| `Firmware\FirmwareManagement\UpgradeFirmwareMspRequest` | POST | `/firmware/v1/msp/upgrade` | array or null |
| `Firmware\FirmwareManagement\CancelUpgradeMspRequest` | POST | `/firmware/v1/msp/upgrade/cancel` | array or null |
| `Firmware\FirmwareManagement\DeleteFirmwareComplianceMspRequest` | DELETE | `/firmware/v1/msp/upgrade/compliance_version` | array or null |
| `Firmware\FirmwareManagement\GetFirmwareComplianceMspRequest` | GET | `/firmware/v1/msp/upgrade/compliance_version` | `FirmwareComplianceResp` or null |
| `Firmware\FirmwareManagement\SetFirmwareComplianceMspRequest` | POST | `/firmware/v1/msp/upgrade/compliance_version` | array or null |
| `Firmware\FirmwareManagement\UpgradeFirmwareCustomerRequest` | POST | `/firmware/v1/msp/upgrade/customers/{customer_id}` | `UpgradeStatus` or null |
| `Firmware\FirmwareManagement\CancelUpgradeCustomerRequest` | POST | `/firmware/v1/msp/upgrade/customers/{customer_id}/cancel` | array or null |
| `Firmware\FirmwareManagement\DeleteFirmwareComplianceMspTenantRequest` | DELETE | `/firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version` | array or null |
| `Firmware\FirmwareManagement\GetFirmwareComplianceMspTenantRequest` | GET | `/firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version` | `FirmwareComplianceResp` or null |
| `Firmware\FirmwareManagement\SetFirmwareComplianceMspTenantRequest` | POST | `/firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version` | array or null |
| `Firmware\FirmwareManagement\GetFirmwareStatusRequest` | GET | `/firmware/v1/status` | `CommandStatus` or null |
| `Firmware\FirmwareManagement\GetSwarmsFirmwareDetailsRequest` | GET | `/firmware/v1/swarms` | `Collection` of `FirmwareSwarmDetails` |
| `Firmware\FirmwareManagement\GetSwarmFirmwareDetailsRequest` | GET | `/firmware/v1/swarms/{swarm_id}` | `FirmwareSwarmDetails` or null |
| `Firmware\FirmwareManagement\UpgradeFirmwareRequest` | POST | `/firmware/v1/upgrade` | `UpgradeStatus` or null |
| `Firmware\FirmwareManagement\CancelUpgradeRequest` | POST | `/firmware/v1/upgrade/cancel` | `CancelUpgradeStatus` or null |
| `Firmware\FirmwareManagement\DeleteFirmwareComplianceRequest` | DELETE | `/firmware/v1/upgrade/compliance_version` | array or null |
| `Firmware\FirmwareManagement\GetFirmwareComplianceRequest` | GET | `/firmware/v1/upgrade/compliance_version` | `FirmwareComplianceResp` or null |
| `Firmware\FirmwareManagement\SetFirmwareComplianceRequest` | POST | `/firmware/v1/upgrade/compliance_version` | `UpgradeStatus` or null |
| `Firmware\FirmwareManagement\GetFirmwareVersionListRequest` | GET | `/firmware/v1/versions` | `Collection` of `FirmwareVersion` |
| `Firmware\FirmwareManagement\IsImageAvailableRequest` | GET | `/firmware/v1/versions/{firmware_version}` | `ImageAvailable` or null |
| `Firmware\FirmwareManagement\CancelUpgradeMspV2Request` | POST | `/firmware/v2/msp/upgrade/cancel` | array or null |
| `Firmware\FirmwareManagement\CancelUpgradeCustomerV2Request` | POST | `/firmware/v2/msp/upgrade/customers/{customer_id}/cancel` | array or null |
| `Firmware\FirmwareManagement\SetFirmwareComplianceCustomerRequest` | POST | `/firmware/v2/upgrade/compliance_version` | array or null |

### GDPR: GDPR

`Aruba::classic()->gdpr()`

| Call | Returns |
|---|---|
| `Aruba::classic()->gdpr()` | a builder over `GdprClient` records (GET `/gdpr/v1/opt_out_clients`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `delete()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Gdpr\GDPR\GetGdprsApiRequest` | GET | `/gdpr/v1/opt_out_clients` | `Collection` of `GdprClient` |
| `Gdpr\GDPR\AddGdprApiRequest` | POST | `/gdpr/v1/opt_out_clients` | `Gdpr` or null |
| `Gdpr\GDPR\DeleteGdprApiRequest` | DELETE | `/gdpr/v1/opt_out_clients/{mac}` | array or null |
| `Gdpr\GDPR\GetMacRequest` | GET | `/gdpr/v1/opt_out_clients/{mac}` | array or null |

### Guest: Portals

`Aruba::classic()->guest()->portals()`

| Call | Returns |
|---|---|
| `Aruba::classic()->guest()->portals()` | a builder over `PortalLimitedData` records (GET `/guest/v1/portals`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `replace()`, `delete()` |
| `Aruba::classic()->guest()->portals()->enabled()` | `GuestEnabled` or null (GET `/guest/v1/enabled`) |
| `Aruba::classic()->guest()->portals()->preview($portalId)` | `PreviewUrl` or null (GET `/guest/v1/portals/preview/{portal_id}`) |
| `Aruba::classic()->guest()->portals()->reprovision()` | `GuestReprovision` or null (POST `/guest/v1/reprovision`) |
| `Aruba::classic()->guest()->portals()->summary($days, $ssid)` | `GuestAccess` or null (GET `/guest/v1/summary`) |
| `Aruba::classic()->guest()->portals()->wifi4euStatus($langCode, $networkId)` | `Wifi4eu` or null (POST `/guest/v1/wifi4eu/lang_code/{lang_code}`) |
| `Aruba::classic()->guest()->portals()->wlans()` | a builder over `GuestWlan` records (GET `/guest/v1/wlans`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Guest\Portals\GetApiGuestEnabledRequest` | GET | `/guest/v1/enabled` | `GuestEnabled` or null |
| `Guest\Portals\GetApiPortalsRequest` | GET | `/guest/v1/portals` | `Collection` of `PortalLimitedData` |
| `Guest\Portals\CreateApiPortalRequest` | POST | `/guest/v1/portals` | `PortalId` or null |
| `Guest\Portals\PreviewApiPortalRequest` | GET | `/guest/v1/portals/preview/{portal_id}` | `PreviewUrl` or null |
| `Guest\Portals\DeleteApiPortalRequest` | DELETE | `/guest/v1/portals/{portal_id}` | array or null |
| `Guest\Portals\GetApiPortalRequest` | GET | `/guest/v1/portals/{portal_id}` | `Portal` or null |
| `Guest\Portals\UpdateApiPortalRequest` | PUT | `/guest/v1/portals/{portal_id}` | array or null |
| `Guest\Portals\GetApiGuestReProvisionRequest` | POST | `/guest/v1/reprovision` | `GuestReprovision` or null |
| `Guest\Portals\GetApiGuestStatisticsRequest` | GET | `/guest/v1/summary` | `GuestAccess` or null |
| `Guest\Portals\Wifi4euStatusRequest` | POST | `/guest/v1/wifi4eu/lang_code/{lang_code}` | `Wifi4eu` or null |
| `Guest\Portals\GetApiGuestWlansRequest` | GET | `/guest/v1/wlans` | `Collection` of `GuestWlan` |

### Guest: Sessions

`Aruba::classic()->guest()->sessions($portalId)`

| Call | Returns |
|---|---|
| `Aruba::classic()->guest()->sessions($portalId)` | a builder over `Session` records (GET `/guest/v1/portals/{portal_id}/sessions`): `get()`, `all()`, `first()`, `count()`, `lazy()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Guest\Sessions\GetApiSessionsRequest` | GET | `/guest/v1/portals/{portal_id}/sessions` | `Collection` of `Session` |

### Guest: Visitors

`Aruba::classic()->guest()->visitors($portalId)`

| Call | Returns |
|---|---|
| `Aruba::classic()->guest()->visitors($portalId)` | a builder over `Visitor` records (GET `/guest/v1/portals/{portal_id}/visitors`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `replace()`, `delete()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Guest\Visitors\GetApiVisitorsRequest` | GET | `/guest/v1/portals/{portal_id}/visitors` | `Collection` of `Visitor` |
| `Guest\Visitors\CreateApiVisitorRequest` | POST | `/guest/v1/portals/{portal_id}/visitors` | `VisitorId` or null |
| `Guest\Visitors\DeleteApiVisitorRequest` | DELETE | `/guest/v1/portals/{portal_id}/visitors/{visitor_id}` | array or null |
| `Guest\Visitors\GetApiVisitorRequest` | GET | `/guest/v1/portals/{portal_id}/visitors/{visitor_id}` | `Visitor` or null |
| `Guest\Visitors\UpdateApiVisitorRequest` | PUT | `/guest/v1/portals/{portal_id}/visitors/{visitor_id}` | array or null |

### Install Manager: Installer

`Aruba::classic()->installManager()`

| Call | Returns |
|---|---|
| `Aruba::classic()->installManager()->assignGroupToDeviceTypesInSites()` | the response as an array, or null (POST `/v1/assign_group_to_device_types_in_sites`) |
| `Aruba::classic()->installManager()->assignedGroupToSiteList()` | the response as an array, or null (GET `/v1/assigned_group_to_site_list`) |
| `Aruba::classic()->installManager()->deleteInstaller($id)` | status or null (DELETE `/v1/installer`) |
| `Aruba::classic()->installManager()->getInstallers()` | the response as an array, or null (GET `/v1/installer`) |
| `Aruba::classic()->installManager()->updateInstaller($id)` | the response as an array, or null (PATCH `/v1/installer`) |
| `Aruba::classic()->installManager()->inviteInstaller()` | the response as an array, or null (POST `/v1/invite_installer`) |
| `Aruba::classic()->installManager()->updateSiteStatus()` | the response as an array, or null (PATCH `/v1/update_site_status`) |
| `Aruba::classic()->installManager()->deleteQrCode($id)` | status or null (DELETE `/v1/vendor`) |
| `Aruba::classic()->installManager()->getAllQrCodes()` | the response as an array, or null (GET `/v1/vendor`) |
| `Aruba::classic()->installManager()->updateQrCode($id)` | the response as an array, or null (PATCH `/v1/vendor`) |
| `Aruba::classic()->installManager()->createQrCode()` | the response as an array, or null (POST `/v1/vendor`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `InstallManager\Installer\AssignGroupToDeviceTypesInSitesRequest` | POST | `/v1/assign_group_to_device_types_in_sites` | array or null |
| `InstallManager\Installer\AssignedGroupToSiteListRequest` | GET | `/v1/assigned_group_to_site_list` | array or null |
| `InstallManager\Installer\DeleteInstallerRequest` | DELETE | `/v1/installer` | array or null |
| `InstallManager\Installer\GetInstallersRequest` | GET | `/v1/installer` | array or null |
| `InstallManager\Installer\UpdateInstallerRequest` | PATCH | `/v1/installer` | array or null |
| `InstallManager\Installer\InviteInstallerRequest` | POST | `/v1/invite_installer` | array or null |
| `InstallManager\Installer\UpdateSiteStatusRequest` | PATCH | `/v1/update_site_status` | array or null |
| `InstallManager\Installer\DeleteQrCodeRequest` | DELETE | `/v1/vendor` | array or null |
| `InstallManager\Installer\GetAllQrCodesRequest` | GET | `/v1/vendor` | array or null |
| `InstallManager\Installer\UpdateQrCodeRequest` | PATCH | `/v1/vendor` | array or null |
| `InstallManager\Installer\CreateQrCodeRequest` | POST | `/v1/vendor` | array or null |

### IoT - App Developer Portal: Apps

`Aruba::classic()->iot()->apps()`

| Call | Returns |
|---|---|
| `Aruba::classic()->iot()->apps()->listAppsPublishedAndSuspended()` | `PageApps` or null (GET `/v1/adp/apps`) |
| `Aruba::classic()->iot()->apps()->listAppsDraft()` | `PageApps` or null (GET `/v1/adp/apps/draft`) |
| `Aruba::classic()->iot()->apps()->createDraftApp()` | `AppsDTO` or null (POST `/v1/adp/apps/draft`) |
| `Aruba::classic()->iot()->apps()->updateOrNewDraftAppVersion($appId, $version)` | `AppsDTO` or null (POST `/v1/adp/apps/draft/{app_id}/version/{version}`) |
| `Aruba::classic()->iot()->apps()->validateAppName($name)` | `ValidateAppNameDTO` or null (GET `/v1/adp/apps/name`) |
| `Aruba::classic()->iot()->apps()->deleteAppVersion()` | the response as an array, or null (DELETE `/v1/adp/apps/version`) |
| `Aruba::classic()->iot()->apps()->rejectPendingAppVersion()` | the response as an array, or null (POST `/v1/adp/apps/withdraw`) |
| `Aruba::classic()->iot()->apps()->getAppsVersionDetails($appId)` | `AppVersionDetailsDTO` or null (GET `/v1/adp/apps/{app_id}/details`) |
| `Aruba::classic()->iot()->apps()->newPendingAppVersion($appId, $version)` | the response as an array, or null (POST `/v1/adp/apps/{app_id}/version/{version}`) |
| `Aruba::classic()->iot()->apps()->listAppVersions($appId)` | `PageAppsVersions` or null (GET `/v1/adp/apps/{app_id}/versions`) |
| `Aruba::classic()->iot()->apps()->listImages()` | `PageImages` or null (GET `/v1/adp/images`) |
| `Aruba::classic()->iot()->apps()->createUploadRequest()` | `CreateUploadRequestResponseDTO` or null (POST `/v1/adp/images`) |
| `Aruba::classic()->iot()->apps()->listImagesForMaxVersion()` | `PageImages` or null (GET `/v1/adp/images/maxversion`) |
| `Aruba::classic()->iot()->apps()->validateImageName($name)` | `ValidateImageNameDTO` or null (GET `/v1/adp/images/validate`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Iot\Apps\ListAppsPublishedAndSuspendedRequest` | GET | `/v1/adp/apps` | `PageApps` or null |
| `Iot\Apps\ListAppsDraftRequest` | GET | `/v1/adp/apps/draft` | `PageApps` or null |
| `Iot\Apps\CreateDraftAppRequest` | POST | `/v1/adp/apps/draft` | `AppsDTO` or null |
| `Iot\Apps\UpdateOrNewDraftAppVersionRequest` | POST | `/v1/adp/apps/draft/{app_id}/version/{version}` | `AppsDTO` or null |
| `Iot\Apps\ValidateAppNameRequest` | GET | `/v1/adp/apps/name` | `ValidateAppNameDTO` or null |
| `Iot\Apps\DeleteAppVersionRequest` | DELETE | `/v1/adp/apps/version` | array or null |
| `Iot\Apps\RejectPendingAppVersionRequest` | POST | `/v1/adp/apps/withdraw` | array or null |
| `Iot\Apps\GetAppsVersionDetailsRequest` | GET | `/v1/adp/apps/{app_id}/details` | `AppVersionDetailsDTO` or null |
| `Iot\Apps\NewPendingAppVersionRequest` | POST | `/v1/adp/apps/{app_id}/version/{version}` | array or null |
| `Iot\Apps\ListAppVersionsRequest` | GET | `/v1/adp/apps/{app_id}/versions` | `PageAppsVersions` or null |
| `Iot\Apps\ListImagesRequest` | GET | `/v1/adp/images` | `PageImages` or null |
| `Iot\Apps\CreateUploadRequestRequest` | POST | `/v1/adp/images` | `CreateUploadRequestResponseDTO` or null |
| `Iot\Apps\ListImagesForMaxVersionRequest` | GET | `/v1/adp/images/maxversion` | `PageImages` or null |
| `Iot\Apps\ValidateImageNameRequest` | GET | `/v1/adp/images/validate` | `ValidateImageNameDTO` or null |

### IoT - Appstore: App Store

`Aruba::classic()->iot()->appStore()`

| Call | Returns |
|---|---|
| `Aruba::classic()->iot()->appStore()` | a builder over `App` records (GET `/v1/appstore/apps`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->iot()->appStore()->findAllInstalledApps()` | a builder over `App` records (GET `/v1/appstore/apps/installed`) |
| `Aruba::classic()->iot()->appStore()->countAllInstalledApps($collectorId)` | `AppInstalledCount` or null (GET `/v1/appstore/apps/installed/count`) |
| `Aruba::classic()->iot()->appStore()->getAppVersionHistory()` | a builder over `VersionHistory` records (GET `/v1/appstore/apps/versionhistory`) |
| `Aruba::classic()->iot()->appStore()->getAppIcon($appId)` | the response as an array, or null (GET `/v1/appstore/apps/{appId}/icon`) |
| `Aruba::classic()->iot()->appStore()->installApp($appId)` | `AppAPI` or null (POST `/v1/appstore/apps/{appId}/install`) |
| `Aruba::classic()->iot()->appStore()->editInstalledApp($appId)` | `AppAPI` or null (POST `/v1/appstore/apps/{appId}/install/edit`) |
| `Aruba::classic()->iot()->appStore()->uninstallApp($appId)` | `AppAPI` or null (DELETE `/v1/appstore/apps/{appId}/uninstall`) |
| `Aruba::classic()->iot()->appStore()->upgradeApp($appId)` | `AppAPI` or null (POST `/v1/appstore/apps/{appId}/upgrade`) |
| `Aruba::classic()->iot()->appStore()->developersSearchApps()` | a builder over `App` records (GET `/v1/appstore/developers/apps`) |
| `Aruba::classic()->iot()->appStore()->editDeveloperInstalledApp($appId)` | `AppAPI` or null (POST `/v1/appstore/developers/apps/{appId}/install/edit`) |
| `Aruba::classic()->iot()->appStore()->getDeveloperApp($appId, $version)` | `LicenseApplication` or null (GET `/v1/appstore/developers/apps/{appId}/versions/{version}`) |
| `Aruba::classic()->iot()->appStore()->getDeveloperAppIcon($appId, $version)` | the response as an array, or null (GET `/v1/appstore/developers/apps/{appId}/versions/{version}/icon`) |
| `Aruba::classic()->iot()->appStore()->installDeveloperApp($appId, $version)` | `AppAPI` or null (POST `/v1/appstore/developers/apps/{appId}/versions/{version}/install`) |
| `Aruba::classic()->iot()->appStore()->uninstallDeveloperApp($appId, $version)` | `AppAPI` or null (DELETE `/v1/appstore/developers/apps/{appId}/versions/{version}/uninstall`) |
| `Aruba::classic()->iot()->appStore()->upgradeDeveloperApp($appId, $version)` | `AppAPI` or null (POST `/v1/appstore/developers/apps/{appId}/versions/{version}/upgrade`) |
| `Aruba::classic()->iot()->appStore()->developerInfo()` | `DeveloperInfo` or null (GET `/v1/appstore/developers/info`) |
| `Aruba::classic()->iot()->appStore()->findAllRecommendedApps()` | a builder over `RecommendedApp` records (GET `/v1/appstore/recommendations`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Iot\AppStore\SearchAppsRequest` | GET | `/v1/appstore/apps` | `Collection` of `App` |
| `Iot\AppStore\FindAllInstalledAppsRequest` | GET | `/v1/appstore/apps/installed` | `Collection` of `App` |
| `Iot\AppStore\CountAllInstalledAppsRequest` | GET | `/v1/appstore/apps/installed/count` | `AppInstalledCount` or null |
| `Iot\AppStore\GetAppVersionHistoryRequest` | GET | `/v1/appstore/apps/versionhistory` | `Collection` of `VersionHistory` |
| `Iot\AppStore\GetAppRequest` | GET | `/v1/appstore/apps/{appId}` | `LicenseApplication` or null |
| `Iot\AppStore\GetAppIconRequest` | GET | `/v1/appstore/apps/{appId}/icon` | array or null |
| `Iot\AppStore\InstallAppRequest` | POST | `/v1/appstore/apps/{appId}/install` | `AppAPI` or null |
| `Iot\AppStore\EditInstalledAppRequest` | POST | `/v1/appstore/apps/{appId}/install/edit` | `AppAPI` or null |
| `Iot\AppStore\UninstallAppRequest` | DELETE | `/v1/appstore/apps/{appId}/uninstall` | `AppAPI` or null |
| `Iot\AppStore\UpgradeAppRequest` | POST | `/v1/appstore/apps/{appId}/upgrade` | `AppAPI` or null |
| `Iot\AppStore\DevelopersSearchAppsRequest` | GET | `/v1/appstore/developers/apps` | `Collection` of `App` |
| `Iot\AppStore\EditDeveloperInstalledAppRequest` | POST | `/v1/appstore/developers/apps/{appId}/install/edit` | `AppAPI` or null |
| `Iot\AppStore\GetDeveloperAppRequest` | GET | `/v1/appstore/developers/apps/{appId}/versions/{version}` | `LicenseApplication` or null |
| `Iot\AppStore\GetDeveloperAppIconRequest` | GET | `/v1/appstore/developers/apps/{appId}/versions/{version}/icon` | array or null |
| `Iot\AppStore\InstallDeveloperAppRequest` | POST | `/v1/appstore/developers/apps/{appId}/versions/{version}/install` | `AppAPI` or null |
| `Iot\AppStore\UninstallDeveloperAppRequest` | DELETE | `/v1/appstore/developers/apps/{appId}/versions/{version}/uninstall` | `AppAPI` or null |
| `Iot\AppStore\UpgradeDeveloperAppRequest` | POST | `/v1/appstore/developers/apps/{appId}/versions/{version}/upgrade` | `AppAPI` or null |
| `Iot\AppStore\DeveloperInfoRequest` | GET | `/v1/appstore/developers/info` | `DeveloperInfo` or null |
| `Iot\AppStore\FindAllRecommendedAppsRequest` | GET | `/v1/appstore/recommendations` | `Collection` of `RecommendedApp` |

### IoT - Device: Devices

`Aruba::classic()->iot()->devices()`

| Call | Returns |
|---|---|
| `Aruba::classic()->iot()->devices()` | a builder over `Device` records (GET `/v1/devices`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->iot()->devices()->getAllDevicesByAttribute()` | a builder over `Device` records (GET `/v1/devices/attribute`) |
| `Aruba::classic()->iot()->devices()->getDeviceClassifiedCount()` | `Count` or null (GET `/v1/devices/statistics/classified/count`) |
| `Aruba::classic()->iot()->devices()->getDeviceCount()` | `Count` or null (GET `/v1/devices/statistics/count`) |
| `Aruba::classic()->iot()->devices()->getDeviceClassifiedStatistics()` | `ClassifiedStatistics` or null (GET `/v1/devices/statistics/device_classes/count`) |
| `Aruba::classic()->iot()->devices()->getReportersCount()` | `Count` or null (GET `/v1/devices/statistics/reporters/count`) |
| `Aruba::classic()->iot()->devices()->getDeviceCountByType()` | `ClassifiedStatistics` or null (GET `/v1/devices/statistics/types/count`) |
| `Aruba::classic()->iot()->devices()->getDeviceCountByCollectorId()` | a builder over `Timeseries` records (GET `/v1/devices/timeseries/count_device`) |
| `Aruba::classic()->iot()->devices()->getDeviceAttributes($deviceId)` | a builder over `DeviceAttributes` records (GET `/v1/devices/{deviceId}/attributes`) |
| `Aruba::classic()->iot()->devices()->getDeviceTimeseriesMetrics($deviceId)` | a builder over `Timeseries` records (GET `/v1/devices/{deviceId}/timeseries`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Iot\Devices\GetAllDevicesRequest` | GET | `/v1/devices` | `Collection` of `Device` |
| `Iot\Devices\GetAllDevicesByAttributeRequest` | GET | `/v1/devices/attribute` | `Collection` of `Device` |
| `Iot\Devices\GetDeviceClassifiedCountRequest` | GET | `/v1/devices/statistics/classified/count` | `Count` or null |
| `Iot\Devices\GetDeviceCountRequest` | GET | `/v1/devices/statistics/count` | `Count` or null |
| `Iot\Devices\GetDeviceClassifiedStatisticsRequest` | GET | `/v1/devices/statistics/device_classes/count` | `ClassifiedStatistics` or null |
| `Iot\Devices\GetReportersCountRequest` | GET | `/v1/devices/statistics/reporters/count` | `Count` or null |
| `Iot\Devices\GetDeviceCountByTypeRequest` | GET | `/v1/devices/statistics/types/count` | `ClassifiedStatistics` or null |
| `Iot\Devices\GetDeviceCountByCollectorIdRequest` | GET | `/v1/devices/timeseries/count_device` | `Collection` of `Timeseries` |
| `Iot\Devices\GetDeviceRequest` | GET | `/v1/devices/{deviceId}` | `Device` or null |
| `Iot\Devices\GetDeviceAttributesRequest` | GET | `/v1/devices/{deviceId}/attributes` | `Collection` of `DeviceAttributes` |
| `Iot\Devices\GetDeviceTimeseriesMetricsRequest` | GET | `/v1/devices/{deviceId}/timeseries` | `Collection` of `Timeseries` |

### IoT - Iotgateway: iot_gateways

`Aruba::classic()->iot()->gateways()`

| Call | Returns |
|---|---|
| `Aruba::classic()->iot()->gateways()` | a builder over `IotGateway` records (GET `/v1/iot_gateways`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->iot()->gateways()->deleteAssociation()` | `ReporterConnAssocAddDeleteResp` or null (DELETE `/v1/iot_gateways/association`) |
| `Aruba::classic()->iot()->gateways()->getAllAssociation()` | a builder over `ReporterConnectorAssocResp` records (GET `/v1/iot_gateways/association`) |
| `Aruba::classic()->iot()->gateways()->addAssociation()` | `ReporterConnAssocAddDeleteResp` or null (POST `/v1/iot_gateways/association`) |
| `Aruba::classic()->iot()->gateways()->getAssociationForCollector($collectorId)` | `ReporterConnectorAssocResp` or null (GET `/v1/iot_gateways/association/collector/{collectorId}`) |
| `Aruba::classic()->iot()->gateways()->getAssociationTokenForCollector($collectorId)` | `CollectorAssociationTokenResp` or null (GET `/v1/iot_gateways/association/token/{collectorId}`) |
| `Aruba::classic()->iot()->gateways()->getGroupForConnector($connectorId)` | `GroupConnResp` or null (GET `/v1/iot_gateways/groups/connector/{connectorId}`) |
| `Aruba::classic()->iot()->gateways()->deleteGateway()` | `ResponseMsg` or null (DELETE `/v1/iot_gateways/groups/move`) |
| `Aruba::classic()->iot()->gateways()->move()` | `ResponseMsg` or null (POST `/v1/iot_gateways/groups/move`) |
| `Aruba::classic()->iot()->gateways()->getAllOnlineGateways()` | a builder over `IotGateway` records (GET `/v1/iot_gateways/online`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Iot\IotGateways\GetAllGatewaysRequest` | GET | `/v1/iot_gateways` | `Collection` of `IotGateway` |
| `Iot\IotGateways\DeleteAssociationRequest` | DELETE | `/v1/iot_gateways/association` | `ReporterConnAssocAddDeleteResp` or null |
| `Iot\IotGateways\GetAllAssociationRequest` | GET | `/v1/iot_gateways/association` | `Collection` of `ReporterConnectorAssocResp` |
| `Iot\IotGateways\AddAssociationRequest` | POST | `/v1/iot_gateways/association` | `ReporterConnAssocAddDeleteResp` or null |
| `Iot\IotGateways\GetAssociationForCollectorRequest` | GET | `/v1/iot_gateways/association/collector/{collectorId}` | `ReporterConnectorAssocResp` or null |
| `Iot\IotGateways\GetAssociationTokenForCollectorRequest` | GET | `/v1/iot_gateways/association/token/{collectorId}` | `CollectorAssociationTokenResp` or null |
| `Iot\IotGateways\GetGroupForConnectorRequest` | GET | `/v1/iot_gateways/groups/connector/{connectorId}` | `GroupConnResp` or null |
| `Iot\IotGateways\DeleteGatewayRequest` | DELETE | `/v1/iot_gateways/groups/move` | `ResponseMsg` or null |
| `Iot\IotGateways\MoveRequest` | POST | `/v1/iot_gateways/groups/move` | `ResponseMsg` or null |
| `Iot\IotGateways\GetAllOnlineGatewaysRequest` | GET | `/v1/iot_gateways/online` | `Collection` of `IotGateway` |
| `Iot\IotGateways\GetGatewayRequest` | GET | `/v1/iot_gateways/{id}` | `IotGateway` or null |

### IoT - Transport Profile: Transport Profile

`Aruba::classic()->iot()->transportProfiles()`

| Call | Returns |
|---|---|
| `Aruba::classic()->iot()->transportProfiles()` | a builder over `Profile` records (GET `/v1/transport_profiles`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `replace()`, `delete()` |
| `Aruba::classic()->iot()->transportProfiles()->countTransportProfiles()` | a builder over `ProfileCount` records (GET `/v1/transport_profiles/count`) |
| `Aruba::classic()->iot()->transportProfiles()->findDeviceClasses()` | `DeviceClassBucket` or null (GET `/v1/transport_profiles/device_classes`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Iot\TransportProfile\FindTransportProfilesRequest` | GET | `/v1/transport_profiles` | `Collection` of `Profile` |
| `Iot\TransportProfile\AddRequest` | POST | `/v1/transport_profiles` | `Profile` or null |
| `Iot\TransportProfile\CountTransportProfilesRequest` | GET | `/v1/transport_profiles/count` | `Collection` of `ProfileCount` |
| `Iot\TransportProfile\FindDeviceClassesRequest` | GET | `/v1/transport_profiles/device_classes` | `DeviceClassBucket` or null |
| `Iot\TransportProfile\DeleteTransportProfileRequest` | DELETE | `/v1/transport_profiles/{transportProfileId}` | array or null |
| `Iot\TransportProfile\GetRequest` | GET | `/v1/transport_profiles/{transportProfileId}` | `Profile` or null |
| `Iot\TransportProfile\SaveRequest` | PUT | `/v1/transport_profiles/{transportProfileId}` | `Profile` or null |

### MSP: Customers

`Aruba::classic()->msp()`

| Call | Returns |
|---|---|
| `Aruba::classic()->msp()` | a builder over `CustomersItem` records (GET `/msp_api/v1/customers`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `replace()`, `delete()` |
| `Aruba::classic()->msp()->getMspUsers()` | a builder over `User` records (GET `/msp_api/v1/customers/users`) |
| `Aruba::classic()->msp()->getCustomerDevices($customerId)` | `LicenseAndDevices` or null (GET `/msp_api/v1/customers/{customer_id}/devices`) |
| `Aruba::classic()->msp()->moveDevicesToCustomer($customerId)` | the response as an array, or null (PUT `/msp_api/v1/customers/{customer_id}/devices`) |
| `Aruba::classic()->msp()->getCustomerUsers($customerId)` | a builder over `User` records (GET `/msp_api/v1/customers/{customer_id}/users`) |
| `Aruba::classic()->msp()->getDevices()` | `LicenseAndDevices` or null (GET `/msp_api/v1/devices`) |
| `Aruba::classic()->msp()->getMappedTenants($groupName)` | a builder over `TenantsMappedItem` records (GET `/msp_api/v1/groups/{group_name}/customers`) |
| `Aruba::classic()->msp()->getResource()` | `Resource` or null (GET `/msp_api/v1/resource`) |
| `Aruba::classic()->msp()->editResource()` | the response as an array, or null (PUT `/msp_api/v1/resource`) |
| `Aruba::classic()->msp()->getCountryCode()` | `CountryCode` or null (GET `/msp_api/v2/get_country_code`) |
| `Aruba::classic()->msp()->unassignTenantDevices($customerId)` | the response as an array, or null (PUT `/msp_api/v2/{customer_id}/devices`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Msp\Customers\GetCustomersRequest` | GET | `/msp_api/v1/customers` | `Collection` of `CustomersItem` |
| `Msp\Customers\GetMspUsersRequest` | GET | `/msp_api/v1/customers/users` | `Collection` of `User` |
| `Msp\Customers\DeleteCustomerRequest` | DELETE | `/msp_api/v1/customers/{customer_id}` | array or null |
| `Msp\Customers\GetCustomerRequest` | GET | `/msp_api/v1/customers/{customer_id}` | `Collection` of `CustomerItem` |
| `Msp\Customers\GetCustomerDevicesRequest` | GET | `/msp_api/v1/customers/{customer_id}/devices` | `LicenseAndDevices` or null |
| `Msp\Customers\MoveDevicesToCustomerRequest` | PUT | `/msp_api/v1/customers/{customer_id}/devices` | array or null |
| `Msp\Customers\GetCustomerUsersRequest` | GET | `/msp_api/v1/customers/{customer_id}/users` | `Collection` of `User` |
| `Msp\Customers\GetDevicesRequest` | GET | `/msp_api/v1/devices` | `LicenseAndDevices` or null |
| `Msp\Customers\GetMappedTenantsRequest` | GET | `/msp_api/v1/groups/{group_name}/customers` | `Collection` of `TenantsMappedItem` |
| `Msp\Customers\GetResourceRequest` | GET | `/msp_api/v1/resource` | `Resource` or null |
| `Msp\Customers\EditResourceRequest` | PUT | `/msp_api/v1/resource` | array or null |
| `Msp\Customers\CreateCustomerRequest` | POST | `/msp_api/v2/customers` | array or null |
| `Msp\Customers\EditCustomerRequest` | PUT | `/msp_api/v2/customers/{customer_id}` | array or null |
| `Msp\Customers\GetCountryCodeRequest` | GET | `/msp_api/v2/get_country_code` | `CountryCode` or null |
| `Msp\Customers\UnassignTenantDevicesRequest` | PUT | `/msp_api/v2/{customer_id}/devices` | array or null |

### Monitoring: AP

`Aruba::classic()->monitoring()->accessPoints()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->accessPoints()` | a builder over `AP` records (GET `/monitoring/v2/aps`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `delete()` |
| `Aruba::classic()->monitoring()->accessPoints()->topByBandwidth()` | a builder over `TopNAp` records (GET `/monitoring/v2/aps/bandwidth_usage/topn`) |
| `Aruba::classic()->monitoring()->accessPoints()->bssids()` | a builder over `APBssid` records (GET `/monitoring/v2/bssids`) |
| `Aruba::classic()->monitoring()->accessPoints()->bandwidthUsage()` | a builder over `Bandwidth` records (GET `/monitoring/v3/aps/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->accessPoints()->rfSummary($serial)` | a builder over `RFSummary` records (GET `/monitoring/v3/aps/{serial}/rf_summary`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\AP\DeleteApRequest` | DELETE | `/monitoring/v1/aps/{serial}` | array or null |
| `Monitoring\AP\GetApRequest` | GET | `/monitoring/v1/aps/{serial}` | `APDetail` or null |
| `Monitoring\AP\GetApsRequest` | GET | `/monitoring/v2/aps` | `Collection` of `AP` |
| `Monitoring\AP\GetApsBandwidthUsageTopnRequest` | GET | `/monitoring/v2/aps/bandwidth_usage/topn` | `Collection` of `TopNAp` |
| `Monitoring\AP\GetBssidsRequest` | GET | `/monitoring/v2/bssids` | `Collection` of `APBssid` |
| `Monitoring\AP\GetApsBandwidthUsageRequest` | GET | `/monitoring/v3/aps/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\AP\GetApRfSummaryRequest` | GET | `/monitoring/v3/aps/{serial}/rf_summary` | `Collection` of `RFSummary` |

### Monitoring: Client

`Aruba::classic()->monitoring()->clients()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->clients()` | a builder over `UnifiedClient` records (GET `/monitoring/v2/clients`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->monitoring()->clients()->bandwidthUsage()` | a builder over `Bandwidth` records (GET `/monitoring/v1/clients/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->clients()->topByBandwidth()` | a builder over `TopNClient` records (GET `/monitoring/v1/clients/bandwidth_usage/topn`) |
| `Aruba::classic()->monitoring()->clients()->countTrend()` | a builder over `ClientCount` records (GET `/monitoring/v1/clients/count`) |
| `Aruba::classic()->monitoring()->clients()->wired()` | a builder over `WiredClient` records (GET `/monitoring/v1/clients/wired`) |
| `Aruba::classic()->monitoring()->clients()->wiredClient($macaddr)` | `WiredClientDetail` or null (GET `/monitoring/v1/clients/wired/{macaddr}`) |
| `Aruba::classic()->monitoring()->clients()->wireless()` | a builder over `Client` records (GET `/monitoring/v1/clients/wireless`) |
| `Aruba::classic()->monitoring()->clients()->wirelessClient($macaddr)` | `ClientDetail` or null (GET `/monitoring/v1/clients/wireless/{macaddr}`) |
| `Aruba::classic()->monitoring()->clients()->mobilityTrail($macaddr)` | a builder over `ClientMobilityTrailDetail` records (GET `/monitoring/v1/clients/wireless/{macaddr}/mobility_trail`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Client\GetClientsBandwidthUsageRequest` | GET | `/monitoring/v1/clients/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\Client\GetClientsBandwidthUsageTopnRequest` | GET | `/monitoring/v1/clients/bandwidth_usage/topn` | `Collection` of `TopNClient` |
| `Monitoring\Client\GetClientsCountRequest` | GET | `/monitoring/v1/clients/count` | `Collection` of `ClientCount` |
| `Monitoring\Client\GetWiredClientsRequest` | GET | `/monitoring/v1/clients/wired` | `Collection` of `WiredClient` |
| `Monitoring\Client\GetWiredClientRequest` | GET | `/monitoring/v1/clients/wired/{macaddr}` | `WiredClientDetail` or null |
| `Monitoring\Client\GetWirelessClientsRequest` | GET | `/monitoring/v1/clients/wireless` | `Collection` of `Client` |
| `Monitoring\Client\GetWirelessClientRequest` | GET | `/monitoring/v1/clients/wireless/{macaddr}` | `ClientDetail` or null |
| `Monitoring\Client\GetWirelessClientMobilityRequest` | GET | `/monitoring/v1/clients/wireless/{macaddr}/mobility_trail` | `Collection` of `ClientMobilityTrailDetail` |
| `Monitoring\Client\GetV2UnifiedClientsRequest` | GET | `/monitoring/v2/clients` | `Collection` of `UnifiedClient` |
| `Monitoring\Client\GetV2UnifiedClientDetailRequest` | GET | `/monitoring/v2/clients/{macaddr}` | `UnifiedClient` or null |

### Monitoring: Events

`Aruba::classic()->monitoring()->events()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->events()` | a builder over `EventV2` records (GET `/monitoring/v2/events`): `get()`, `all()`, `first()`, `count()`, `lazy()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Events\GetEventsRequest` | GET | `/monitoring/v2/events` | `Collection` of `EventV2` |

### Monitoring: Gateway

`Aruba::classic()->monitoring()->gateways()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->gateways()` | a builder over `MC` records (GET `/monitoring/v1/gateways`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `delete()` |
| `Aruba::classic()->monitoring()->gateways()->getGatewayDhcpClients($serial)` | a builder over `DHCPClientInfo` records (GET `/monitoring/v1/gateways/{serial}/dhcp_clients`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayDhcpPools($serial)` | a builder over `DHCPPoolInfo` records (GET `/monitoring/v1/gateways/{serial}/dhcp_pools`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayPorts($serial)` | a builder over `PortDetail` records (GET `/monitoring/v1/gateways/{serial}/ports`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayPortsBandwidthUsage($serial)` | a builder over `Bandwidth` records (GET `/monitoring/v1/gateways/{serial}/ports/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayPortErrors($serial)` | a builder over `GatewayPortErrors` records (GET `/monitoring/v1/gateways/{serial}/ports/errors`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayTunnels($serial)` | a builder over `TunnelDetail` records (GET `/monitoring/v1/gateways/{serial}/tunnels`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayUplinksTunnelStats($serial)` | a builder over `Bandwidth` records (GET `/monitoring/v1/gateways/{serial}/tunnels/stats`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayUplinksDetail($serial)` | a builder over `Uplink` records (GET `/monitoring/v1/gateways/{serial}/uplinks`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayUplinksBandwidthUsage($serial)` | a builder over `Bandwidth` records (GET `/monitoring/v1/gateways/{serial}/uplinks/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayUplinksDistribution($serial)` | a builder over `UplinksDistribution` records (GET `/monitoring/v1/gateways/{serial}/uplinks/distribution`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayUplinksWanCompressionUsage($serial)` | a builder over `WANCompressionStats` records (GET `/monitoring/v1/gateways/{serial}/uplinks/wan_compression_stats`) |
| `Aruba::classic()->monitoring()->gateways()->getGatewayVlanInfo($serial)` | a builder over `GatewayVLANInfoItem` records (GET `/monitoring/v1/gateways/{serial}/vlan`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Gateway\GetGatewaysRequest` | GET | `/monitoring/v1/gateways` | `Collection` of `MC` |
| `Monitoring\Gateway\DeleteGatewayRequest` | DELETE | `/monitoring/v1/gateways/{serial}` | array or null |
| `Monitoring\Gateway\GetGatewayRequest` | GET | `/monitoring/v1/gateways/{serial}` | `MCDetail` or null |
| `Monitoring\Gateway\GetGatewayDhcpClientsRequest` | GET | `/monitoring/v1/gateways/{serial}/dhcp_clients` | `Collection` of `DHCPClientInfo` |
| `Monitoring\Gateway\GetGatewayDhcpPoolsRequest` | GET | `/monitoring/v1/gateways/{serial}/dhcp_pools` | `Collection` of `DHCPPoolInfo` |
| `Monitoring\Gateway\GetGatewayPortsRequest` | GET | `/monitoring/v1/gateways/{serial}/ports` | `Collection` of `PortDetail` |
| `Monitoring\Gateway\GetGatewayPortsBandwidthUsageRequest` | GET | `/monitoring/v1/gateways/{serial}/ports/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\Gateway\GetGatewayPortErrorsRequest` | GET | `/monitoring/v1/gateways/{serial}/ports/errors` | `Collection` of `GatewayPortErrors` |
| `Monitoring\Gateway\GetGatewayTunnelsRequest` | GET | `/monitoring/v1/gateways/{serial}/tunnels` | `Collection` of `TunnelDetail` |
| `Monitoring\Gateway\GetGatewayUplinksTunnelStatsRequest` | GET | `/monitoring/v1/gateways/{serial}/tunnels/stats` | `Collection` of `Bandwidth` |
| `Monitoring\Gateway\GetGatewayUplinksDetailRequest` | GET | `/monitoring/v1/gateways/{serial}/uplinks` | `Collection` of `Uplink` |
| `Monitoring\Gateway\GetGatewayUplinksBandwidthUsageRequest` | GET | `/monitoring/v1/gateways/{serial}/uplinks/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\Gateway\GetGatewayUplinksDistributionRequest` | GET | `/monitoring/v1/gateways/{serial}/uplinks/distribution` | `Collection` of `UplinksDistribution` |
| `Monitoring\Gateway\GetGatewayUplinksWanCompressionUsageRequest` | GET | `/monitoring/v1/gateways/{serial}/uplinks/wan_compression_stats` | `Collection` of `WANCompressionStats` |
| `Monitoring\Gateway\GetGatewayVlanInfoRequest` | GET | `/monitoring/v1/gateways/{serial}/vlan` | `Collection` of `GatewayVLANInfoItem` |

### Monitoring: Label

`Aruba::classic()->monitoring()->labels()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->labels()` | a builder over `Label` records (GET `/central/v1/labels`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `Aruba::classic()->monitoring()->labels()->unassign()` | the response as an array, or null (DELETE `/central/v1/labels/associations`) |
| `Aruba::classic()->monitoring()->labels()->assign()` | the response as an array, or null (POST `/central/v1/labels/associations`) |
| `Aruba::classic()->monitoring()->labels()->categories()` | a builder over `LabelCategory` records (GET `/central/v1/labels/categories`) |
| `Aruba::classic()->monitoring()->labels()->defaults()` | a builder over `Label` records (GET `/central/v2/labels`) |
| `Aruba::classic()->monitoring()->labels()->unassignFromDevices()` | `BulkAssociation` or null (DELETE `/central/v2/labels/associations`) |
| `Aruba::classic()->monitoring()->labels()->assignToDevices()` | `BulkAssociation` or null (POST `/central/v2/labels/associations`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Label\GetLabelsRequest` | GET | `/central/v1/labels` | `Collection` of `Label` |
| `Monitoring\Label\CreateLabelRequest` | POST | `/central/v1/labels` | `Label` or null |
| `Monitoring\Label\UnassignLabelRequest` | DELETE | `/central/v1/labels/associations` | array or null |
| `Monitoring\Label\AssignLabelRequest` | POST | `/central/v1/labels/associations` | array or null |
| `Monitoring\Label\GetLabelCategoriesRequest` | GET | `/central/v1/labels/categories` | `Collection` of `LabelCategory` |
| `Monitoring\Label\DeleteLabelRequest` | DELETE | `/central/v1/labels/{label_id}` | array or null |
| `Monitoring\Label\GetLabelRequest` | GET | `/central/v1/labels/{label_id}` | `Label` or null |
| `Monitoring\Label\UpdateLabelRequest` | PATCH | `/central/v1/labels/{label_id}` | `Label` or null |
| `Monitoring\Label\GetDefaultLabelsRequest` | GET | `/central/v2/labels` | `Collection` of `Label` |
| `Monitoring\Label\UnassignLabelFromDevicesRequest` | DELETE | `/central/v2/labels/associations` | `BulkAssociation` or null |
| `Monitoring\Label\AssignLabelToDevicesRequest` | POST | `/central/v2/labels/associations` | `BulkAssociation` or null |

### Monitoring: MobilityController

`Aruba::classic()->monitoring()->mobilityControllers()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->mobilityControllers()` | a builder over `MC` records (GET `/monitoring/v2/mobility_controllers`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `delete()` |
| `Aruba::classic()->monitoring()->mobilityControllers()->getMcPorts($serial)` | a builder over `PortDetail` records (GET `/monitoring/v1/mobility_controllers/{serial}/ports`) |
| `Aruba::classic()->monitoring()->mobilityControllers()->getMcPortsBandwidthUsage($serial)` | a builder over `Bandwidth` records (GET `/monitoring/v1/mobility_controllers/{serial}/ports/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->mobilityControllers()->getVlanInfo($serial)` | a builder over `GatewayVLANInfoItem` records (GET `/monitoring/v1/mobility_controllers/{serial}/vlan`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\MobilityController\GetMcPortsRequest` | GET | `/monitoring/v1/mobility_controllers/{serial}/ports` | `Collection` of `PortDetail` |
| `Monitoring\MobilityController\GetMcPortsBandwidthUsageRequest` | GET | `/monitoring/v1/mobility_controllers/{serial}/ports/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\MobilityController\GetVlanInfoRequest` | GET | `/monitoring/v1/mobility_controllers/{serial}/vlan` | `Collection` of `GatewayVLANInfoItem` |
| `Monitoring\MobilityController\GetMcsRequest` | GET | `/monitoring/v2/mobility_controllers` | `Collection` of `MC` |
| `Monitoring\MobilityController\DeleteMcRequest` | DELETE | `/monitoring/v2/mobility_controllers/{serial}` | array or null |
| `Monitoring\MobilityController\GetMcRequest` | GET | `/monitoring/v2/mobility_controllers/{serial}` | `MCDetail` or null |

### Monitoring: Network

`Aruba::classic()->monitoring()->networks()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->networks()` | a builder over `NetworkRecord` records (GET `/monitoring/v2/networks`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->monitoring()->networks()->bandwidthUsage()` | a builder over `Bandwidth` records (GET `/monitoring/v2/networks/bandwidth_usage`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Network\GetNetworksRequest` | GET | `/monitoring/v2/networks` | `Collection` of `NetworkRecord` |
| `Monitoring\Network\GetNetworksBandwidthUsageRequest` | GET | `/monitoring/v2/networks/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\Network\GetNetworkRequest` | GET | `/monitoring/v2/networks/{network_name}` | `NetworkRecord` or null |

### Monitoring: Site

`Aruba::classic()->monitoring()->sites()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->sites()` | a builder over `Site` records (GET `/central/v2/sites`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `Aruba::classic()->monitoring()->sites()->unassign()` | the response as an array, or null (DELETE `/central/v2/sites/associate`) |
| `Aruba::classic()->monitoring()->sites()->assign()` | the response as an array, or null (POST `/central/v2/sites/associate`) |
| `Aruba::classic()->monitoring()->sites()->unassignFromDevices()` | `BulkSiteAssociation` or null (DELETE `/central/v2/sites/associations`) |
| `Aruba::classic()->monitoring()->sites()->assignToDevices()` | `BulkSiteAssociation` or null (POST `/central/v2/sites/associations`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Site\GetSitesRequest` | GET | `/central/v2/sites` | `Collection` of `Site` |
| `Monitoring\Site\CreateSiteRequest` | POST | `/central/v2/sites` | `Site` or null |
| `Monitoring\Site\UnassignSiteRequest` | DELETE | `/central/v2/sites/associate` | array or null |
| `Monitoring\Site\AssignSiteRequest` | POST | `/central/v2/sites/associate` | array or null |
| `Monitoring\Site\UnassignSiteFromDevicesRequest` | DELETE | `/central/v2/sites/associations` | `BulkSiteAssociation` or null |
| `Monitoring\Site\AssignSiteToDevicesRequest` | POST | `/central/v2/sites/associations` | `BulkSiteAssociation` or null |
| `Monitoring\Site\DeleteSiteRequest` | DELETE | `/central/v2/sites/{site_id}` | array or null |
| `Monitoring\Site\GetSiteRequest` | GET | `/central/v2/sites/{site_id}` | `Site` or null |
| `Monitoring\Site\UpdateSiteRequest` | PATCH | `/central/v2/sites/{site_id}` | `Site` or null |

### Monitoring: Swarm

`Aruba::classic()->monitoring()->swarms()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->swarms()` | a builder over `Swarm` records (GET `/monitoring/v1/swarms`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->monitoring()->swarms()->topByBandwidth()` | a builder over `TopNSwarm` records (GET `/monitoring/v1/swarms/bandwidth_usage/topn`) |
| `Aruba::classic()->monitoring()->swarms()->topByClientCount()` | a builder over `TopNSwarmClients` records (GET `/monitoring/v1/swarms/clients_count/topn`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Swarm\GetSwarmsRequest` | GET | `/monitoring/v1/swarms` | `Collection` of `Swarm` |
| `Monitoring\Swarm\GetSwarmsBandwidthUsageTopnRequest` | GET | `/monitoring/v1/swarms/bandwidth_usage/topn` | `Collection` of `TopNSwarm` |
| `Monitoring\Swarm\GetSwarmsClientsCountTopnRequest` | GET | `/monitoring/v1/swarms/clients_count/topn` | `Collection` of `TopNSwarmClients` |
| `Monitoring\Swarm\GetSwarmRequest` | GET | `/monitoring/v1/swarms/{swarm_id}` | `Swarm` or null |

### Monitoring: Switch

`Aruba::classic()->monitoring()->switches()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->switches()` | a builder over `SwitchListSingle` records (GET `/monitoring/v1/switches`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `delete()` |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchStackNeighbors($stackId)` | a builder over `DeviceNeighborsRootItem` records (GET `/monitoring/v1/cx_switch_stacks/{stack_id}/neighbors`) |
| `Aruba::classic()->monitoring()->switches()->getCxStackPorts($stackId)` | `CXStackPortList` or null (GET `/monitoring/v1/cx_switch_stacks/{stack_id}/ports`) |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchStackVlan($stackId)` | a builder over `CXSwitchStackVlanItem` records (GET `/monitoring/v1/cx_switch_stacks/{stack_id}/vlan`) |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchNeighbors($serial)` | a builder over `DeviceNeighborsRootItem` records (GET `/monitoring/v1/cx_switches/{serial}/neighbors`) |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchPoeDetail($serial, $port)` | `CXPortPoeInfo` or null (GET `/monitoring/v1/cx_switches/{serial}/poe_detail`) |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchPoeDetailsForAllPorts($serial)` | `CXSwitchPortsPoeList` or null (GET `/monitoring/v1/cx_switches/{serial}/poe_details`) |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchPorts($serial)` | a builder over `CXPortDetail` records (GET `/monitoring/v1/cx_switches/{serial}/ports`) |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchPortsBandwidthUsage($serial)` | a builder over `Bandwidth` records (GET `/monitoring/v1/cx_switches/{serial}/ports/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->switches()->getCxPortsErrors($serial)` | a builder over `Errors` records (GET `/monitoring/v1/cx_switches/{serial}/ports/errors`) |
| `Aruba::classic()->monitoring()->switches()->getCxSwitchVlan($serial)` | a builder over `CXSwitchStackVlanItem` records (GET `/monitoring/v1/cx_switches/{serial}/vlan`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchVsxDetail($serial)` | `VSXInfo` or null (GET `/monitoring/v1/cx_switches/{serial}/vsx`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchStacks()` | a builder over `StackDetail` records (GET `/monitoring/v1/switch_stacks`) |
| `Aruba::classic()->monitoring()->switches()->deleteSwitchStack($stackId)` | status or null (DELETE `/monitoring/v1/switch_stacks/{stack_id}`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchStack($stackId)` | `StackDetail` or null (GET `/monitoring/v1/switch_stacks/{stack_id}`) |
| `Aruba::classic()->monitoring()->switches()->getStackPorts($stackId)` | a builder over `SWPortDetail` records (GET `/monitoring/v1/switch_stacks/{stack_id}/ports`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchStackVlan($stackId)` | a builder over `SwitchStackVlanItem` records (GET `/monitoring/v1/switch_stacks/{stack_id}/vlan`) |
| `Aruba::classic()->monitoring()->switches()->bandwidthUsage()` | a builder over `Bandwidth` records (GET `/monitoring/v1/switches/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->switches()->topByBandwidth()` | a builder over `TopNSwitch` records (GET `/monitoring/v1/switches/bandwidth_usage/topn`) |
| `Aruba::classic()->monitoring()->switches()->getChassisInfo($serial)` | `ChassisInfo` or null (GET `/monitoring/v1/switches/{serial}/chassis_info`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchPoeDetail($serial)` | `PortPoeInfo` or null (GET `/monitoring/v1/switches/{serial}/poe_detail`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchPoeDetailsForAllPorts($serial)` | `SwitchPortsPoeList` or null (GET `/monitoring/v1/switches/{serial}/poe_details`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchPorts($serial)` | a builder over `SWPortDetail` records (GET `/monitoring/v1/switches/{serial}/ports`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchPortsBandwidthUsage($serial)` | a builder over `Bandwidth` records (GET `/monitoring/v1/switches/{serial}/ports/bandwidth_usage`) |
| `Aruba::classic()->monitoring()->switches()->getPortsErrors($serial)` | a builder over `Errors` records (GET `/monitoring/v1/switches/{serial}/ports/errors`) |
| `Aruba::classic()->monitoring()->switches()->getSwitchVlan($serial)` | a builder over `SwitchStackVlanItem` records (GET `/monitoring/v1/switches/{serial}/vlan`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\Switch\GetCxSwitchStackNeighborsRequest` | GET | `/monitoring/v1/cx_switch_stacks/{stack_id}/neighbors` | `Collection` of `DeviceNeighborsRootItem` |
| `Monitoring\Switch\GetCxStackPortsRequest` | GET | `/monitoring/v1/cx_switch_stacks/{stack_id}/ports` | `CXStackPortList` or null |
| `Monitoring\Switch\GetCxSwitchStackVlanRequest` | GET | `/monitoring/v1/cx_switch_stacks/{stack_id}/vlan` | `Collection` of `CXSwitchStackVlanItem` |
| `Monitoring\Switch\GetCxSwitchNeighborsRequest` | GET | `/monitoring/v1/cx_switches/{serial}/neighbors` | `Collection` of `DeviceNeighborsRootItem` |
| `Monitoring\Switch\GetCxSwitchPoeDetailRequest` | GET | `/monitoring/v1/cx_switches/{serial}/poe_detail` | `CXPortPoeInfo` or null |
| `Monitoring\Switch\GetCxSwitchPoeDetailsForAllPortsRequest` | GET | `/monitoring/v1/cx_switches/{serial}/poe_details` | `CXSwitchPortsPoeList` or null |
| `Monitoring\Switch\GetCxSwitchPortsRequest` | GET | `/monitoring/v1/cx_switches/{serial}/ports` | `Collection` of `CXPortDetail` |
| `Monitoring\Switch\GetCxSwitchPortsBandwidthUsageRequest` | GET | `/monitoring/v1/cx_switches/{serial}/ports/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\Switch\GetCxPortsErrorsRequest` | GET | `/monitoring/v1/cx_switches/{serial}/ports/errors` | `Collection` of `Errors` |
| `Monitoring\Switch\GetCxSwitchVlanRequest` | GET | `/monitoring/v1/cx_switches/{serial}/vlan` | `Collection` of `CXSwitchStackVlanItem` |
| `Monitoring\Switch\GetSwitchVsxDetailRequest` | GET | `/monitoring/v1/cx_switches/{serial}/vsx` | `VSXInfo` or null |
| `Monitoring\Switch\GetSwitchStacksRequest` | GET | `/monitoring/v1/switch_stacks` | `Collection` of `StackDetail` |
| `Monitoring\Switch\DeleteSwitchStackRequest` | DELETE | `/monitoring/v1/switch_stacks/{stack_id}` | array or null |
| `Monitoring\Switch\GetSwitchStackRequest` | GET | `/monitoring/v1/switch_stacks/{stack_id}` | `StackDetail` or null |
| `Monitoring\Switch\GetStackPortsRequest` | GET | `/monitoring/v1/switch_stacks/{stack_id}/ports` | `Collection` of `SWPortDetail` |
| `Monitoring\Switch\GetSwitchStackVlanRequest` | GET | `/monitoring/v1/switch_stacks/{stack_id}/vlan` | `Collection` of `SwitchStackVlanItem` |
| `Monitoring\Switch\GetSwitchesRequest` | GET | `/monitoring/v1/switches` | `Collection` of `SwitchListSingle` |
| `Monitoring\Switch\GetBandwidthUsageRequest` | GET | `/monitoring/v1/switches/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\Switch\GetBandwidthUsageTopnRequest` | GET | `/monitoring/v1/switches/bandwidth_usage/topn` | `Collection` of `TopNSwitch` |
| `Monitoring\Switch\DeleteSwitchRequest` | DELETE | `/monitoring/v1/switches/{serial}` | array or null |
| `Monitoring\Switch\GetSwitchRequest` | GET | `/monitoring/v1/switches/{serial}` | `SwitchDetail` or null |
| `Monitoring\Switch\GetChassisInfoRequest` | GET | `/monitoring/v1/switches/{serial}/chassis_info` | `ChassisInfo` or null |
| `Monitoring\Switch\GetSwitchPoeDetailRequest` | GET | `/monitoring/v1/switches/{serial}/poe_detail` | `PortPoeInfo` or null |
| `Monitoring\Switch\GetSwitchPoeDetailsForAllPortsRequest` | GET | `/monitoring/v1/switches/{serial}/poe_details` | `SwitchPortsPoeList` or null |
| `Monitoring\Switch\GetSwitchPortsRequest` | GET | `/monitoring/v1/switches/{serial}/ports` | `Collection` of `SWPortDetail` |
| `Monitoring\Switch\GetSwitchPortsBandwidthUsageRequest` | GET | `/monitoring/v1/switches/{serial}/ports/bandwidth_usage` | `Collection` of `Bandwidth` |
| `Monitoring\Switch\GetPortsErrorsRequest` | GET | `/monitoring/v1/switches/{serial}/ports/errors` | `Collection` of `Errors` |
| `Monitoring\Switch\GetSwitchVlanRequest` | GET | `/monitoring/v1/switches/{serial}/vlan` | `Collection` of `SwitchStackVlanItem` |

### Monitoring: VPN

`Aruba::classic()->monitoring()->vpn()`

| Call | Returns |
|---|---|
| `Aruba::classic()->monitoring()->vpn()` | a builder over `VpnTunnel` records (GET `/monitoring/v1/vpn/info`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->monitoring()->vpn()->getVpnUsage()` | `BandwidthList` or null (POST `/monitoring/v3/vpn/usage`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Monitoring\VPN\GetVpnInfoRequest` | GET | `/monitoring/v1/vpn/info` | `Collection` of `VpnTunnel` |
| `Monitoring\VPN\GetVpnUsageRequest` | POST | `/monitoring/v3/vpn/usage` | `BandwidthList` or null |

### Network Health: Network Health

`Aruba::classic()->networkHealth()`

| Call | Returns |
|---|---|
| `Aruba::classic()->networkHealth()` | a builder over `Site` records (GET `/branchhealth/v1/site`): `get()`, `all()`, `first()`, `count()`, `lazy()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `NetworkHealth\NetworkHealth\GetSitesApiRequest` | GET | `/branchhealth/v1/site` | `Collection` of `Site` |

### New Device Inventory: Devices

`Aruba::classic()->deviceInventory()`

| Call | Returns |
|---|---|
| `Aruba::classic()->deviceInventory()` | a builder over `DevicesResponseItem` records (GET `/platform/device_inventory/v1/devices`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)` |
| `Aruba::classic()->deviceInventory()->remove()` | the response as an array, or null (DELETE `/platform/device_inventory/v1/devices`) |
| `Aruba::classic()->deviceInventory()->add()` | the response as an array, or null (POST `/platform/device_inventory/v1/devices`) |
| `Aruba::classic()->deviceInventory()->archived()` | a builder over `ArchiveDeviceListModel` records (GET `/platform/device_inventory/v1/devices/archive`) |
| `Aruba::classic()->deviceInventory()->archive()` | the response as an array, or null (POST `/platform/device_inventory/v1/devices/archive`) |
| `Aruba::classic()->deviceInventory()->stats($skuType, $serviceType)` | `DevicesStatsData` or null (GET `/platform/device_inventory/v1/devices/stats`) |
| `Aruba::classic()->deviceInventory()->unarchive()` | the response as an array, or null (POST `/platform/device_inventory/v1/devices/unarchive`) |
| `Aruba::classic()->deviceInventory()->verify()` | `InlineResponse200` or null (POST `/platform/device_inventory/v1/devices/verify`) |
| `Aruba::classic()->deviceInventory()->mspDevices()` | a builder over `LicenseAndDevicesItem` records (GET `/platform/device_inventory/v1/msp/devices`) |
| `Aruba::classic()->deviceInventory()->mspCustomerDevices($customerId)` | a builder over `LicenseAndDevicesItem` records (GET `/platform/device_inventory/v1/msp/{customer_id}/devices`) |
| `Aruba::classic()->deviceInventory()->assignToCustomer($customerId)` | the response as an array, or null (PUT `/platform/device_inventory/v1/msp/{customer_id}/devices`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `DeviceInventory\Devices\GetDeviceRequest` | GET | `/platform/device_inventory/v1/device/{serial}` | `DeviceData` or null |
| `DeviceInventory\Devices\DeleteDeviceRequest` | DELETE | `/platform/device_inventory/v1/devices` | array or null |
| `DeviceInventory\Devices\GetDevicesRequest` | GET | `/platform/device_inventory/v1/devices` | `Collection` of `DevicesResponseItem` |
| `DeviceInventory\Devices\AddDeviceRequest` | POST | `/platform/device_inventory/v1/devices` | array or null |
| `DeviceInventory\Devices\GetArchiveDevicesRequest` | GET | `/platform/device_inventory/v1/devices/archive` | `Collection` of `ArchiveDeviceListModel` |
| `DeviceInventory\Devices\ArchiveDevicesRequest` | POST | `/platform/device_inventory/v1/devices/archive` | array or null |
| `DeviceInventory\Devices\GetDevicesStatsRequest` | GET | `/platform/device_inventory/v1/devices/stats` | `DevicesStatsData` or null |
| `DeviceInventory\Devices\UnarchiveDevicesRequest` | POST | `/platform/device_inventory/v1/devices/unarchive` | array or null |
| `DeviceInventory\Devices\VerifyDeviceAdditionRequest` | POST | `/platform/device_inventory/v1/devices/verify` | `InlineResponse200` or null |
| `DeviceInventory\Devices\GetMspDevicesRequest` | GET | `/platform/device_inventory/v1/msp/devices` | `Collection` of `LicenseAndDevicesItem` |
| `DeviceInventory\Devices\GetMspCustomerDevicesRequest` | GET | `/platform/device_inventory/v1/msp/{customer_id}/devices` | `Collection` of `LicenseAndDevicesItem` |
| `DeviceInventory\Devices\AssignDeviceToCustomerRequest` | PUT | `/platform/device_inventory/v1/msp/{customer_id}/devices` | array or null |

### New Licensing: Subscriptions

`Aruba::classic()->licensing()`

| Call | Returns |
|---|---|
| `Aruba::classic()->licensing()` | a builder over `SubscriptionResponseItem` records (GET `/platform/licensing/v1/subscriptions`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->licensing()->apigwLicenseAvailable($service)` | `LicenseAvailableAgainstDevices` or null (GET `/platform/licensing/v1/autolicensing/services/{service}/status`) |
| `Aruba::classic()->licensing()->apigwDisableAutoLicensingSettings()` | the response as an array, or null (DELETE `/platform/licensing/v1/customer/settings/autolicense`) |
| `Aruba::classic()->licensing()->apigwGetAutolicenseSettings()` | a builder over records as arrays (GET `/platform/licensing/v1/customer/settings/autolicense`) |
| `Aruba::classic()->licensing()->apigwEnableAutoLicensingSettings()` | the response as an array, or null (POST `/platform/licensing/v1/customer/settings/autolicense`) |
| `Aruba::classic()->licensing()->apigwMspDisableAutoLicensingSettings()` | the response as an array, or null (DELETE `/platform/licensing/v1/msp/customer/settings/autolicense`) |
| `Aruba::classic()->licensing()->apigwMspGetAutolicenseSettings()` | a builder over records as arrays (GET `/platform/licensing/v1/msp/customer/settings/autolicense`) |
| `Aruba::classic()->licensing()->apigwMspEnableAutoLicensingSettings()` | the response as an array, or null (POST `/platform/licensing/v1/msp/customer/settings/autolicense`) |
| `Aruba::classic()->licensing()->mspUnassignSubscriptionAllDevices()` | the response as an array, or null (DELETE `/platform/licensing/v1/msp/subscriptions/devices/all`) |
| `Aruba::classic()->licensing()->mspAssignSubscriptionAllDevices()` | the response as an array, or null (POST `/platform/licensing/v1/msp/subscriptions/devices/all`) |
| `Aruba::classic()->licensing()->getServicesConfig()` | `ServicesConfig` or null (GET `/platform/licensing/v1/services/config`) |
| `Aruba::classic()->licensing()->apigwGetCustomerEnabledServices()` | a builder over records as arrays (GET `/platform/licensing/v1/services/enabled`) |
| `Aruba::classic()->licensing()->apigwAssignLicenses()` | the response as an array, or null (POST `/platform/licensing/v1/subscriptions/assign`) |
| `Aruba::classic()->licensing()->unassignSubscriptionAllDevices()` | the response as an array, or null (DELETE `/platform/licensing/v1/subscriptions/devices/all`) |
| `Aruba::classic()->licensing()->assignSubscriptionAllDevices()` | the response as an array, or null (POST `/platform/licensing/v1/subscriptions/devices/all`) |
| `Aruba::classic()->licensing()->getSubscriptionStats()` | `SubscriptionStatsData` or null (GET `/platform/licensing/v1/subscriptions/stats`) |
| `Aruba::classic()->licensing()->apigwUnassignLicenses()` | the response as an array, or null (POST `/platform/licensing/v1/subscriptions/unassign`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Licensing\Subscriptions\ApigwLicenseAvailableRequest` | GET | `/platform/licensing/v1/autolicensing/services/{service}/status` | `LicenseAvailableAgainstDevices` or null |
| `Licensing\Subscriptions\ApigwDisableAutoLicensingSettingsRequest` | DELETE | `/platform/licensing/v1/customer/settings/autolicense` | array or null |
| `Licensing\Subscriptions\ApigwGetAutolicenseSettingsRequest` | GET | `/platform/licensing/v1/customer/settings/autolicense` | `Collection` of arrays |
| `Licensing\Subscriptions\ApigwEnableAutoLicensingSettingsRequest` | POST | `/platform/licensing/v1/customer/settings/autolicense` | array or null |
| `Licensing\Subscriptions\ApigwMspDisableAutoLicensingSettingsRequest` | DELETE | `/platform/licensing/v1/msp/customer/settings/autolicense` | array or null |
| `Licensing\Subscriptions\ApigwMspGetAutolicenseSettingsRequest` | GET | `/platform/licensing/v1/msp/customer/settings/autolicense` | `Collection` of arrays |
| `Licensing\Subscriptions\ApigwMspEnableAutoLicensingSettingsRequest` | POST | `/platform/licensing/v1/msp/customer/settings/autolicense` | array or null |
| `Licensing\Subscriptions\MspUnassignSubscriptionAllDevicesRequest` | DELETE | `/platform/licensing/v1/msp/subscriptions/devices/all` | array or null |
| `Licensing\Subscriptions\MspAssignSubscriptionAllDevicesRequest` | POST | `/platform/licensing/v1/msp/subscriptions/devices/all` | array or null |
| `Licensing\Subscriptions\GetServicesConfigRequest` | GET | `/platform/licensing/v1/services/config` | `ServicesConfig` or null |
| `Licensing\Subscriptions\ApigwGetCustomerEnabledServicesRequest` | GET | `/platform/licensing/v1/services/enabled` | `Collection` of arrays |
| `Licensing\Subscriptions\GetUserSubscriptionsRequest` | GET | `/platform/licensing/v1/subscriptions` | `Collection` of `SubscriptionResponseItem` |
| `Licensing\Subscriptions\ApigwAssignLicensesRequest` | POST | `/platform/licensing/v1/subscriptions/assign` | array or null |
| `Licensing\Subscriptions\UnassignSubscriptionAllDevicesRequest` | DELETE | `/platform/licensing/v1/subscriptions/devices/all` | array or null |
| `Licensing\Subscriptions\AssignSubscriptionAllDevicesRequest` | POST | `/platform/licensing/v1/subscriptions/devices/all` | array or null |
| `Licensing\Subscriptions\GetSubscriptionStatsRequest` | GET | `/platform/licensing/v1/subscriptions/stats` | `SubscriptionStatsData` or null |
| `Licensing\Subscriptions\ApigwUnassignLicensesRequest` | POST | `/platform/licensing/v1/subscriptions/unassign` | array or null |

### Notification: Settings

`Aruba::classic()->notifications()`

| Call | Returns |
|---|---|
| `Aruba::classic()->notifications()` | a builder over `Notification` records (GET `/central/v1/notifications`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->notifications()->acknowledgeMany()` | the response as an array, or null (POST `/central/v1/notifications`) |
| `Aruba::classic()->notifications()->countBySeverity()` | a builder over `CountSeverity` records (GET `/central/v1/notifications/count_by_severity`) |
| `Aruba::classic()->notifications()->customerSettings()` | `CustomerSettings` or null (GET `/central/v1/notifications/customer_settings`) |
| `Aruba::classic()->notifications()->updateCustomerSettings()` | the response as an array, or null (PUT `/central/v1/notifications/customer_settings`) |
| `Aruba::classic()->notifications()->settings()` | a builder over `Settings` records (GET `/central/v1/notifications/settings`) |
| `Aruba::classic()->notifications()->addSetting()` | `SettingsResponse` or null (POST `/central/v1/notifications/settings`) |
| `Aruba::classic()->notifications()->deleteSetting($settingsId)` | status or null (DELETE `/central/v1/notifications/settings/{settings_id}`) |
| `Aruba::classic()->notifications()->updateSetting($settingsId)` | `SettingsResponse` or null (PUT `/central/v1/notifications/settings/{settings_id}`) |
| `Aruba::classic()->notifications()->types()` | a builder over `Type` records (GET `/central/v1/notifications/types`) |
| `Aruba::classic()->notifications()->acknowledge($notificationId)` | the response as an array, or null (PATCH `/central/v1/notifications/{notification_id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Notifications\Settings\GetNotificationsApiRequest` | GET | `/central/v1/notifications` | `Collection` of `Notification` |
| `Notifications\Settings\AcknowledgeNotificationsRequest` | POST | `/central/v1/notifications` | array or null |
| `Notifications\Settings\GetCountBySeverityApiRequest` | GET | `/central/v1/notifications/count_by_severity` | `Collection` of `CountSeverity` |
| `Notifications\Settings\GetCustomerSettingsApiRequest` | GET | `/central/v1/notifications/customer_settings` | `CustomerSettings` or null |
| `Notifications\Settings\UpdateCustomerSettingsApiRequest` | PUT | `/central/v1/notifications/customer_settings` | array or null |
| `Notifications\Settings\GetSettingsApiRequest` | GET | `/central/v1/notifications/settings` | `Collection` of `Settings` |
| `Notifications\Settings\AddSettingApiRequest` | POST | `/central/v1/notifications/settings` | `SettingsResponse` or null |
| `Notifications\Settings\DeleteSettingApiRequest` | DELETE | `/central/v1/notifications/settings/{settings_id}` | array or null |
| `Notifications\Settings\UpdateSettingApiRequest` | PUT | `/central/v1/notifications/settings/{settings_id}` | `SettingsResponse` or null |
| `Notifications\Settings\GetTypesApiRequest` | GET | `/central/v1/notifications/types` | `Collection` of `Type` |
| `Notifications\Settings\AcknowledgeNotificationRequest` | PATCH | `/central/v1/notifications/{notification_id}` | array or null |

### Presence Analytics: Config

`Aruba::classic()->presence()`

| Call | Returns |
|---|---|
| `Aruba::classic()->presence()->getV3LoyaltyTrends()` | a builder over `LoyaltyDataPoints` records (GET `/presence/v3/analytics/trends/loyal_visitors`) |
| `Aruba::classic()->presence()->getDashboardV3PercentileDatapoints()` | a builder over `DataPointsV3Item` records (GET `/presence/v3/analytics/trends/passerby_visitors`) |
| `Aruba::classic()->presence()->getPresenceV3Thresholds()` | `V2Thresholds` or null (GET `/presence/v3/config/thresholds`) |
| `Aruba::classic()->presence()->setPresenceV3Thresholds()` | the response as an array, or null (POST `/presence/v3/config/thresholds`) |
| `Aruba::classic()->presence()->getPresenceSiteWiseData()` | a builder over `SiteanalyticsListData` records (GET `/presence/v3/insights/sites/aggregates`) |
| `Aruba::classic()->presence()->getPaLicenseStatus()` | `LicenseStatus` or null (GET `/presence/v3/license`) |
| `Aruba::classic()->presence()->enableOrDisablePaLicense()` | the response as an array, or null (POST `/presence/v3/license`) |
| `Aruba::classic()->presence()->getPaConfigData()` | a builder over `ConfigData` records (GET `/presence/v3/sites/config`) |
| `Aruba::classic()->presence()->getDeviceLicenseStatusPerSite()` | a builder over `DeviceLicenseStatus` records (GET `/presence/v3/sites/devicelicense`) |
| `Aruba::classic()->presence()->getLoyaltyVisitFrequency()` | a builder over `CategoryValueV3` records (GET `/presence/v3/visit_frequency`) |
| `Aruba::classic()->presence()->getVisitorsStatusInfo($startTime, $endTime)` | `ConnectedVisitorStatus` or null (GET `/presence/v3/visitor_status`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Presence\Config\GetV3LoyaltyTrendsRequest` | GET | `/presence/v3/analytics/trends/loyal_visitors` | `Collection` of `LoyaltyDataPoints` |
| `Presence\Config\GetDashboardV3PercentileDatapointsRequest` | GET | `/presence/v3/analytics/trends/passerby_visitors` | `Collection` of `DataPointsV3Item` |
| `Presence\Config\GetPresenceV3ThresholdsRequest` | GET | `/presence/v3/config/thresholds` | `V2Thresholds` or null |
| `Presence\Config\SetPresenceV3ThresholdsRequest` | POST | `/presence/v3/config/thresholds` | array or null |
| `Presence\Config\GetPresenceSiteWiseDataRequest` | GET | `/presence/v3/insights/sites/aggregates` | `Collection` of `SiteanalyticsListData` |
| `Presence\Config\GetPaLicenseStatusRequest` | GET | `/presence/v3/license` | `LicenseStatus` or null |
| `Presence\Config\EnableOrDisablePaLicenseRequest` | POST | `/presence/v3/license` | array or null |
| `Presence\Config\GetPaConfigDataRequest` | GET | `/presence/v3/sites/config` | `Collection` of `ConfigData` |
| `Presence\Config\GetDeviceLicenseStatusPerSiteRequest` | GET | `/presence/v3/sites/devicelicense` | `Collection` of `DeviceLicenseStatus` |
| `Presence\Config\GetLoyaltyVisitFrequencyRequest` | GET | `/presence/v3/visit_frequency` | `Collection` of `CategoryValueV3` |
| `Presence\Config\GetVisitorsStatusInfoRequest` | GET | `/presence/v3/visitor_status` | `ConnectedVisitorStatus` or null |

### RAPIDS: Rogues

`Aruba::classic()->rapids()`

| Call | Returns |
|---|---|
| `Aruba::classic()->rapids()->getRapidsV1InterferingAps()` | a builder over `InterferingAp` records (GET `/rapids/v1/interfering_aps`) |
| `Aruba::classic()->rapids()->getRapidsV1ManuallyContainedAps()` | a builder over `ManuallyContainedAp` records (GET `/rapids/v1/manually_contained_aps`) |
| `Aruba::classic()->rapids()->getRapidsV1NeighborAps()` | a builder over `NeighborAp` records (GET `/rapids/v1/neighbor_aps`) |
| `Aruba::classic()->rapids()->getRapidsV1RogueAps()` | a builder over `RogueAp` records (GET `/rapids/v1/rogue_aps`) |
| `Aruba::classic()->rapids()->getRapidsV1SuspectAps()` | a builder over `SuspectAp` records (GET `/rapids/v1/suspect_aps`) |
| `Aruba::classic()->rapids()->getClientAttacks()` | a builder over `ClientAttack` records (GET `/rapids/v1/wids/client_attacks`) |
| `Aruba::classic()->rapids()->getWidsEvents()` | a builder over `WidsEvent` records (GET `/rapids/v1/wids/events`) |
| `Aruba::classic()->rapids()->getInfrastructureAttacks()` | a builder over `InfrastructureAttack` records (GET `/rapids/v1/wids/infrastructure_attacks`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Rapids\Rogues\GetRapidsV1InterferingApsRequest` | GET | `/rapids/v1/interfering_aps` | `Collection` of `InterferingAp` |
| `Rapids\Rogues\GetRapidsV1ManuallyContainedApsRequest` | GET | `/rapids/v1/manually_contained_aps` | `Collection` of `ManuallyContainedAp` |
| `Rapids\Rogues\GetRapidsV1NeighborApsRequest` | GET | `/rapids/v1/neighbor_aps` | `Collection` of `NeighborAp` |
| `Rapids\Rogues\GetRapidsV1RogueApsRequest` | GET | `/rapids/v1/rogue_aps` | `Collection` of `RogueAp` |
| `Rapids\Rogues\GetRapidsV1SuspectApsRequest` | GET | `/rapids/v1/suspect_aps` | `Collection` of `SuspectAp` |
| `Rapids\Rogues\GetClientAttacksRequest` | GET | `/rapids/v1/wids/client_attacks` | `Collection` of `ClientAttack` |
| `Rapids\Rogues\GetWidsEventsRequest` | GET | `/rapids/v1/wids/events` | `Collection` of `WidsEvent` |
| `Rapids\Rogues\GetInfrastructureAttacksRequest` | GET | `/rapids/v1/wids/infrastructure_attacks` | `Collection` of `InfrastructureAttack` |

### Reporting: Reports

`Aruba::classic()->reports()`

| Call | Returns |
|---|---|
| `Aruba::classic()->reports()->generatedReports($cid)` | a builder over `ApiExternalApiGeneratedReportsItem` records (GET `/reports/api/v1/{cid}/generated`) |
| `Aruba::classic()->reports()->scheduledReports($cid)` | a builder over `ApiExternalApiScheduledReportsItem` records (GET `/reports/api/v1/{cid}/scheduled`) |
| `Aruba::classic()->reports()->getSdwanWanPolicyCompliance($period, $resultOrder, $count)` | `ResponseFramework` or null (GET `/sdwan-mon-api/external/noc/reports/wan/policy-compliance`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Reports\Reports\GeneratedReportsRequest` | GET | `/reports/api/v1/{cid}/generated` | `Collection` of `ApiExternalApiGeneratedReportsItem` |
| `Reports\Reports\ScheduledReportsRequest` | GET | `/reports/api/v1/{cid}/scheduled` | `Collection` of `ApiExternalApiScheduledReportsItem` |
| `Reports\Reports\GetSdwanWanPolicyComplianceRequest` | GET | `/sdwan-mon-api/external/noc/reports/wan/policy-compliance` | `ResponseFramework` or null |

### SSO Configuration: SSO Support

`Aruba::classic()->sso()`

| Call | Returns |
|---|---|
| `Aruba::classic()->sso()` | a builder over `DomainsItem` records (GET `/platform/aaa_config/v2/authentication/idp/source`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `create()`, `delete()` |
| `Aruba::classic()->sso()->updateIdpConfig()` | the response as an array, or null (PUT `/platform/aaa_config/v2/authentication/idp/source`) |
| `Aruba::classic()->sso()->extractMetadata()` | `SamlIdpConfig` or null (POST `/platform/aaa_config/v2/authentication/idp/source/extract/metadata`) |
| `Aruba::classic()->sso()->getMetadata($domain)` | `GetIdpConfig` or null (GET `/platform/aaa_config/v2/authentication/profiles/metadata/{domain}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Sso\SSOSupport\GetDomainListRequest` | GET | `/platform/aaa_config/v2/authentication/idp/source` | `Collection` of `DomainsItem` |
| `Sso\SSOSupport\AddAuthenticationSourceRequest` | POST | `/platform/aaa_config/v2/authentication/idp/source` | array or null |
| `Sso\SSOSupport\UpdateIdpConfigRequest` | PUT | `/platform/aaa_config/v2/authentication/idp/source` | array or null |
| `Sso\SSOSupport\ExtractMetadataRequest` | POST | `/platform/aaa_config/v2/authentication/idp/source/extract/metadata` | `SamlIdpConfig` or null |
| `Sso\SSOSupport\DeleteDomainRequest` | DELETE | `/platform/aaa_config/v2/authentication/idp/source/{domain}` | array or null |
| `Sso\SSOSupport\GetMetadataRequest` | GET | `/platform/aaa_config/v2/authentication/profiles/metadata/{domain}` | `GetIdpConfig` or null |

### Topology: Topology

`Aruba::classic()->topology()`

| Call | Returns |
|---|---|
| `Aruba::classic()->topology()->displayTopologyApNeighbors($deviceSerial)` | `NeighborDetails` or null (GET `/topology_external_api/apNeighbors/{device_serial}`) |
| `Aruba::classic()->topology()->displayTopologyDevices($deviceSerial)` | `DeviceDetails` or null (GET `/topology_external_api/devices/{device_serial}`) |
| `Aruba::classic()->topology()->displayTopologyEdges($sourceSerial, $destSerial)` | `EdgeResponseDetails` or null (GET `/topology_external_api/edges/{source_serial}/{dest_serial}`) |
| `Aruba::classic()->topology()->displayGetTunnel($siteId, $tunnelMapNames)` | `TunnelResponseDetails` or null (GET `/topology_external_api/tunnels/{site_id}`) |
| `Aruba::classic()->topology()->displayTopologyUplinks($sourceSerial, $uplinkId)` | `UplinkResponseDetails` or null (GET `/topology_external_api/uplinks/{source_serial}/{uplink_id}`) |
| `Aruba::classic()->topology()->displayTopologyEdgesV2($sourceSerial, $destSerial)` | `EdgeResponseDetails` or null (GET `/topology_external_api/v2/edges/{source_serial}/{dest_serial}`) |
| `Aruba::classic()->topology()->displayTopologyVlans($siteId)` | a builder over `VlanObjectSchema` records (GET `/topology_external_api/vlans/{site_id}`) |
| `Aruba::classic()->topology()->displayTopology($siteId)` | `TopologyDetails` or null (GET `/topology_external_api/{site_id}`) |
| `Aruba::classic()->topology()->displayTopologyExpiringDevices($siteId)` | `UnreachableDeviceList` or null (GET `/unreachableDevices/{site_id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Topology\Topology\DisplayTopologyApNeighborsRequest` | GET | `/topology_external_api/apNeighbors/{device_serial}` | `NeighborDetails` or null |
| `Topology\Topology\DisplayTopologyDevicesRequest` | GET | `/topology_external_api/devices/{device_serial}` | `DeviceDetails` or null |
| `Topology\Topology\DisplayTopologyEdgesRequest` | GET | `/topology_external_api/edges/{source_serial}/{dest_serial}` | `EdgeResponseDetails` or null |
| `Topology\Topology\DisplayGetTunnelRequest` | GET | `/topology_external_api/tunnels/{site_id}` | `TunnelResponseDetails` or null |
| `Topology\Topology\DisplayTopologyUplinksRequest` | GET | `/topology_external_api/uplinks/{source_serial}/{uplink_id}` | `UplinkResponseDetails` or null |
| `Topology\Topology\DisplayTopologyEdgesV2Request` | GET | `/topology_external_api/v2/edges/{source_serial}/{dest_serial}` | `EdgeResponseDetails` or null |
| `Topology\Topology\DisplayTopologyVlansRequest` | GET | `/topology_external_api/vlans/{site_id}` | `Collection` of `VlanObjectSchema` |
| `Topology\Topology\DisplayTopologyRequest` | GET | `/topology_external_api/{site_id}` | `TopologyDetails` or null |
| `Topology\Topology\DisplayTopologyExpiringDevicesRequest` | GET | `/unreachableDevices/{site_id}` | `UnreachableDeviceList` or null |

### Troubleshooting: Troubleshooting

`Aruba::classic()->troubleshooting()`

| Call | Returns |
|---|---|
| `Aruba::classic()->troubleshooting()->sendEnrollPkiCertificateSwitch($serial)` | `ActionCommand` or null (POST `/tools/action_cmd/device/{serial}/enroll_est_cert`) |
| `Aruba::classic()->troubleshooting()->getCommandsList()` | a builder over `Command` records (GET `/troubleshooting/v1/commands`) |
| `Aruba::classic()->troubleshooting()->getCxcommandsList()` | a builder over records as arrays (GET `/troubleshooting/v1/cxcommands`) |
| `Aruba::classic()->troubleshooting()->startCxTroubleshoot($serial)` | `TroubleshootResp` or null (POST `/troubleshooting/v1/cxdevices/{serial}`) |
| `Aruba::classic()->troubleshooting()->clearTroubleshootingSession($serial, $sessionId)` | status or null (DELETE `/troubleshooting/v1/devices/{serial}`) |
| `Aruba::classic()->troubleshooting()->getTroubleshootOutput($serial, $sessionId)` | `TroubleshootOutput` or null (GET `/troubleshooting/v1/devices/{serial}`) |
| `Aruba::classic()->troubleshooting()->startTroubleshoot($serial)` | `TroubleshootResp` or null (POST `/troubleshooting/v1/devices/{serial}`) |
| `Aruba::classic()->troubleshooting()->getSessionId($serial)` | `TroubleshootSessionId` or null (GET `/troubleshooting/v1/devices/{serial}/session`) |
| `Aruba::classic()->troubleshooting()->postRunningConfigBackupGroupName($groupName, $prefix)` | `RunningConfig` or null (POST `/troubleshooting/v1/running-config-backup/group_name/{group_name}/prefix/{prefix}`) |
| `Aruba::classic()->troubleshooting()->getRunningConfigBackupWithName($name)` | `RunningConfigBackupOutput` or null (GET `/troubleshooting/v1/running-config-backup/name/{name}`) |
| `Aruba::classic()->troubleshooting()->getNamedBackupsForSerial($serial)` | a builder over `RunningConfigListItem` records (GET `/troubleshooting/v1/running-config-backup/serial/{serial}`) |
| `Aruba::classic()->troubleshooting()->getNamedBackupsForSerialPrefix($serial, $prefix)` | a builder over `RunningConfigListItem` records (GET `/troubleshooting/v1/running-config-backup/serial/{serial}/prefix/{prefix}`) |
| `Aruba::classic()->troubleshooting()->postRunningConfigBackupSerial($serial, $prefix)` | `RunningConfig` or null (POST `/troubleshooting/v1/running-config-backup/serial/{serial}/prefix/{prefix}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Troubleshooting\Troubleshooting\SendEnrollPkiCertificateSwitchRequest` | POST | `/tools/action_cmd/device/{serial}/enroll_est_cert` | `ActionCommand` or null |
| `Troubleshooting\Troubleshooting\GetCommandsListRequest` | GET | `/troubleshooting/v1/commands` | `Collection` of `Command` |
| `Troubleshooting\Troubleshooting\GetCxcommandsListRequest` | GET | `/troubleshooting/v1/cxcommands` | `Collection` of arrays |
| `Troubleshooting\Troubleshooting\StartCxTroubleshootRequest` | POST | `/troubleshooting/v1/cxdevices/{serial}` | `TroubleshootResp` or null |
| `Troubleshooting\Troubleshooting\ClearTroubleshootingSessionRequest` | DELETE | `/troubleshooting/v1/devices/{serial}` | array or null |
| `Troubleshooting\Troubleshooting\GetTroubleshootOutputRequest` | GET | `/troubleshooting/v1/devices/{serial}` | `TroubleshootOutput` or null |
| `Troubleshooting\Troubleshooting\StartTroubleshootRequest` | POST | `/troubleshooting/v1/devices/{serial}` | `TroubleshootResp` or null |
| `Troubleshooting\Troubleshooting\GetSessionIdRequest` | GET | `/troubleshooting/v1/devices/{serial}/session` | `TroubleshootSessionId` or null |
| `Troubleshooting\Troubleshooting\PostRunningConfigBackupGroupNameRequest` | POST | `/troubleshooting/v1/running-config-backup/group_name/{group_name}/prefix/{prefix}` | `RunningConfig` or null |
| `Troubleshooting\Troubleshooting\GetRunningConfigBackupWithNameRequest` | GET | `/troubleshooting/v1/running-config-backup/name/{name}` | `RunningConfigBackupOutput` or null |
| `Troubleshooting\Troubleshooting\GetNamedBackupsForSerialRequest` | GET | `/troubleshooting/v1/running-config-backup/serial/{serial}` | `Collection` of `RunningConfigListItem` |
| `Troubleshooting\Troubleshooting\GetNamedBackupsForSerialPrefixRequest` | GET | `/troubleshooting/v1/running-config-backup/serial/{serial}/prefix/{prefix}` | `Collection` of `RunningConfigListItem` |
| `Troubleshooting\Troubleshooting\PostRunningConfigBackupSerialRequest` | POST | `/troubleshooting/v1/running-config-backup/serial/{serial}/prefix/{prefix}` | `RunningConfig` or null |

### User Management: Bulk Users

`Aruba::classic()->userManagement()->bulkUsers()`

| Call | Returns |
|---|---|
| `Aruba::classic()->userManagement()->bulkUsers()->deleteBulkUsersAccount()` | `BulkUser` or null (DELETE `/platform/rbac/v1/bulk_users`) |
| `Aruba::classic()->userManagement()->bulkUsers()->updateBulkUsersAccount()` | `BulkUser` or null (PATCH `/platform/rbac/v1/bulk_users`) |
| `Aruba::classic()->userManagement()->bulkUsers()->createBulkUsersAccount()` | `BulkUser` or null (POST `/platform/rbac/v1/bulk_users`) |
| `Aruba::classic()->userManagement()->bulkUsers()->status($cookieName)` | `BulkUserCookie` or null (GET `/platform/rbac/v1/status/{cookie_name}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `UserManagement\BulkUsers\DeleteBulkUsersAccountRequest` | DELETE | `/platform/rbac/v1/bulk_users` | `BulkUser` or null |
| `UserManagement\BulkUsers\UpdateBulkUsersAccountRequest` | PATCH | `/platform/rbac/v1/bulk_users` | `BulkUser` or null |
| `UserManagement\BulkUsers\CreateBulkUsersAccountRequest` | POST | `/platform/rbac/v1/bulk_users` | `BulkUser` or null |
| `UserManagement\BulkUsers\BulkUsersGetCookieStatusRequest` | GET | `/platform/rbac/v1/status/{cookie_name}` | `BulkUserCookie` or null |

### User Management: Roles

`Aruba::classic()->userManagement()->roles()`

| Call | Returns |
|---|---|
| `Aruba::classic()->userManagement()->roles()` | a builder over `GetAllRolesPlatform` records (GET `/platform/rbac/v1/roles`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->userManagement()->roles()->createRole($appName)` | the response as an array, or null (POST `/platform/rbac/v1/apps/{app_name}/roles`) |
| `Aruba::classic()->userManagement()->roles()->deleteRole($appName, $rolename)` | status or null (DELETE `/platform/rbac/v1/apps/{app_name}/roles/{rolename}`) |
| `Aruba::classic()->userManagement()->roles()->getRole($appName, $rolename)` | `GetSingleRolePlatform` or null (GET `/platform/rbac/v1/apps/{app_name}/roles/{rolename}`) |
| `Aruba::classic()->userManagement()->roles()->updateRole($appName, $rolename)` | the response as an array, or null (PATCH `/platform/rbac/v1/apps/{app_name}/roles/{rolename}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `UserManagement\Roles\CreateRoleRequest` | POST | `/platform/rbac/v1/apps/{app_name}/roles` | array or null |
| `UserManagement\Roles\DeleteRoleRequest` | DELETE | `/platform/rbac/v1/apps/{app_name}/roles/{rolename}` | array or null |
| `UserManagement\Roles\GetRoleRequest` | GET | `/platform/rbac/v1/apps/{app_name}/roles/{rolename}` | `GetSingleRolePlatform` or null |
| `UserManagement\Roles\UpdateRoleRequest` | PATCH | `/platform/rbac/v1/apps/{app_name}/roles/{rolename}` | array or null |
| `UserManagement\Roles\GetRolesRequest` | GET | `/platform/rbac/v1/roles` | `Collection` of `GetAllRolesPlatform` |

### User Management: Users

`Aruba::classic()->userManagement()->users()`

| Call | Returns |
|---|---|
| `Aruba::classic()->userManagement()->users()` | a builder over `GetAllUserAccountsPlatform` records (GET `/platform/rbac/v1/users`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `update()`, `delete()` |
| `Aruba::classic()->userManagement()->users()->changePassword($userId)` | the response as an array, or null (POST `/platform/rbac/v1/users/{user_id}/password`) |
| `Aruba::classic()->userManagement()->users()->resetPassword($userId)` | the response as an array, or null (POST `/platform/rbac/v1/users/{user_id}/password/reset`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `UserManagement\Users\GetUserAccountsRequest` | GET | `/platform/rbac/v1/users` | `Collection` of `GetAllUserAccountsPlatform` |
| `UserManagement\Users\CreateUserAccountRequest` | POST | `/platform/rbac/v1/users` | array or null |
| `UserManagement\Users\DeleteUserAccountRequest` | DELETE | `/platform/rbac/v1/users/{user_id}` | array or null |
| `UserManagement\Users\GetUserAccountDetailsRequest` | GET | `/platform/rbac/v1/users/{user_id}` | `GetSingleUserAccountPlatform` or null |
| `UserManagement\Users\UpdateUserAccountRequest` | PATCH | `/platform/rbac/v1/users/{user_id}` | array or null |
| `UserManagement\Users\ChangeUserPasswordRequest` | POST | `/platform/rbac/v1/users/{user_id}/password` | array or null |
| `UserManagement\Users\ResetUserPasswordRequest` | POST | `/platform/rbac/v1/users/{user_id}/password/reset` | array or null |

### Vgw: Get Cloud Accounts

`Aruba::classic()->vgw()`

| Call | Returns |
|---|---|
| `Aruba::classic()->vgw()` | a builder over `AwsAccountSummarySchemaItem` records (GET `/cgw/cloud_accounts/provider/AWS`): `get()`, `all()`, `first()`, `count()`, `lazy()` |
| `Aruba::classic()->vgw()->createCloudAccount()` | `AccountAddPostSchema` or null (POST `/cgw/cloud_accounts`) |
| `Aruba::classic()->vgw()->editCloudAccount($accountId)` | `AccountAddPostSchema` or null (POST `/cgw/cloud_accounts/edit/{account-id}`) |
| `Aruba::classic()->vgw()->getVgwCloudAccountsForAzure()` | a builder over `AzureAccountSummarySchemaItem` records (GET `/cgw/cloud_accounts/provider/Azure`) |
| `Aruba::classic()->vgw()->getVgwCloudAccountsForZscaler()` | a builder over `ZscalerAccountSummarySchemaItem` records (GET `/cgw/cloud_accounts/provider/Zscaler`) |
| `Aruba::classic()->vgw()->deleteCloudAccount($accountId)` | status or null (DELETE `/cgw/cloud_accounts/{account-id}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Vgw\GetCloudAccounts\CreateCloudAccountRequest` | POST | `/cgw/cloud_accounts` | `AccountAddPostSchema` or null |
| `Vgw\GetCloudAccounts\EditCloudAccountRequest` | POST | `/cgw/cloud_accounts/edit/{account-id}` | `AccountAddPostSchema` or null |
| `Vgw\GetCloudAccounts\GetVgwCloudAccountsForAwsRequest` | GET | `/cgw/cloud_accounts/provider/AWS` | `Collection` of `AwsAccountSummarySchemaItem` |
| `Vgw\GetCloudAccounts\GetVgwCloudAccountsForAzureRequest` | GET | `/cgw/cloud_accounts/provider/Azure` | `Collection` of `AzureAccountSummarySchemaItem` |
| `Vgw\GetCloudAccounts\GetVgwCloudAccountsForZscalerRequest` | GET | `/cgw/cloud_accounts/provider/Zscaler` | `Collection` of `ZscalerAccountSummarySchemaItem` |
| `Vgw\GetCloudAccounts\DeleteCloudAccountRequest` | DELETE | `/cgw/cloud_accounts/{account-id}` | array or null |

### VisualRF: Floorplan

`Aruba::classic()->visualRf()`

| Call | Returns |
|---|---|
| `Aruba::classic()->visualRf()->getVisualrfApiV1AccessPointLocationApId($apId)` | `AccessPointObj` or null (GET `/visualrf_api/v1/access_point_location/{ap_id}`) |
| `Aruba::classic()->visualRf()->deleteVisualrfApiV1Anonymization()` | status or null (DELETE `/visualrf_api/v1/anonymization`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1Anonymization()` | `AnonymizationGetResponse` or null (GET `/visualrf_api/v1/anonymization`) |
| `Aruba::classic()->visualRf()->postVisualrfApiV1Anonymization()` | `AnonymizationPostResponse` or null (POST `/visualrf_api/v1/anonymization`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1BuildingBuildingId($buildingId)` | `BuildingListFloor` or null (GET `/visualrf_api/v1/building/{building_id}`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1Campus()` | a builder over `Campus` records (GET `/visualrf_api/v1/campus`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1CampusCampusId($campusId)` | `CampusListBuilding` or null (GET `/visualrf_api/v1/campus/{campus_id}`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1ClientLocationMacaddr($macaddr)` | `LocationObj` or null (GET `/visualrf_api/v1/client_location/{macaddr}`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1FloorFloorId($floorId)` | `FloorObj` or null (GET `/visualrf_api/v1/floor/{floor_id}`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1FloorFloorIdAccessPointLocation($floorId)` | `FloorListAccessPoint` or null (GET `/visualrf_api/v1/floor/{floor_id}/access_point_location`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1FloorFloorIdClientLocation($floorId)` | `FloorListClientLocation` or null (GET `/visualrf_api/v1/floor/{floor_id}/client_location`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1FloorFloorIdImage($floorId)` | `FloorImage` or null (GET `/visualrf_api/v1/floor/{floor_id}/image`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1FloorFloorIdRogueLocation($floorId)` | `FloorListRogueLocation` or null (GET `/visualrf_api/v1/floor/{floor_id}/rogue_location`) |
| `Aruba::classic()->visualRf()->deleteVisualrfApiV1Geofence()` | status or null (DELETE `/visualrf_api/v1/geofence`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1Geofence()` | `GeofenceRepsonseEnabled` or null (GET `/visualrf_api/v1/geofence`) |
| `Aruba::classic()->visualRf()->postVisualrfApiV1Geofence()` | `GeofenceRepsonseEnabled` or null (POST `/visualrf_api/v1/geofence`) |
| `Aruba::classic()->visualRf()->postVisualrfApiV1RestoreSites()` | the response as an array, or null (POST `/visualrf_api/v1/restore_sites`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1RestoreSitesStatus()` | the response as an array, or null (GET `/visualrf_api/v1/restore_sites/status`) |
| `Aruba::classic()->visualRf()->getVisualrfApiV1RogueLocationMacaddr($macaddr)` | `LocationObj` or null (GET `/visualrf_api/v1/rogue_location/{macaddr}`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `VisualRf\Floorplan\GetVisualrfApiV1AccessPointLocationApIdRequest` | GET | `/visualrf_api/v1/access_point_location/{ap_id}` | `AccessPointObj` or null |
| `VisualRf\Floorplan\DeleteVisualrfApiV1AnonymizationRequest` | DELETE | `/visualrf_api/v1/anonymization` | array or null |
| `VisualRf\Floorplan\GetVisualrfApiV1AnonymizationRequest` | GET | `/visualrf_api/v1/anonymization` | `AnonymizationGetResponse` or null |
| `VisualRf\Floorplan\PostVisualrfApiV1AnonymizationRequest` | POST | `/visualrf_api/v1/anonymization` | `AnonymizationPostResponse` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1BuildingBuildingIdRequest` | GET | `/visualrf_api/v1/building/{building_id}` | `BuildingListFloor` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1CampusRequest` | GET | `/visualrf_api/v1/campus` | `Collection` of `Campus` |
| `VisualRf\Floorplan\GetVisualrfApiV1CampusCampusIdRequest` | GET | `/visualrf_api/v1/campus/{campus_id}` | `CampusListBuilding` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1ClientLocationMacaddrRequest` | GET | `/visualrf_api/v1/client_location/{macaddr}` | `LocationObj` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdRequest` | GET | `/visualrf_api/v1/floor/{floor_id}` | `FloorObj` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdAccessPointLocationRequest` | GET | `/visualrf_api/v1/floor/{floor_id}/access_point_location` | `FloorListAccessPoint` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdClientLocationRequest` | GET | `/visualrf_api/v1/floor/{floor_id}/client_location` | `FloorListClientLocation` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdImageRequest` | GET | `/visualrf_api/v1/floor/{floor_id}/image` | `FloorImage` or null |
| `VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdRogueLocationRequest` | GET | `/visualrf_api/v1/floor/{floor_id}/rogue_location` | `FloorListRogueLocation` or null |
| `VisualRf\Floorplan\DeleteVisualrfApiV1GeofenceRequest` | DELETE | `/visualrf_api/v1/geofence` | array or null |
| `VisualRf\Floorplan\GetVisualrfApiV1GeofenceRequest` | GET | `/visualrf_api/v1/geofence` | `GeofenceRepsonseEnabled` or null |
| `VisualRf\Floorplan\PostVisualrfApiV1GeofenceRequest` | POST | `/visualrf_api/v1/geofence` | `GeofenceRepsonseEnabled` or null |
| `VisualRf\Floorplan\PostVisualrfApiV1RestoreSitesRequest` | POST | `/visualrf_api/v1/restore_sites` | array or null |
| `VisualRf\Floorplan\GetVisualrfApiV1RestoreSitesStatusRequest` | GET | `/visualrf_api/v1/restore_sites/status` | array or null |
| `VisualRf\Floorplan\GetVisualrfApiV1RogueLocationMacaddrRequest` | GET | `/visualrf_api/v1/rogue_location/{macaddr}` | `LocationObj` or null |

### Webhook: Webhooks

`Aruba::classic()->webhooks()`

| Call | Returns |
|---|---|
| `Aruba::classic()->webhooks()` | a builder over `Webhooks` records (GET `/central/v1/webhooks`): `get()`, `all()`, `first()`, `count()`, `lazy()`, `find($id)`, `create()`, `replace()`, `delete()` |
| `Aruba::classic()->webhooks()->test($wid)` | a builder over `Ping` records (GET `/central/v1/webhooks/{wid}/ping`) |
| `Aruba::classic()->webhooks()->token($wid)` | `Token` or null (GET `/central/v1/webhooks/{wid}/token`) |
| `Aruba::classic()->webhooks()->refreshToken($wid)` | `Token` or null (PUT `/central/v1/webhooks/{wid}/token`) |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Webhooks\Webhooks\GetWebhooksApiRequest` | GET | `/central/v1/webhooks` | `Collection` of `Webhooks` |
| `Webhooks\Webhooks\AddWebhookApiRequest` | POST | `/central/v1/webhooks` | `Webhook` or null |
| `Webhooks\Webhooks\DeleteWebhookApiRequest` | DELETE | `/central/v1/webhooks/{wid}` | array or null |
| `Webhooks\Webhooks\GetWebhookItemApiRequest` | GET | `/central/v1/webhooks/{wid}` | `Webhooks` or null |
| `Webhooks\Webhooks\UpdateWebhookApiRequest` | PUT | `/central/v1/webhooks/{wid}` | `Webhook` or null |
| `Webhooks\Webhooks\TestWebhookRequest` | GET | `/central/v1/webhooks/{wid}/ping` | `Collection` of `Ping` |
| `Webhooks\Webhooks\GetWebhookTokenApiRequest` | GET | `/central/v1/webhooks/{wid}/token` | `Token` or null |
| `Webhooks\Webhooks\RefreshWebhookTokenApiRequest` | PUT | `/central/v1/webhooks/{wid}/token` | `Token` or null |

### Service configuration (AirGroup, AirMatch, IDS/IPS, IPMS, overlay WLAN, RAPIDS, SD-WAN, UCC)

`Aruba::classic()->services()`

| Call | Returns |
|---|---|
| `Aruba::classic()->services()->airgroup($nodeType, $nodeId)` | a `NodeConfigResource` over `/airgroup-config/v2` |
| `Aruba::classic()->services()->airmatch($nodeType, $nodeId)` | a `NodeConfigResource` over `/airmatch-config/v1` |
| `Aruba::classic()->services()->idsIps($nodeType, $nodeId)` | a `NodeConfigResource` over `/ids-ips-config/v1` |
| `Aruba::classic()->services()->ipms($nodeType, $nodeId)` | a `NodeConfigResource` over `/ipms-config/v1` |
| `Aruba::classic()->services()->overlayWlan($nodeId, $nodeType)` | a `NodeConfigResource` over `/overlay-wlan-config/v2` |
| `Aruba::classic()->services()->rapids($nodeType, $nodeId)` | a `NodeConfigResource` over `/rapids-config/v1` |
| `Aruba::classic()->services()->sdwan($nodeType, $nodeId)` | a `NodeConfigResource` over `/sdwan-config/v1` |
| `Aruba::classic()->services()->ucc($nodeType, $nodeId)` | a `NodeConfigResource` over `/ucc-config/v1` |
| `Aruba::classic()->services()->config($service, $version, $nodeType, $nodeId)` | a `NodeConfigResource` over any service |

A `NodeConfigResource` gives `node()`, `get($section, $key)`, `create($section, $attributes, $key)`, `replace($section, $attributes, $key)` and `delete($section, $key)`, where `$section` is a path the service documents under `/config` (an empty section is the whole configuration). The sections each service documents:

- Service Airgroup: ``, `general_settings/`, `general_settings/airgroup_status/`, `services/`, `services/role_restrictions/`, `services/role_restrictions/allowed_roles/`, `services/role_restrictions/disallowed_roles/`, `services/vlan_restrictions/`, `services/vlan_restrictions/allowed_vlans/`, `services/vlan_restrictions/disallowed_vlans/`
- Service Airmatch: ``, `system/`
- Service IDS IPS: ``, `siem_notification/`, `siem_servers_list/`
- Service IPMS: ``, `address_pool/`, `address_pool/ip_range/`
- Service Overlay Wlan: ``, `ssid_cluster/`, `ssid_cluster/gw_cluster_list/`
- Service RAPIDS: ``, `classification_rules/`, `classification_rules/match_criteria/`, `classification_rules/match_criteria/site_excludes/`, `classification_rules/match_criteria/site_includes/`, `classification_rules/match_criteria/ssid_excludes/`, `classification_rules/match_criteria/ssid_includes/`
- Service SDWAN: ``, `branch-config/`, `branch-config/hub-clusters/`, `branch-config/hubs/`, `branch-devices/`, `hub-config/`, `hub-config/hub-aggregates/`, `hub-config/hub-aggregates/aggregates/`, `hub-config/transit/`, `mesh-policy/`, `mesh-policy/hub-mesh/`, `mesh-policy/hub-mesh/hub-groups/`, `microbranch-dc-cluster/`, `microbranch-dc-cluster/hub-clusters/`, `route-policy/`, `route-policy/as-number/`, `route-policy/branch-aggregates/`, `route-policy/branch-aggregates/aggregates/`, `route-policy/graceful-restart/`, `route-policy/graceful-restart/timer/`, `route-policy/hub/`, `route-policy/hub/best-path-computation/`, `route-policy/load-balance-orchestration/`, `sdwan-global/`, `sdwan-global/admin-status/`, `sdwan-global/network-segment-policy/`, `sdwan-global/topology/`, `tunnel-policy/`, `tunnel-policy/rekey-interval/`
- Service UCC: ``, `ucc_alg/`, `ucc_alg/sip/`, `ucc_alg/skype4b/`, `ucc_alg/teams/`, `ucc_alg/wifi_calling/`, `ucc_alg/wifi_calling/dns_patterns/`, `ucc_alg/zoom/`, `ucc_settings/`, `ucc_settings/activate/`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Services\NodeConfig\GetNodeListRequest` | GET | `/{service}/{version}/node_list/{node_type}/{node_id}` | array or null |
| `Services\NodeConfig\GetNodeConfigRequest` | GET | `/{service}/{version}/node_list/{node_type}/{node_id}/config[/{section}[/{key}]]` | array or null |
| `Services\NodeConfig\CreateNodeConfigRequest` | POST | `/{service}/{version}/node_list/{node_type}/{node_id}/config[/{section}[/{key}]]` | array or null |
| `Services\NodeConfig\ReplaceNodeConfigRequest` | PUT | `/{service}/{version}/node_list/{node_type}/{node_id}/config[/{section}[/{key}]]` | array or null |
| `Services\NodeConfig\DeleteNodeConfigRequest` | DELETE | `/{service}/{version}/node_list/{node_type}/{node_id}/config[/{section}[/{key}]]` | array or null |
