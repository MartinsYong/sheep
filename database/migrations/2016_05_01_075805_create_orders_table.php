<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
			$table->bigInteger('owner')->unsigned();
			$table->bigInteger('picker')->unsigned();
			$table->boolean('taken')->default(0);
			$table->string('origin');
			$table->string('dest');
			$table->string('description')->nullable();
			$table->string('setout_time');
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
        Schema::drop('orders');
    }
}
