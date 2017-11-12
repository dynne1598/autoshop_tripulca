<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;

class Supplier extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_name', 'stock_code', 'unit_cost', 'item_name', 'item_price', 'created_at'
        ];

    public function stock(){
	    return $this->hasOne('App\Stock');
	}

	public $timestamps = false;
}
