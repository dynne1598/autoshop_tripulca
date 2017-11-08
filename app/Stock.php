<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_name', 'description', 'category', 'item_price', 'unit_cost', 'quantity', 'supplier',
    ];

    public function supplier(){
	    return $this->hasOne('App\Supplier', 'id');
	}
    public $timestamps = false;
}
 