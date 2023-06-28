<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipe\RecipeDeleteRequest;
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
    public function store(RecipeStoreRequest $request, RecipeService $service)
    {
        return new JsonResponse($service->createRecipe($request->validated()));
    }

    public function index(RecipeListRequest $request, RecipeService $service)
    {
        return new JsonResponse($service->getRecipe($request->validated('name')));
    }

    public function update(RecipeUpdateRequest $request, RecipeService $service)
    {

    }

    public function destroy(RecipeDeleteRequest $request, RecipeService $service)
    {

    }

}
