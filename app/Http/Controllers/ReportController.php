<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\ReportListRequest;
use App\Http\Requests\Report\ReportStoreRequest;
use App\Http\Requests\Report\ReportUpdateRequest;
use App\Http\Services\ReportService;
use App\Models\Report;
use App\Models\Restaurant;
use App\Traits\HttpJsonResponse;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    use HttpJsonResponse;
    public function __construct(private ReportService $service)
    {

    }

    public function index(ReportListRequest $request): JsonResponse
    {
        return $this->successJsonResponse($this->service->getReport($request->validated()));
    }

    public function store(ReportStoreRequest $request): JsonResponse
    {
        return $this->successJsonResponse($this->service->createReport($request->validated()),
            'messages.report.store.success');
    }

    public function update(ReportUpdateRequest $request, Report $report): JsonResponse
    {
        return $this->successJsonResponse($this->service->updateReport($request->validated(), $report),
            'messages.report.update.success');
    }

    public function destroy(Report $report): JsonResponse
    {
        $report->delete();
        return $this->successJsonResponse(message: 'messages.report.delete.success');
    }
}
