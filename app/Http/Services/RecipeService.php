<?php

namespace App\Http\Services;

use App\Models\Ingredient;
use App\Models\Recipe;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RecipeService
{
    public function getRecipe(string $name)
    {
        $recipes = Recipe::query()->where('name', 'ILIKE', '%' . $name . '%')->get();
        $requestData = [];
        foreach ($recipes as $recipe) {
            $requestData[] = [
                'recipe' => $recipe->toArray(),
                'ingredients' => $recipe->ingredients()->select()->get()->toArray()
            ];
        }

        return $requestData;
    }

    public function createRecipe(array $data)
    {
        //$uploadedFile = $data['image'];
        //$imageUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
        /** @var Recipe $recipe */
        $recipe = Recipe::query()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image_link' => '$imageUrl',
            'user_id' => request()->user()->id
        ]);
        foreach ($data['ingredients'] as $ingredientData) {

            if (Ingredient::query()->where('id', $ingredientData['id'])->exists()) {
                $recipe->ingredients()->attach($ingredientData['id'], [
                    'description' => $ingredientData['description'],
                    'number' => $ingredientData['stage'],
                    "weigh_in_gram" => $ingredientData['weigh_in_gram'],
                ]);
                return $recipe;
            } else {
                abort(400);
            }
        }
    }

    public function updateRecipe(array $data, Recipe $recipe)
    {
//        if ($data['image']) {
//            $uploadedFile = $data['image'];
//            $imageUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
//            $recipe->update(['image_link' => $imageUrl]);
//        }
        $recipe->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $ingredientsData = [];
        foreach ($data['ingredients'] as $ingredientData) {
            if (Ingredient::query()->where('id', $ingredientData['id'])->exists()) {
                $ingredientsData[$ingredientData['id']] = [
                    'description' => $ingredientData['description'],
                    'number' => $ingredientData['stage'],
                    'weigh_in_gram' => $ingredientData['weigh_in_gram'],
                ];
            } else {
                abort(400);
            }
        }
        $recipe->ingredients()->sync($ingredientsData);
        return $recipe->toArray();
    }

}
