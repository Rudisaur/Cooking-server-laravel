<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\recipe\RecipeListRequest;
use App\Http\Requests\Recipe\RecipeStoreRequest;
use App\Http\Requests\Recipe\RecipeUpdateRequest;
use App\Http\Services\RecipeService;
use App\Integration\Database\Post;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function __construct(private RecipeService $service){

    }
    public function store(RecipeStoreRequest $request)
    {
        return new JsonResponse([
            $this->service->createRecipe($request->validated()),
            'message' => __('messages.recipe.store.success', locale: $request->cookie('lang'))
        ]);
    }

    public function index(RecipeListRequest $request)
    {
        return new JsonResponse($this->service->getRecipe($request->validated('name')));
    }

    public function update(RecipeUpdateRequest $request, Recipe $recipe)
    {
        return new JsonResponse([
            $this->service->updateRecipe($request->validated(), $recipe),
        'message' => __('messages.recipe.update.success', locale: $request->cookie('lang'))
        ]);
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return new JsonResponse([
            'message' => __('messages.recipe.delete.success', locale: request()->cookie('lang'))
        ]);
    }

}
