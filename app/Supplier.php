<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_name', 'stock_code', 'unit_cost', 'item_name',
        ];

    public function stock(){
	    return $this->belongsTo('App\Stock', 'supplier_id');
	}

	public $timestamps = false;
}
