<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\RestaurantListRequest;
use App\Http\Requests\Restaurant\RestaurantStoreRequest;
use App\Http\Requests\Restaurant\RestaurantUpdateRequest;
use App\Http\Services\RestaurantService;
use App\Models\Restaurant;
use App\Traits\HttpJsonResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    use HttpJsonResponse;
    public function __construct(private RestaurantService $service)
    {
    }

    public function index(RestaurantListRequest $request): JsonResponse
    {
        return $this->successJsonResponse($this->service->getRestaurant($request->validated()));
    }

    public function store(RestaurantStoreRequest $request): JsonResponse
    {
        return $this->successJsonResponse($this->service->createRestaurant($request->validated()),
            'messages.restaurant.store.success');
    }

    public function update(RestaurantUpdateRequest $request, Restaurant $restaurant): JsonResponse
    {
        return $this->successJsonResponse($this->service->updateRestaurant($request->validated(), $restaurant),
            'messages.restaurant.update.success');
    }

    public function destroy(Restaurant $restaurant) :JsonResponse
    {
        $restaurant->delete();
        return $this->successJsonResponse(message: 'messages.restaurant.delete.success');
    }
}
