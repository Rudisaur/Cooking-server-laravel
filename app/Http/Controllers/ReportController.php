<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipe\RecipeUpdateRequest;
use App\Http\Requests\Report\ReportListRequest;
use App\Http\Requests\Report\ReportStoreRequest;
use App\Http\Services\ReportService;
use App\Models\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct(private ReportService $service)
    {

    }

    public function index(ReportListRequest $request)
    {
        return new JsonResponse($this->service->getReport($request->validated('name')));
    }

    public function store(ReportStoreRequest $request)
    {
        return new JsonResponse([
            $this->service->createReport($request->validated()),
            'message' => __('messages.report.store.success', locale: $request->cookie('lang'))
        ]);
    }

    public function update(RecipeUpdateRequest $request, Report $report)
    {
        return new JsonResponse([
            $this->service->updateReport($request->validated(), $report),
            'message' => __('messages.report.update.success', locale: $request->cookie('lang'))
        ]);
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return new JsonResponse([
            'message' => __('messages.report.delete.success', locale: request()->cookie('lang'))
        ]);
    }
}
