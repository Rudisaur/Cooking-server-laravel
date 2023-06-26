<?php

namespace App\Http\Services;

use App\Models\Ingredient;
use Illuminate\Pagination\LengthAwarePaginator;

class IngredientService
{

    public function createIngredient(array $request)
    {
        $ingredient = Ingredient::query()->create($request);
        return $ingredient->name;
    }
    public function deleteIngredient($id)
    {
        Ingredient::query()->delete($id);
        return 'deleted';
    }

    public function updateIngredient(array $request)
    {
        $ingredient = Ingredient::query()->update($request);
        return $ingredient->name;
    }

    public function getIngredient(?string $name): LengthAwarePaginator
    {
        return Ingredient::query()->where('name', 'ILIKE', '%' . $name . '%')->paginate(20);
    }
}
