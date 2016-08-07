//<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('users', function (Blueprint $table) {
        $table->bigInteger('id')->unsigned();
			  $table->string('phone',11)->unique();
			  $table->string('password');
			  $table->string('name');
			  $table->rememberToken();
			  $table->boolean('is_admin')->default(0);
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
      Schema::drop('users');
  }
}
