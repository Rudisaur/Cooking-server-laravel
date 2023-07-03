<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient\IngredientListRequest;
use App\Http\Requests\Ingredient\IngredientStoreRequest;
use App\Http\Requests\Ingredient\IngredientUpdateRequest;
use App\Http\Services\IngredientService;
use App\Models\Ingredient;
use App\Traits\HttpJsonResponse;
use Illuminate\Http\JsonResponse;

class IngredientController extends Controller
{
    use HttpJsonResponse;

    public function __construct(private IngredientService $service)
    {
    }

    public function index(IngredientListRequest $request): JsonResponse
    {

        return $this->successJsonResponse($this->service->getIngredient($request->validated('name')));
    }

    public function store(IngredientStoreRequest $request): JsonResponse
    {

        return $this->successJsonResponse($this->service->createIngredient($request->validated()),
            'messages.ingredient.store.success');
    }


    public function update(IngredientUpdateRequest $request, Ingredient $ingredient): JsonResponse
    {

        return $this->successJsonResponse($this->service->updateIngredient($request->validated(), $ingredient),
            'messages.ingredient.update.success');
    }


    public function destroy(Ingredient $ingredient): JsonResponse
    {
        $ingredient->delete();
        return $this->successJsonResponse(message:'message.ingredient.delete.success');
    }
}
