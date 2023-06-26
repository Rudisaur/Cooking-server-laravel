<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient\IngredientListRequest;
use App\Http\Services\IngredientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    //
    public function store(Request $request, IngredientService $service)
    {
        return ;
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
