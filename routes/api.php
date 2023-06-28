<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\IngredientController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Protected routes
Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::post('/Recipe/create', [RecipeController::class, 'createRecipe']);
    Route::get('/Recipe/my', [RecipeController::class, 'getMyRecipe']);
    Route::put('/Recipe/change', [RecipeController::class, 'changeRecipe']);
    Route::delete('/Recipe/delete', [RecipeController::class, 'deleteRecipe']);
    Route::post('/restaurant/create', [RestaurantController::class, 'createRestaurant']);
    Route::get('/restaurant/get', [RestaurantController::class, 'getRestaurant']);
    Route::put('/restaurant/change', [RestaurantController::class, 'changeRestaurant']);
    Route::delete('/restaurant/delete', [RestaurantController::class, 'deleteRestaurant']);
    Route::post('/report/create', [ReportController::class, 'createReport']);
    Route::get('/report/get', [ReportController::class, 'getReport']);
    Route::put('/report/change', [ReportController::class, 'changeReport']);
    Route::delete('/report/delete', [ReportController::class, 'deleteReport']);
    // admin role
    Route::resource('ingredients', IngredientController::class)->except('index');
});

// Public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::resource('ingredients', IngredientController::class)->only('index');

Route::get('cooks', [UserController::class, 'getUsers']);
Route::get('/ingredient/get', [IngredientController::class, 'getIngredient']);
Route::get('/recipes', [RecipeController::class,'getRecipes']);
