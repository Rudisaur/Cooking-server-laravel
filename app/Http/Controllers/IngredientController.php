<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\IngredientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    //
    public function createIngredient(Request $request, IngredientService $service)
    {

        return ;
    }
    public function getIngredient(Request $request, IngredientService $service)
    {
        $ingredients = $service->ingredientGetter($request->input('query'));
        return response()->json($ingredients);
    }
    public function changeIngredient(Request $request)
    {

    }
    public function deleteIngredient(Request $request)
    {

    }
}
