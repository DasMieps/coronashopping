<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shoppinglist extends Model
{
    protected $fillable = [
        'name', 'creator_id', 'due_date', 'shopper_id', 'actual_price'
    ];

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shopper() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function items() : HasMany
    {
        return $this->hasMany(Item::class);
    }
}
