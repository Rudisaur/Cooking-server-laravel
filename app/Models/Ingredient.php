<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class,'recipes_ingredients');
    }
    public function reports()
    {
        return $this->belongsToMany(Report::class, 'reports_ingredients');
    }
}
