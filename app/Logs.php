<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable = [
        'item_log','stock_log','account_log', 'login_history',
    ];
}
