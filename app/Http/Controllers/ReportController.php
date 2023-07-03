<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipe\RecipeUpdateRequest;
use App\Http\Requests\Report\ReportListRequest;
use App\Http\Requests\Report\ReportStoreRequest;
use App\Http\Services\ReportService;
use App\Models\Report;
use App\Traits\HttpJsonResponse;

class ReportController extends Controller
{
    use HttpJsonResponse;
    public function __construct(private ReportService $service)
    {

    }

    public function index(ReportListRequest $request)
    {
        return $this->successJsonResponse($this->service->getReport($request->validated('name')));
    }

    public function store(ReportStoreRequest $request)
    {
        return $this->successJsonResponse($this->service->createReport($request->validated()),
            'messages.report.store.success');
    }

    public function update(RecipeUpdateRequest $request, Report $report)
    {
        return $this->successJsonResponse($this->service->updateReport($request->validated(), $report),
            'messages.report.update.success');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return $this->successJsonResponse(message: 'messages.report.delete.success');
    }
}
