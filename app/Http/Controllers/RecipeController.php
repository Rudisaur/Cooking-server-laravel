<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recipe\RecipeListRequest;
use App\Http\Requests\Recipe\RecipeStoreRequest;
use App\Http\Requests\Recipe\RecipeUpdateRequest;
use App\Http\Services\RecipeService;
use App\Models\Recipe;
use App\Traits\HttpJsonResponse;
use Illuminate\Http\JsonResponse;

class RecipeController extends Controller
{
    use HttpJsonResponse;

    public function __construct(private RecipeService $service)
    {
    }

    public function index(RecipeListRequest $request): JsonResponse
    {
        return $this->successJsonResponse($this->service->getRecipe($request->validated('name')));
    }

    public function store(RecipeStoreRequest $request): JsonResponse
    {
        dd($request->validated());
        return $this->successJsonResponse($this->service->createRecipe($request->validated()),
            'messages.recipe.store.success');
    }

    public function update(RecipeUpdateRequest $request, Recipe $recipe): JsonResponse
    {
        return $this->successJsonResponse($this->service->updateRecipe($request->validated(), $recipe),
            'messages.recipe.update.success');
    }

    public function destroy(Recipe $recipe): JsonResponse
    {
        $recipe->delete();
        return $this->successJsonResponse(message: 'messages.recipe.delete.success');
    }

}
