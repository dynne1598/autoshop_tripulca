<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable = [
        'transaction_code','item_code','item_name', 'item_price','date_purchased','total',
    ];
}
