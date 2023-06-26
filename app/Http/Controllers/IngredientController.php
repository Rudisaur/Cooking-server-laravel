<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function index(Request $request, IngredientService $service)
    {
        $ingredients = $service->ingredientGetter($request->input('query'));
        return response()->json($ingredients);
    }
    public function update(Request $request)
    {

    }
    public function destroy(Request $request)
    {

    }
}
