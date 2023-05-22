<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientsController;
use App\http\Controllers\FoodController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'main';
});
Route::get('/profile', function () {
    return 'profile';
});
