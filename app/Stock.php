<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Supplier;

class Stock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_name', 'description', 'category', 'item_price', 'unit_cost', 'quantity', 'supplier_name', 
    ];
    protected $table = 'stocks';

    public function supplier(){
	    return $this->belongsTo('App\Supplier');
    // //nadungag
    //     return hasMany ('App/Supplier','Supplier_id');
	}
    public $timestamps = false;
}
