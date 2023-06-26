<?php

namespace App\Http\Services;

use App\Models\Ingredient;

class IngredientService
{
    public function ingredientCreator(array $request)
    {
        $ingredient = Ingredient::query()->create($request);
        return $ingredient->name;
    }
    public function ingredientDeleter($id)
    {
        Ingredient::query()->delete($id);
        return 'deleted';
    }
    public function ingredientChanger(array $request)
    {
        $ingredient = Ingredient::query()->update($request);
        return $ingredient->name;
    }
    public function ingredientGetter($request)
    {
        $ingredients = Ingredient::where('name', 'LIKE', '%' . $request . '%')->paginate(20);

        return $ingredients;
    }
}
