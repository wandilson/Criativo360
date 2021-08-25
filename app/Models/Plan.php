<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'price',
        'recomended',
        'stripe_id',
        'description',
    ];


    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function getPriceBrAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
}
