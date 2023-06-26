<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient\IngredientListRequest;
use App\Http\Services\IngredientService;
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
        dd($request->validated('name'));
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
