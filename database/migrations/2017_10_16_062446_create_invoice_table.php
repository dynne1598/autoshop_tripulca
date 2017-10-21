<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('invoice', function (Blueprint $table) {
            $table->string('transaction_code');
            $table->string('item_code');
            $table->string('item_name');
            $table->string('item_price');
            $table->string('date_purchased');
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

