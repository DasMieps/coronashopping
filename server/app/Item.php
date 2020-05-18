<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class Item extends Model
{
    protected $fillable = [
        'name', 'quantity', 'max_price'
    ];
}
