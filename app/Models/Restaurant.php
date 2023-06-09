<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'user_id',
      'image_link',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'restaurant_id');
    }
}
