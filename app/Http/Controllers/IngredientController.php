<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient\IngredientListRequest;
use App\Http\Requests\Ingredient\IngredientStoreRequest;
use App\Http\Requests\Ingredient\IngredientUpdateRequest;
use App\Http\Services\IngredientService;
use App\Models\Ingredient;
use Illuminate\Http\JsonResponse;

class IngredientController extends Controller
{
    public function __construct(private IngredientService $service)
    {
    }

    public function index(IngredientListRequest $request)
    {
        return new JsonResponse($this->service->getIngredient($request->validated('name')));
    }

    public function store(IngredientStoreRequest $request)
    {

        return new JsonResponse([
            $this->service->createIngredient($request->validated()),
            'message' => __('messages.ingredient.store.success', locale: $request->cookie('lang'))
        ]);
    }


    public function update(IngredientUpdateRequest $request, Ingredient $ingredient)
    {

        return new JsonResponse([
            $this->service->updateIngredient($request->validated(), $ingredient),
            'message' => __('messages.ingredient.update.success', locale: $request->cookie('lang'))
        ]);
    }


    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return new JsonResponse([
            'message' => __('message.ingredient.delete.success', locale: request()->cookie('lang'))
        ]);
    }
}
