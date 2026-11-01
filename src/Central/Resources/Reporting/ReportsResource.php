<?php

namespace spkm\ArubaCentral\Central\Resources\Reporting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Reporting\Report;
use spkm\ArubaCentral\Central\Data\Reporting\ReportRun;
use spkm\ArubaCentral\Central\Data\Reporting\ReportsMetadata;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\CreateUserReportRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\DeleteReportRunRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\DeleteUserReportRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\DownloadReportLinkRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\GetReportsMetadataRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\GetUserReportRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\ListReportRunsRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\ListReportsRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\UpdateUserReportRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Reporting API, from Aruba::reports().
 *
 * @extends Builder<Report>
 */
class ReportsResource extends Builder
{
    protected string $idField = 'reportId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Report::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ListReportsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetUserReportRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateUserReportRequest($body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateUserReportRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteUserReportRequest((string) $id, $options);
    }

    /**
     * Delete Report Run: DELETE /network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteRun(string $reportId, string $reportRunId, array $options = []): mixed
    {
        return $this->fetch(new DeleteReportRunRequest($reportId, $reportRunId, $options));
    }

    /**
     * Get Download Report Link: POST /network-reporting/v1/reports/{report-id}/report-runs/{report-run-id}/download-link.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function downloadLink(string $reportId, string $reportRunId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DownloadReportLinkRequest($reportId, $reportRunId, $this->payloadOf($attributes), $options));
    }

    /**
     * Get Reports Metadata: GET /network-reporting/v1/reports-meta.
     *
     * @param  array<string, mixed>  $options
     */
    public function metadata(array $options = []): ?ReportsMetadata
    {
        return $this->fetch(new GetReportsMetadataRequest($options));
    }

    /**
     * List Report Runs: GET /network-reporting/v1/reports/{report-id}/report-runs.
     *
     * @return ListResource<ReportRun>
     */
    public function runs(string $reportId): ListResource
    {
        return new ListResource($this->connector, ReportRun::class, fn (Query $query) => new ListReportRunsRequest($reportId, $query));
    }
}
