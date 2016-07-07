<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTabble extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('title', 255);
            $table->string('description', 255);
            $table->dateTime('initialDate');
            $table->dateTime('endDate');
            $table->string('status', 10);
            $table->foreign('id_user')->references('id')->on('users');
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
		Schema::drop('tasks');
	}

}
