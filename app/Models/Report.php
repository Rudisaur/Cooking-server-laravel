<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'restaurant_id',
        'total_purchase_amount',
        'count_of_ingredients',
        'description'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'reports_ingredients');
    }
}
