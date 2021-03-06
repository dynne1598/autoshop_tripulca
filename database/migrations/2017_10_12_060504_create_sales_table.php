<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('description');
            $table->string('item_price');
            $table->string('quantity');
            $table->timestamp('created_at')->nullable();
            $table->string('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
