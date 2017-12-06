<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable = [
        'item_name','description','item_price', 'quantity', 'total','date'
    ];
    public $timestamps = false;
}
