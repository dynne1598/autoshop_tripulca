<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_name','description', 'category', 'item_price', 'quantity', 'supplier',
    ];
}
