<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    // use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'thumb',
        'price',
        'price_unit',
        'series',
        'sale_date',
        'type'
    ];

    public function get_full_price()
    {
        return $this->price_unit . $this->price;
    }
}
