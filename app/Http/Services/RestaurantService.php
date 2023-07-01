<?php

namespace App\Http\Services;

use App\Models\Restaurant;

class RestaurantService
{
    public function createRestaurant(array $data)
    {
        $restaurant = Restaurant::query()->create([
            'name' => $data['name'],
            'image_link' => 'some_image_link',
            'user_id' => request()->user()->id,
        ]);
        return $restaurant;
    }

    public function updateRestaurant(array $data, $restaurant)
    {
        /** @var Restaurant $restaurant */
        $restaurant->update([
            'name' => $data['name'],
            'image_link' => 'some_image_link',
        ]);
        return $restaurant;
    }

    public function getRestaurant(array $name)
    {
    return Restaurant::query()->where('name', 'ILIKE', '%' . $name['name'] . '%')->paginate(20);
    }
}
