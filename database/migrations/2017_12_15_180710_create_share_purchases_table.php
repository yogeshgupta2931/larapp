<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('instrument_name');
            $table->integer('quantity');
            $table->decimal('price',20,10);
            $table->decimal('total_investment',20,10);
            $table->integer('certificate_number');
            $table->integer('user_id');
            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('share_purchases');
    }
}