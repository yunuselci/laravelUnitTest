<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weatherforecast extends Model
{
    use HasFactory;
    protected $table = 'weatherforecast';
    protected $fillable =
        [
            "id",
            "city",
            "zipcode",
            "weather",
            "emergency",
            "created_at",
            "updated_at"
        ];
}
