<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Protected routes
Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::resource('recipe', RecipeController::class);

    Route::resource('restaurant', RestaurantController::class);
    Route::resource('report', ReportController::class);
    // admin role
    Route::resource('ingredients', IngredientController::class);
});


// Public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::resource('ingredients', IngredientController::class)->only('index');

//Route::get('/recipes', [RecipeController::class,'getRecipes']);
