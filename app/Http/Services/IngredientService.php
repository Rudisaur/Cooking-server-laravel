<?php

namespace App\Http\Services;

use App\Models\Ingredient;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Pagination\LengthAwarePaginator;


class IngredientService
{

    public function createIngredient(array $request): array
    {
        $uploadedFile = $request['image'];
        $imageUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
        $ingredient = Ingredient::query()->create([
            'name'=>$request['name'],
            'image_link'=>$imageUrl,
            'description'=>$request['description'],
        ]);
        return $ingredient->toArray();
    }
    public function updateIngredient(array $data, Ingredient $ingredient): array
    {
        if(array_key_exists('image', $data)){
            $uploadedFile = $data['image'];
            $imageUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
            $ingredient->fill(['image_link'=>$imageUrl])->save();
        }

        $ingredient->fill([
            'name'=>$data['name'],
            'description'=>$data['description'],
        ])->save();
        return $ingredient->toArray();
    }

    public function getIngredient(?string $name): LengthAwarePaginator
    {
        return Ingredient::query()->where('name', 'ILIKE', '%' . $name . '%')->paginate(20);
    }
}
