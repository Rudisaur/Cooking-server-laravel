<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient\IngredientListRequest;
use App\Http\Requests\ingredient\IngredientStoreRequest;
use App\Http\Services\IngredientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    //
    public function store(IngredientStoreRequest $request, IngredientService $service)
    {
        return new JsonResponse($service->createIngredient($request->validated()));
    }

    public function index(IngredientListRequest $request, IngredientService $service)
    {
        return new JsonResponse($service->getIngredient($request->validated('name')));
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
