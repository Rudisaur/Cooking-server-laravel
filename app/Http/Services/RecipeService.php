<?php

namespace App\Http\Services;

use App\Models\Food;
use App\Models\Recipe;

class RecipeService {
    public function getRecipe(string $name)
    {
        return Recipe::query()->where('name', 'ILIKE', '%' . $name . '%')->paginate(20);
    }
    public function createRecipe(array $values)
    {
        return Recipe::query()->create($values);
    }
    public function updateRecipe(array $values)
    {
        return Recipe::query()->update($values);
    }
    public function deleteRecipe(int $id)
    {
        return Recipe::query()->delete($id);
    }
}
