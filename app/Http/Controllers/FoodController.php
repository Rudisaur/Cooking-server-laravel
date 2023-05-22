<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Integration\Database\Post;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index () {
        $food = Food::query()->where('name', 'kurochka')->first() ;
        dd($food->description);
    }

}
