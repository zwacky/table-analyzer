<?php

use Illuminate\Database\Migrations\Migration;

/**
 * aim is to cover different kinds of database column types.
 */
class CreateBasicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('basic', function($table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->integer('ordering');
			$table->double('doge_coins', 15, 8);
			$table->text('content');
			$table->boolean('published')->nullable();
			$table->date('birthday')->default('01-01-2000');

			$table->timestamps();

			$table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('basic');
	}

}