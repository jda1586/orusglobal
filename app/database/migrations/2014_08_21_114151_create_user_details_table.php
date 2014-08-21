<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name');
			$table->string('lastname');
			$table->text('address');
			$table->integer('zipcode');
			$table->integer('country_id');
			$table->integer('state_id');
			$table->integer('city_id');
			$table->string('phone');
			$table->string('email');
			$table->date('birthday');
			$table->integer('gender');
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
		Schema::drop('user_details');
	}

}
