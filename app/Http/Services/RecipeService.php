<?php

namespace App\Http\Services;

use App\Models\Food;
use App\Models\Recipe;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;

class RecipeService {
    public function getRecipe(string $name)
    {
        return Recipe::query()->where('name', 'ILIKE', '%' . $name . '%')->paginate(20);
    }
    public function createRecipe(array $data)
    {
        $uploadedFile = $data['image'];
        $imageUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
        $recipe = Recipe::query()->create([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'image_link'=>$imageUrl,
            'user_id'=>request()->user()->id
        ]);
        DB::table('recipes_ingredients');
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
