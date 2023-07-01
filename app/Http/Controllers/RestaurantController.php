<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\RestaurantListRequest;
use App\Http\Requests\Restaurant\RestaurantStoreRequest;
use App\Http\Requests\Restaurant\RestaurantUpdateRequest;
use App\Http\Services\RestaurantService;
use App\Models\Restaurant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct(private RestaurantService $service)
    {
    }
    public function index(RestaurantListRequest $request)
    {
        return new JsonResponse($this->service->getRestaurant($request->validated()));
    }
    public function store(RestaurantStoreRequest $request)
    {
        return new JsonResponse($this->service->createRestaurant($request->validated()));
    }
    public function update(RestaurantUpdateRequest $request, Restaurant $restaurant)
    {
        return new JsonResponse($this->service->updateRestaurant($request->validated(), $restaurant));
    }
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return 'restaurant deleted';
    }
}
