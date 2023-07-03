<?php

namespace App\Http\Services;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class RestaurantService
{
    public function createRestaurant(array $data): array
    {
        return Restaurant::query()->create([
            'name' => $data['name'],
            'image_link' => 'some_image_link',
            'user_id' => request()->user()->id,
        ])->toArray();
    }

    public function updateRestaurant(array $data, Restaurant $restaurant): Restaurant
    {
        $restaurant->update([
            'name' => $data['name'],
            'image_link' => 'some_image_link',
        ]);
        return $restaurant;
    }

    public function getRestaurant(array $data): LengthAwarePaginator
    {
        return Restaurant::query()
            ->where('name', 'ILIKE', '%' . $data['name'] . '%')
            ->where('user_id', request()->user()->id)
            ->paginate(20);
    }
}
